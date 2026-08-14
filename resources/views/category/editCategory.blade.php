@extends('layouts.master')

@section('header')
    <h2>Edit Category</h2>
@stop

@section('content')

    <form action="{{ route('category.update', $category->id) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="form-group">
            <label for="title" class="control-label col-md-2">Title</label>
            <div class="col-md-10">
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $category->title) }}">
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="control-label col-md-2">Description</label>
            <div class="col-md-10">
                <input type="text" name="description" id="description" class="form-control" value="{{ old('description', $category->description) }}">
            </div>
        </div>
        <div>
            <div class="col-md-offset-2 col-md-10">
                <input type="submit" value="Update" class="btn btn-primary">
            </div>
        </div>
    </form>
@stop
