
@extends('backend.admin.admin_master')
@section('content')

<div class="container">

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row-fluid sortable">
<div class="box span12">

    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Product</h2>

    </div>

    <div class="box-content">
        <form class="form-horizontal" action="{{url('/products/'.$product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="date01">Name</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="name" value="{{$product->name}}" required>
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label" for="date01">Price</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="price" value="{{$product->price}}" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="date01">Code</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="code" value="{{$product->code}}" required>
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label">Category</label>
                    <div class="controls">
                       <select name="category">
                           <option>Select Category</option>
                           @foreach ($categories as $category)

                           <option value="{{$category->id}}">{{$category->name}}</option>
                           @endforeach

                       </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Sub Category</label>
                    <div class="controls">
                       <select name="subcategory">
                           <option>Select Sub Category</option>
                           @foreach ($subcategories as $subCategory)
                           <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                           @endforeach

                       </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Brand</label>
                    <div class="controls">
                       <select name="brand">
                           <option>Select Brand</option>
                           @foreach ($brands as $brand)
                           <option value="{{$brand->id}}">{{$brand->name}}</option>
                           @endforeach

                       </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Size</label>
                    <div class="controls">
                       <select name="size">
                           <option>Select Size</option>
                           @foreach ($sizes as $size)
                           <option value="{{$size->id}}">{{implode(',',json_decode($size->size))}}</option>
                           @endforeach
                       </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Color</label>
                    <div class="controls">
                       <select name="color">
                           <option>Select Color</option>
                           @foreach ($colors as $color)
                           <option value="{{$color->id}}">{{implode(',',json_decode($color->color))}}</option>
                           @endforeach

                       </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Unit</label>
                    <div class="controls">
                       <select name="unit">
                           <option>Select Unit</option>
                           @foreach ($units as $unit)
                           <option value="{{$unit->id}}">{{$unit->name}}</option>
                           @endforeach

                       </select>
                    </div>
                </div>


                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Description</label>
                    <div class="controls">
                        <textarea class="cleditor" name="description" rows="3" required>{{$product->description}}</textarea>
                    </div>
                </div>



                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Update Product</button>
                    <button type="submit" class="btn btn-danger">Cancel</button>
                </div>
            </fieldset>
        </form>

    </div>
</div><!--/span-->
</div><!--/row-->
</div><!--/row-->

</div>
@endsection
