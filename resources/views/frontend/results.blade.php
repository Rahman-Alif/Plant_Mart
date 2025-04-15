@extends('frontend.master')


@section('content')
    <h1>Search Results for: "{{ $query }}"</h1>

    @if($products->isEmpty())
        <p>No products found.</p>
    @else
        <ul>
            @foreach($products as $product)
                <li>{{ $product->product_name }}</li>
                <li><img src="{{ asset('uploads/products/preview') }}/{{ $product->preview }}" alt="image_not_found"></li>
                <li>{{ $product->product_price}}</li>
            @endforeach
        </ul>
    @endif
@endsection