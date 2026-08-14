@extends('layouts.master')

@section('header')
    <h2>Clients List</h2>
@stop
@section('content')
    <a href="/client/create" class="btn btn-primary">Add New</a>
    <a href="/clientTrash" class="btn btn-primary">Client Trash</a>
    <table class="table table-bordered table-responsive" style="margin-top: 10px">
        <thead>
        <tr>
            <th> ID</th>
            <th> NAME</th>
            <th> MOBILE NO</th>
            <th> ADDRESS</th>
            <th> ACTION</th>
        </tr>

        </thead>
        <tbody>

        @foreach($clients as $client)
            <tr>
                <td>{{$client->id}}</td>
                <td>{{$client->name}}</td>
                <td>{{$client->mobile_no}}</td>
                <td>{{$client->address}}</td>

                <td>
                    <a href="{{ route('client.edit', $client->id) }}" class="btn btn-success">Edit</a>
                    <a href="clientDelete/{{$client->id}}" class="btn btn-danger">Delete</a>
                    {{--<a href="blogDelete/{{$blog->id}}">delete</a>--}}

                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@stop
