@extends('layouts.master')

@section('header')
    <h2>Edit Client</h2>
@stop

@section('content')
    <form action="/update_client/{{$client->id}}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field()}}

        <div class="form-group">
            <label for="name" class="control-label col-md-2">Name</label>
            <div class="col-md-10">
                <input type="text" name="name" value="{{$client->name}}" required class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="mobileNo" class="control-label col-md-2">Mobile No</label>
            <div class="col-md-10">
                <input type="tel" name="mobile_no" value="{{$client->mobile_no}}" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label for="address" class="control-label col-md-2">Address</label>
            <div class="col-md-10">
                <input type="text" name="address" value="{{$client->address}}" required class="form-control">
            </div>
        </div>

        <div>
            <div class="col-md-offset-2 col-md-10">
                <input type="submit" value="Update" class="btn btn-primary">
            </div>
        </div>
    </form>

@stop