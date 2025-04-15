
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Online - Nursey</title>
    <link rel="shortcut icon" href="{{ asset('/frontend/images/logo/favourite_icon_1.png') }}">

    <!-- fraimwork - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/bootstrap.min.css') }}">

    <!-- icon font - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/fontawesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/stroke-gap-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/icofont.css')}}">


    <!-- carousel - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/slick-theme.css')}}">

    <!-- popup - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/magnific-popup.css')}}">

    <!-- jquery-ui - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/jquery-ui.css')}}">

    <!-- select option - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/nice-select.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <!-- custom - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/style.css')}}">
</head>

<body>

    <!-- body_wrap - start -->
    <div class="body_wrap">
        
        <!-- backtotop - start -->
        <div class="backtotop">
            <a href="#" class="scroll">
                <i class="far fa-arrow-up"></i>
            </a>
        </div>
        <!-- backtotop - end -->

        <!-- preloader - start -->
        <div id="preloader"></div>
        <!-- preloader - end -->

        
        <!-- header_section - start
        ================================================== -->
        <header class="header_section">
            <div class="header_top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col col-md-6">
                        </div>
                        <div class="col col-md-6">
                            <p class="header_hotline">Created by: <strong> 21201566</strong></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col col-lg-3 col-md-3 col-sm-12">
                            <div class="brand_logo">
                                <a class="brand_link" href="{{ route('master') }}">
                                    <img src="{{ asset('/frontend/images/logo/logo.jpeg') }}" srcset="assets/images/logo/logo.jpeg 2x" alt width="133px">
                                </a>
                            </div>
                        </div>
                        {{-- <div class="col col-lg-6 col-md-6 col-sm-12">
                            <div class="advance_serach">
                                <div class="select_option mb-0 clearfix">
                                    <select class="selectmenu">
                                        <option data-display="All Categories">Select A Category</option>
                                        @foreach (App\Models\Category::all() as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Search Form -->
                                <form action="{{ route('search2') }}" method="GET">
                                    <div class="form_item">
                                        <input type="search" name="query" placeholder="Search Products..." value="{{ request()->input('query') }}">
                                        <button type="submit" class="search_btn"><i class="far fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div> --}}
                        <div class="col col-lg-3 col-md-3 col-sm-12">
                            <button type="button" class="cart_btn">
                               <ul class="header_icons_group ul_li_right">
                                    <li>
                                        <span class="cart_icon">
                                            <i class="icon icon-ShoppingCart"></i>
                                            <small class="cart_counter">{{ App\Models\Cart::where('customer_id',Auth::guard('customerlogin')->id())->count() }}</small>
                                        </span>
                                    </li>
                               </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header_bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col col-md-6">
                            <nav class="main_menu navbar navbar-expand-lg">
                                <div class="main_menu_inner collapse navbar-collapse" id="main_menu_dropdown">
                                    <ul class="main_menu_list ul_li">
                                        <li><a class="nav-link" href="{{ route('master') }}">Home</a></li>
                                        <li><a class="nav-link" href="#">About us</a></li>
                                        <li><a class="nav-link" href="#">Shop</a></li>
                                        <li><a class="nav-link" href="#">Contact Us</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>

                        <div class="col col-md-6">
                            <ul class="header_icons_group ul_li_right">

                                @auth('customerlogin') {{--when logged in--}}
                                  <li>

                                    <div class="dropdown">
                                        <button class=" dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <strong>{{ Auth::guard('customerlogin')->user()->name }}</strong>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                          {{-- <li><a class="dropdown-item" href="{{ route('account') }}">My Account</a></li> --}}
                                          <li><a class="dropdown-item" href="{{ route('customer.logout') }}">Logout</a></li>
                                        </ul>
                                      </div>
                                  </li>
                                 @else {{--when not logged in--}}
                                 <li>
                                    <a href="{{ route('customer.register') }}">Register/Login</a>
                                 </li>
                                @endauth
                                 <li>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header_section - end
        ================================================== -->
        
        <!-- main body - start
        ================================================== -->
        <main>
            
            <!-- sidebar cart - start
            ================================================== -->
            <div class="sidebar-menu-wrapper">
                <div class="cart_sidebar">
                    <button type="button" class="close_btn"><i class="fal fa-times"></i></button>
                    <ul class="cart_items_list ul_li_block mb_30 clearfix">
                        @php
                            $sub_total=0;
                        @endphp
                        @forelse (App\Models\Cart::where('customer_id',Auth::guard('customerlogin')->id())->get() as $cart)
                        <li>
                            <div class="item_image">
                                <img src="{{ asset('/uploads/products/preview')}}/{{ $cart->rel_to_product->preview }}" alt="image_not_found">
                            </div>
                            <div class="item_content">
                                <h4 class="item_title">{{ $cart->rel_to_product->product_name }}</h4>
                                <span class="item_price">BDT {{ $cart->rel_to_product->after_discount }} x {{ $cart->quantity }}</span>

                               
                            </div>
                            <a href="{{ route('cart.remove', $cart->id) }}" class="remove_btn"><i class="fal fa-trash-alt"></i></a>
                        </li>
                        @php
                            $sub_total += $cart->rel_to_product->after_discount * $cart->quantity;
                        @endphp
                        @empty
                        <div class="alert alert-info"><h5>You Have Not Added Any Product Yet</h5></div>
                        @endforelse
                    </ul>
                    @if (App\Models\Cart::where('customer_id',Auth::guard('customerlogin')->id())->count() != 0)
                    <ul class="total_price ul_li_block mb_30 clearfix">
                        <li>
                            <span>Subtotal:</span>
                            <span>BDT {{ $sub_total }}</span>
                        </li>
                    </ul>
                    <ul class="btns_group ul_li_block clearfix">
                        <li><a class="btn btn_primary" href="{{ route('view.cart') }}">View Cart</a></li>
                        {{-- <li><a class="btn btn_secondary" href="{{ route('checkout') }}">Checkout</a></li> --}}
                    </ul>
                </div>
                    @endif
                    <div class="cart_overlay"></div>
            </div>
            <!-- sidebar cart - end
            ================================================== -->


            
               @yield('content')
        
        </main>
        <!-- main body - end
        ================================================== -->
        
        <!-- footer_section - start
        ================================================== -->
        <footer class="footer_section">
            <div class="footer_widget_area">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-5 col-md-3 col-sm-6">
                            <div class="footer_widget footer_useful_links">
                                <h3 class="footer_widget_title text-uppercase">Quick Links</h3>
                                <ul class="ul_li_block">
                                    <li><a href="#!">About Us</a></li>
                                    <li><a href="#!">Contact Us</a></li>
                                    <li><a href="#!">Products</a></li>
                                    <li><a href="{{ route('customer.register') }}">Login</a></li>
                                    <li><a href="{{ route('customer.register') }}">Sign Up</a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col col-lg-2 col-md-3 col-sm-6">
                            <div class="footer_widget footer_useful_links">
                                <h3 class="footer_widget_title text-uppercase">Custom area</h3>
                                <ul class="ul_li_block">
                                    <li><a href="#!">My Account</a></li>
                                    <li><a href="#!">Orders</a></li>
                                    <li><a href="#!">Team</a></li>
                                    <li><a href="#!">Privacy Policy</a></li>
                                    <li><a href="#!">My Cart</a></li>
                                </ul>
                            </div>
                        </div>

            <div class="footer_bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col col-md-6">
                            <p class="copyright_text">
                                ©2021 <a href="{{ route('master') }}">nursery</a>. All Rights Reserved.
                            </p>
                        </div>
                        
                        <div class="col col-md-6">
                            <div class="payment_method">
                                <h4>Payment:</h4>
                                <img src="{{ asset('/frontend/images/payments_icon.png')}}" alt="image_not_found">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer_section - end
        ================================================== -->

    </div>
    <!-- body_wrap - end -->

    <!-- fraimwork - jquery include -->
    <script src="{{ asset('/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('/frontend/js/bootstrap.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- carousel - jquery plugins collection -->
    <script src="{{ asset('/frontend/js/jquery-plugins-collection.js') }}"></script>

    <!-- google map  -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M&ver=2.1.6"></script>
    <script src="{{ asset('/frontend/js/gmaps.min.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- custom - main-js -->
    <script src="{{ asset('/frontend/js/main.js') }}"></script>

    @yield('footer_script')

</body>
</html>