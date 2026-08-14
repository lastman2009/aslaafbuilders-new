@extends('layouts.master')

@section('header')
    <h2>Category List</h2>
@stop
@section('content')
    <a href="/category/create" class="btn btn-primary">Add New</a>
    <a href="/categoryTrash" class="btn btn-primary">Category Trash</a>
    <table class="table table-bordered table-responsive" style="margin-top: 10px">
        <thead>
        <tr>
            <th> ID</th>
            <th> TITLE</th>
            <th> DESCRIPTION</th>
            <th> ACTION</th>

        </tr>

        </thead>
        <tbody>

        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->title}}</td>
                <td>{{$category->description}}</td>

                <td>
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success">Edit</a>
                    <a href="categoryDelete/{{$category->id}}" class="btn btn-danger">Delete</a>


                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@stop
