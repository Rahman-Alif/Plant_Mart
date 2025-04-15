@extends('frontend.master')

@section('content')
<!-- breadcrumb_section - start
================================================== -->
<div class="breadcrumb_section">
    <div class="container">
        <ul class="breadcrumb_nav ul_li">
            <li><a href="index.html">Home</a></li>
            <li>Order Confirmed</li>
        </ul>
    </div>
</div>
<!-- breadcrumb_section - end
================================================== -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 my-5 m-auto">
            <div class="card">
                <div class="card-header bg-success">
                    <h3 class="text-center text-white"><b>Order Confirmed</b></h3>
                </div>
                <div class="card-header">
                    <h5 class="text-center">Thank you Mr./Mrs, <strong class="text-primary">{{ session('success') }}</strong> for purchasing our product.</h5>
                    <h6 class="text-center">Soon you'll get an confirmation text</h6>
                    <h6 class="text-center">Thank You</h6>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection