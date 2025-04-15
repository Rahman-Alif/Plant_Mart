<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\BillingDetails;
use App\Models\Inventory;
use App\Models\Cart;
use Mail;
use App\Mail\InvoiceSend;
use Auth;
use Carbon\Carbon;
   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * $request->total,
                "currency" => "BDT",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
  
        Session::flash('success', 'Payment successful!');
        $data = session('data');
        $order_id = Order::insertGetId([
            'user_id'=>Auth::guard('customerlogin')->id(),
             'sub_total'=>$data['sub_total'],
             'discount'=>$data['discount'],
             'charge'=>$data['charge'],
             'total'=>$data['total'],
             'created_at'=>Carbon::now(),
         ]);

         BillingDetails::insert([
             'user_id'=>Auth::guard('customerlogin')->id(),
             'order_id'=>$order_id,
             'name'=>$data['name'],
             'email'=>$data['email'],
             'phone'=>$data['phone'],
             'company'=>$data['company'],
             'country_id'=>$data['country_id'],
             'city_id'=>$data['city_id'],
             'address'=>$data['address'],
             'notes'=>$data['notes'],
             'created_at'=>Carbon::now(),
         ]);
         $carts = Cart::where('customer_id',Auth::guard('customerlogin')->id())->get();
         foreach ($carts as  $cart) {
             OrderProduct::insert([
                 'user_id'=>Auth::guard('customerlogin')->id(),
                 'order_id'=>$order_id,
                 'product_id'=>$cart->product_id,
                 'color_id'=>$cart->color_id,
                 'size_id'=>$cart->size_id,
                 'quantity'=>$cart->quantity,
                 'price'=>$cart->rel_to_product->after_discount,
                 'created_at'=>Carbon::now(),
             ]);
                Inventory::where('product_id',$cart->product_id)->where('color_id',$cart->color_id)->where('size_id',$cart->size_id)->decrement('quantity',$cart->quantity);
         }

         //SMS SEND
         function sms_send() {
         $url = "https://bulksmsbd.net/api/smsapi";
         $api_key = "ei6gq0Dj1AvcqXnk7GbM";
         $senderid = "tusharalam";
         $number = $request->phone;
         $message = "Thank you for purchasing our product. You total amount is: ".$request->total;
     
         $data = [
             "api_key" => $api_key,
             "senderid" => $senderid,
             "number" => $number,
             "message" => $message
         ];
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_POST, 1);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
         $response = curl_exec($ch);
         curl_close($ch);
         return $response;

    }

    //e-mail
    Mail::to($request->email)->send(new InvoiceSend($order_id));
        //after order cart delete
        // Cart::where('customer_id',Auth::guard('customerlogin')->id())->delete();
        
        return redirect()->route('order.success')->with('success', $request->name);
    }
}