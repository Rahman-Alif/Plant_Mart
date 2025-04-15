@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Inventory List of, {{ $product_info->product_name }}</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Sl</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($inventory as $key=>$product)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    <a href="{{ route('inv.delete',$product->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                    <td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add Product Inventory</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('add.inventory') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="hidden"  class="form-control" name="product_id" value="{{ $product_info->id }}">
                            <input type="text" readonly class="form-control" value="{{ $product_info->product_name }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="quantity" placeholder="Quantity">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Inventory</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection