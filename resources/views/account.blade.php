@extends('frontend.master')
@section('content')
<!-- breadcrumb_section - start
================================================== -->
<div class="breadcrumb_section">
    <div class="container">
        <ul class="breadcrumb_nav ul_li">
            <li><a href="{{ route('customer.register') }}">Home</a></li>
            <li>My Account</li>
        </ul>
    </div>
</div>
<!-- breadcrumb_section - end
================================================== -->

<!-- account_section - start
================================================== -->
<section class="account_section">
    <div class="container">
        <div class="row">
            <!-- Menu Buttons -->
            <div class="col-md-3">
                <div class="nav flex-column" id="account-menu" role="tablist">
                    <button class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" data-bs-target="#dashboard" type="button" aria-selected="true">Dashboard</button>
                    <button class="nav-link" id="account-tab" data-bs-toggle="tab" data-bs-target="#account" type="button" aria-selected="false">Account</button>
                    <button class="nav-link" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders" type="button" aria-selected="false">My Orders</button>
                </div>
            </div>

            <!-- Content Area -->
            <div class="col-md-9">
                <div class="tab-content">
                    <!-- Dashboard Tab -->
                    <div class="tab-pane fade show active text-center" id="dashboard">
                        <h5>Welcome to Your Account</h5>
                    </div>

                    <!-- Account Tab -->
                    <div class="tab-pane fade" id="account">
                        <h5 class="text-center">Account Details</h5>
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>

                    <!-- Orders Tab -->
                    <div class="tab-pane fade" id="orders">
                        <h5 class="text-center">Your Orders</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order No</th>
                                    <th>Subtotal</th>
                                    {{-- <th>Discount</th> --}}
                                    <th>Delivery</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $key => $order)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>#{{ $order->id }}</td>
                                    <td>{{ $order->sub_total }}</td>
                                    {{-- <td>{{ $order->discount }}</td> --}}
                                    <td>{{ $order->charge }}</td>
                                    <td>{{ $order->total }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- account_section - end
================================================== -->
@endsection