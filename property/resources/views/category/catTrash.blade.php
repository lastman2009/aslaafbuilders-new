@extends('layouts.master')

@section('header')
    <h2>Category List</h2>
@stop
@section('content')

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
                    <?php

                    $status_class = 'label-success';
                    $status_text = 'Restore';
                    ?>
                    <a href="categoryStatusChange/{{$category->id}}/{{$category->status}}"><span
                                class="label <?php echo $status_class; ?>"><?php echo $status_text; ?></span></a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@stop
