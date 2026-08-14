@extends('layouts.master')

@section('header')
    <h2>Add new Client</h2>
@stop

@section('content')
    <form action="/zipFileUpload" class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name" class="control-label col-md-2">Name</label>
            <div class="col-md-10">
                <input type="text" name="name" required class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="newslatter" class="control-label col-md-2">Templete</label>
            <div class="col-md-10">
                <input type="file" name="file" required class="form-control">
            </div>
        </div>

        <div>
            <div class="col-md-offset-2 col-md-10">
                <input type="submit" value="Save" class="btn btn-primary">
            </div>
        </div>

    </form>


    {{--{!! form::close() !!}--}}
@stop