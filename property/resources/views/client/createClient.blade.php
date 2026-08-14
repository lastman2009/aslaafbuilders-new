@extends('layouts.master')

@section('header')
    <h2>Add new Client</h2>
@stop

@section('content')
    <form action="/client" class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="control-label col-md-2">Name</label>
            <div class="col-md-10">
                <input type="text" name="name" required class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="mobileNo" class="control-label col-md-2">Mobile No</label>
            <div class="col-md-10">
                <input type="tel" name="mobile_no" class="form-control" required>
            </div>
        </div>


        <div class="form-group">
            <label for="address" class="control-label col-md-2">Address</label>
            <div class="col-md-10">
                <input type="text" name="address" required class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="address" class="control-label col-md-2">Ckeditor</label>
            <div class="col-md-10">
            <textarea name="editor-full" id="editor-full" rows="4" cols="4">

            </textarea>
            </div>
        </div>


        <div>
            <div class="col-md-offset-2 col-md-10">
                <input type="submit" value="Save" class="btn btn-primary">
            </div>
        </div>


        <script type="text/javascript">

            CKEDITOR.replace('editor-full');
        </script>
    </form>

@stop