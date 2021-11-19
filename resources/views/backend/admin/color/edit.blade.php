
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
        <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Color</h2>

    </div>

    <div class="box-content">
        <form class="form-horizontal" action="{{url('/colors/'.$color->id)}}" method="post">
            @csrf
            @method('PUT')
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="date01">Color Name</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="color" id="input" data-role="tagsinput" value="{{implode(',',Json_decode($color->color))}}" required>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Update Color</button>
                    <button type="reset" class="btn btn-danger">Cancel</button>
                </div>
            </fieldset>
        </form>

    </div>
</div><!--/span-->
</div><!--/row-->
</div><!--/row-->

</div>
@endsection
