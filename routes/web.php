<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
//frontend
Route::get('/', [App\Http\Controllers\FrontendController::class, 'master'])->name('master');
Route::get('/product/details/{slug}', [App\Http\Controllers\FrontendController::class, 'prodect_details'])->name('prodect.details');
Route::post('/getSize',[App\Http\Controllers\FrontendController::class, 'getSize']);
// web.php
Route::get('/search', [App\Http\Controllers\FrontendController::class, 'search'])->name('search2');

//customer
Route::get('/customer/register/login',[App\Http\Controllers\CustomerController::class, 'register'])->name('customer.register');
Route::post('/customer/register/store',[App\Http\Controllers\CustomerController::class, 'customer_register_store'])->name('customer.register.store');
Route::post('/customer/login/store', [App\Http\Controllers\CustomerLoginController::class, 'customer_login_store'])->name('customer.login.store');

Route::get('/customer/email/verify/{token}',[App\Http\Controllers\AccountController::class, 'email_verify'])->name('email.verify');

Route::get('/customer/logout',[App\Http\Controllers\CustomerController::class, 'logout'])->name('customer.logout');

//cart
Route::post('/cart/store',[App\Http\Controllers\CartController::class, 'cart_store'])->name('cart.store');
Route::get('/cart/remove/{cart_id}',[App\Http\Controllers\CartController::class, 'cart_remove'])->name('cart.remove');
Route::get('/cart/view',[App\Http\Controllers\CartController::class, 'view_cart'])->name('view.cart');
Route::post('/cart/update',[App\Http\Controllers\CartController::class, 'cart_update'])->name('cart.update');

//coupon
Route::get('/cart/coupon',[App\Http\Controllers\CouponController::class, 'add_coupon'])->name('add.coupon');
Route::post('/coupon/store',[App\Http\Controllers\CouponController::class, 'coupon_store'])->name('coupon.store');

//review
Route::post('/review/store',[App\Http\Controllers\FrontendController::class, 'review_store'])->name('review.store');

//password
Route::get('/forgot/password',[App\Http\Controllers\AccountController::class, 'forgot_password'])->name('forgot.password');
Route::post('/customer/pass/reset/store',[App\Http\Controllers\AccountController::class, 'customer_pass_reset_store'])->name('customer.pass.reset.store');
Route::get('/forgot/password/form/{token}',[App\Http\Controllers\AccountController::class, 'forgot_password_form'])->name('forgot.password.form');
Route::post('/customer/pass/reset/update',[App\Http\Controllers\AccountController::class, 'pass_reset_update'])->name('pass.reset.update');


//checkout
Route::get('/checkout',[App\Http\Controllers\CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/getCity',[App\Http\Controllers\CheckoutController::class, 'getCity']);
Route::post('/order/store',[App\Http\Controllers\CheckoutController::class, 'order_store'])->name('order.store');
Route::get('/order/success',[App\Http\Controllers\CheckoutController::class, 'order_success'])->name('order.success');


//account
Route::get('/account',[App\Http\Controllers\AccountController::class, 'account'])->name('account');
Route::get('/invoice/download/{order_id}',[App\Http\Controllers\AccountController::class, 'invoice_download'])->name('invoice.download');
// Route::get('/', function () {
    //     return view('welcome');
// });



// SSLCOMMERZ Start
Route::get('/ssl/payment', [App\Http\Controllers\SslCommerzPaymentController::class, 'ssl_pay']);

Route::post('/pay', [App\Http\Controllers\SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [App\Http\Controllers\SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [App\Http\Controllers\SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [App\Http\Controllers\SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [App\Http\Controllers\SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [App\Http\Controllers\SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

//stripe

Route::get('/stripe', [App\Http\Controllers\StripePaymentController::class, 'stripe']);
Route::post('stripe', [App\Http\Controllers\StripePaymentController::class, 'stripePost'])->name('stripe.post');


//backend


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users_info',[App\Http\Controllers\HomeController::class, 'users'])->name('users');
Route::get('/profile',[App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::post('/profile/update',[App\Http\Controllers\HomeController::class, 'profile_update'])->name('profile.update');
Route::get('/logout',[App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
Route::get('/users_delete/{id}',[App\Http\Controllers\HomeController::class, 'delete'])->name('delete.user');



//categories

Route::get('/categories',[App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::post('/category/store',[App\Http\Controllers\CategoryController::class, 'store'])->name('category.store'); 
Route::get('/category_delete/{id}',[App\Http\Controllers\CategoryController::class, 'delete'])->name('delete.category');
Route::get('/category/edit/{category_id}',[App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update',[App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
Route::get('/category/restore/{category_id}',[App\Http\Controllers\CategoryController::class, 'restore'])->name('category.restore');
Route::get('/category/per/delete/{category_id}',[App\Http\Controllers\CategoryController::class, 'per_delete'])->name('per.delete');
Route::post('/category/mark',[App\Http\Controllers\CategoryController::class, 'mark'])->name('mark');
Route::post('/category/image',[App\Http\Controllers\CategoryController::class, 'image'])->name('category.store'); 


//sub category

Route::get('/sub/categories',[App\Http\Controllers\SubcategoryController::class, 'index'])->name('subcategory');

Route::post('/insert/categories',[App\Http\Controllers\SubcategoryController::class, 'store'])->name('subcategory.store');

Route::get('/sub/category_delete/{id}',[App\Http\Controllers\SubCategoryController::class, 'sub_delete'])->name('sub.delete.category');


//products

Route::get('/add/product',[App\Http\Controllers\ProductController::class, 'add_product'])->name('add.product');

Route::post('/getsubcategory',[App\Http\Controllers\ProductController::class, 'getsubcategory']);

Route::post('/store/product',[App\Http\Controllers\ProductController::class, 'product_store'])->name('product.store');
Route::get('/product/list',[App\Http\Controllers\ProductController::class, 'product_list'])->name('product.list');

Route::get('/product/list_delete/{id}',[App\Http\Controllers\InventoryController::class, 'list_delete'])->name('product_list.delete');
Route::get('/product/inventory/{product_id}',[App\Http\Controllers\InventoryController::class, 'inventory'])->name('inventory');
Route::get('/product/variation',[App\Http\Controllers\InventoryController::class, 'variation'])->name('variation');
Route::post('/product/color/store',[App\Http\Controllers\InventoryController::class, 'color_store'])->name('color.store');
Route::post('/product/size/store',[App\Http\Controllers\InventoryController::class, 'size_store'])->name('size.store');
Route::get('/product/color_delete/{id}',[App\Http\Controllers\InventoryController::class, 'color_delete'])->name('color.delete');
Route::get('/product/size_delete/{id}',[App\Http\Controllers\InventoryController::class, 'size_delete'])->name('size.delete');
Route::post('/add/inventory',[App\Http\Controllers\InventoryController::class, 'add_inventory'])->name('add.inventory');
Route::get('/inv/inv_delete/{id}',[App\Http\Controllers\InventoryController::class, 'inv_delete'])->name('inv.delete');


//role manager
Route::get('/role/manager',[App\Http\Controllers\RoleManagerController::class, 'role'])->name('role');
Route::post('/permission/store',[App\Http\Controllers\RoleManagerController::class, 'permission_store'])->name('permission.store');
Route::post('/role/store',[App\Http\Controllers\RoleManagerController::class, 'role_store'])->name('role.store');
Route::get('/permission/edit/{id}',[App\Http\Controllers\RoleManagerController::class, 'permission_edit'])->name('permission.edit');
Route::get('/role/delete/{del_id}',[App\Http\Controllers\RoleManagerController::class, 'role_delete'])->name('role.delete');
Route::post('/role/update',[App\Http\Controllers\RoleManagerController::class, 'role_update'])->name('role.update');
Route::post('/role/assign',[App\Http\Controllers\RoleManagerController::class, 'assign_role'])->name('assign.role');
// Route::post('/role/delete/{id}',[App\Http\Controllers\RoleManagerController::class, 'assign_role_delete'])->name('assign.role.delete');


//github login
