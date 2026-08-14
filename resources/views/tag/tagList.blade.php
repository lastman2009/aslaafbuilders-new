@extends('layouts.master')

@section('header')
    <h2>Tags List</h2>
@stop
@section('content')
    <a href="/tag/create" class="btn btn-primary">Add New</a>
    <a href="/tagTrash" class="btn btn-primary">Tags Trash</a>
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

        @foreach($tags as $tag)
            <tr>
                <td>{{$tag->id}}</td>
                <td>{{$tag->title}}</td>
                <td>{{$tag->description}}</td>

                <td>
                    <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-success">Edit</a>
                    <a href="tagDelete/{{$tag->id}}" class="btn btn-danger">Delete</a>
                    {{--<a href="blogDelete/{{$blog->id}}">delete</a>--}}

                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@stop
