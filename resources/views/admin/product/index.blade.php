@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>Add Product</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">--Select Category--</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select name="subcategory_id" id="subcategory_id" class="form-control">
                                    <option value="">--Select Sub Category--</option>
                                    @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                    <input type="text" placeholder="Product Name" name="product_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                    <input type="number" placeholder="Product Price" name="product_price" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                    <input type="text" placeholder="Discount %" name="discount" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                    <input type="text" placeholder="Short Description" name="short_desp" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                    <textarea id="summernote" placeholder="Long Description" name="long_desp" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                   <label for="">Preview</label>
                                    <input type="file" placeholder="Preview" name="preview" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                   <label for="">Product Thumbnail</label>
                                    <input type="file" placeholder="Product Thumbnails" multiple name="thumbnail[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                   <button class="btn btn-primary" type="submit">Add Product</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('footer_script')
<script>
    $('#category_id').change(function(){
        var category_id = $(this).val();
        // alert(category_id);



        //ajax
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
        type:'POST',
        url:'/getsubcategory',
        data:{'category_id':category_id},
        success:function(data) {
         $('#subcategory_id').html(data);
       

          
        }
    });
    });

   
</script>


<script>
    $(function(){
        $('#summernote').summernote();
    });
</script>

@endsection