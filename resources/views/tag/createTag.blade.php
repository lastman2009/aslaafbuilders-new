@extends('layouts.master')

@section('header')
    <h2>Add new Tag</h2>
@stop

@section('content')
    <form action="/tag" class="form-horizontal" method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}
        {{--        {!! form::open(['url'=>'blog','class'=>'form-horizontal']) !!}--}}
        <div class="form-group">
            <label for="title" class="control-label col-md-2">Title</label>
            <div class="col-md-10">
                <input type="text" name="title" required class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="contant" class="control-label col-md-2">Description</label>
            <div class="col-md-10">
                <input type="text" name="description" class="form-control" required>
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