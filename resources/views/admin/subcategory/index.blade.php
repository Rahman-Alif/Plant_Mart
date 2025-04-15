@extends('layouts.dashboard')

@section('content')
    <div class="">
        <div class="row">
            {{-- preview --}}
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header"><h4>Subcategory List</h4></div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Sl</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($subcategories as $key=>$subcategories)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $subcategories->rel_to_category->category_name }}</td>
                                <td>{{ $subcategories->subcategory_name }}</td>
                                <td>{{ $subcategories->created_at}}</td>
                                <td>
                                    <a href="{{ route('sub.delete.category',$subcategories->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                    {{-- <a href="{{ route('sub.delete.category',$subcategories->id) }}" class="btn btn-danger">Delete</a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>


            {{-- add --}}
            <div class="col-lg-3">
               <div class="card">
                <div class="card-header">
                    <h4>Add Sub Categories</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('subcategory.store') }}" method="POST">
                        @csrf
                        <div class="mt-3">
                            <select name="category_id" class="form-control">
                                <option value="">--Select Category--</option>
                                @foreach ($categories as $categories)   
                                <option value="{{ $categories->id }}">{{ $categories->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <input type="text" name="subcategory_name" placeholder="Subcategory Name" class="form-control">
                            @if (session('exist'))
                            <strong class="text-danger">{{ session('exist') }}</strong>
                            @endif
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary" type="submit">Add Subcategory</button>
                        </div>
                    </form>
                </div>
               </div>
            </div>
        </div>
    </div>
@endsection