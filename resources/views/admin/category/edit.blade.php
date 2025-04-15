@extends('layouts.dashboard')
@section('content')
@can('edit_category')

<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
        <div class="card">
                <div class="card-header">
                    <h4>Edit Categories</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('category.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- name --}}
                        <div class="mt-3">
                            <input type="hidden" value="{{$category_info->id}}" name='category_id'>
                            <input type="text" placeholder="Add Categories" name='category_name' class="form-control" value="{{$category_info->category_name}}">
                            @error('category_name')
                              <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                         {{-- image --}}
                        <div class="mt-3">
                            <img id="pic" width="100" src="{{ asset('/uploads/category') }}/{{ $category_info->category_image }}">
                           <input oninput="pic.src=window.URL.createObjectURL(this.files[0])" type="file" name="category_image" class="form-control">
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary" type="submit"> Update Category </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

@section('footer_script')
  @if(session('update'))
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
    title: '{{session('update')}}'
    })
</script>
  @endif
  @else
  Sorry,you are not applicable for edit category
  @endcan
@endsection