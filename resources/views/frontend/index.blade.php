
@extends('frontend.master')


 @section('content')
            
            <!-- slider_section - start
            ================================================== -->
            <section class="slider_section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main_slider" data-slick='{"arrows": false}'>
                                <div class="slider_item set-bg-image" data-background="{{ asset('/frontend/images/promotion/Banner.jpeg')}}">
                                   
                                </div>
                                <div class="slider_item set-bg-image" data-background="{{ asset('/frontend/images/promotion/Banner.jpeg')}}">
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- slider_section - end
            ================================================== -->
        
            
            <!-- products-with-sidebar-section - start
            ================================================== -->
            <section class="products-with-sidebar-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="best-selling-products">
                                <div class="sec-title-link">
                                    <h3>Latest Product</h3>
                                    <div class="view-all"><a href="#">View all<i class="fal fa-long-arrow-right"></i></a></div>
                                </div>
                                <div class="product-area  row">
                                    @foreach ($all_products as $all_products) {{-- show all products in blocks --}}
                                    <div class="col-lg-4 grid">
                                        <div class="product-pic">
                                            <img height="300" src="{{ asset('uploads/products/preview') }}/{{ $all_products->preview }}" alt>
                                            @if ($all_products->discount != null)
                                            <span class="theme-badge-2">{{ $all_products->discount }}% off</span> {{--database discount--}}
                                            @endif
                                        </div>
                                        <div class="details">
                                            <h4><a href="{{ route('prodect.details',$all_products->slug) }}">{{ $all_products->product_name }}</a></h4>
                                            <p><a href="{{ route('prodect.details',$all_products->slug) }}">{{ $all_products->short_desp }}</a></p>
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </div>
                                            <span class="price">
                                                <ins>
                                                    <span>
                                                        @if ($all_products->discount!=null)
                                                        <del aria-hidden="true">
                                                            <span>
                                                                <bdi>
                                                                    <span>BDT</span>{{ $all_products->product_price }}
                                                                </bdi>
                                                            </span>
                                                        </del>
                                                        @endif
                                                        <br>
                                                        <bdi>
                                                            <span>BDT: </span>{{ $all_products->after_discount }}
                                                        </bdi>
                                                    </span>
                                                </ins>
                                            </span>
                                            {{-- <div class="add-cart-area">
                                                <form action="{{ route('cart.store') }}" method="POST"> 
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $all_products->id }}">
                                                   
                                                    <input type="number" name="quantity" value="1" min="1"> 
                                                    <button type="submit" class="add-to-cart">Add to cart</button>
                                                </form>
                                                
                                            </div> --}}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            
                        </div>
                      
                    </div>
                </div> <!-- end container  -->
            </section>
            <!-- products-with-sidebar-section - end
            ================================================== -->

@endsection