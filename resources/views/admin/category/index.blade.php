@extends('layouts.dashboard');
@section('content')
<div class="">
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header text-center">Category List</div>
                <div class="card-body">
                    <form action="{{ route('mark') }}" method="POST">
                        @csrf
                    <table class="table table-striped">
                        <tr>
                            <th><input type="checkbox" id="checkAll"> Mark All</th>
                            <th>Sl</th>
                            <th>Category</th>
                            <th>Added By</th>
                            {{-- <th>Image</th> --}}
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        @forelse($category as $key=>$category)
                        <tr>
                            <td><input type="checkbox" name='mark[]' value="{{ $category->id }}"></td>
                            <td>{{$key+1}}</td>
                            <td>{{$category->category_name}}</td>
                            {{-- <td><img width="50" src="{{ asset('uploads/category/' . $category->category_image) }}"> --}}
                            <td>{{$category->created_at }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                    </button>
                                    <div class="dropdown-menu">

                                        <a href="{{route('category.edit',$category->id)}}" class="dropdown-item">Edit</a>
                                        @can('delete_ategory')
                                        <a href="{{route('delete.category',$category->id)}}" class="dropdown-item">Delete</a>
                                        @endcan
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center"><h4>No Data Found</h4></td>
                            </tr>
                        @endforelse
                                                
                    </table>
                    @error('mark')
                       <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                    @if($total > 0)
                    <button class="btn btn-danger" type="submit">Remove</button>
                    @endif
                </form>
                </div>
            </div>


            <div class="card mt-5">
                <div class="card-header text-center">Trashed Category List</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Sl</th>
                            <th>Category</th>
                            <th>Added By</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        @forelse($trash as $key=>$category)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$category->category_name}}</td>
                            {{-- <td>{{$category->rel_to_user->name}}</td> --}}
                            <td><img width="50" src="{{ asset('/uploads/category') }}/{{ $category->category_image }}" ></td>
                            <td>{{$category->created_at }}</td>
                            <td>
                            <a href="{{route('category.restore',$category->id)}}" class="btn btn-success">Restore</a>
                                <a href="{{route('per.delete',$category->id)}}" class="btn btn-danger">Remove</a></td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center"><h4>No Data Found</h4></td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
            
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4>Add Categories</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-3">
                            <input type="text" placeholder="Add Categories" name='category_name' class="form-control">
                            @error('category_name')
                              <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <input type="file" placeholder="Add Category Image"  name='category_image' class="form-control" >
                            @error('category_image')
                              <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary" type="submit"> Add Category Image</button>
                        </div> 
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('footer_script')
  @if(session('success'))
  <script>
    const Toast = Swal.mixin({
  toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    })

    Toast.fire({
    icon: 'success',
    title: '{{session('success')}}'
    })
</script>
  @endif
  <script>
      $("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
  </script>
@endsection