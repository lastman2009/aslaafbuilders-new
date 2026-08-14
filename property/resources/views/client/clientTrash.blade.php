@extends('layouts.master')

@section('header')
    <h2>Clients List</h2>
@stop
@section('content')
    <a href="/client/create" class="btn btn-primary">Add New</a>
    <a href="/ClientTrash" class="btn btn-primary">Client Trash</a>
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
                    <?php

                    $status_class = 'label-success';
                    $status_text = 'Restore';

                    ?>
                    <a href="clientStatusChange/{{$client->id}}/{{$client->status}}"><span
                                class="label <?php echo $status_class; ?>"><?php echo $status_text; ?></span></a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@stop
