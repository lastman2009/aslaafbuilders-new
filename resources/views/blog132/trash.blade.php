@extends('layouts.master')

@section('header')
    <h2>Trash Blog List</h2>
@stop
@section('content')

    <table class="table table-bordered table-responsive" style="margin-top: 10px">
        <thead>
        <tr>
            <th> ID</th>
            <th> TITLE</th>
            <th> CONTENT</th>
            <th> CREATED AT</th>
            <th> IMAGE</th>
            <th> ACTION</th>

        </tr>

        </thead>
        <tbody>

        @foreach($blogs as $blog)
            <tr>
                <td>{{$blog->id}}</td>
                <td><a href="blogView/{{$blog->id}}">{{$blog->title}}</a></td>
                <td>{{$blog->contant}}</td>

                <td>{{$blog->created_at}}</td>

                <td><img src="../images/{{$blog->gallery}}" height="60" width="60"></td>
                <td>
                    <?php

                        $status_class = 'label-success';
                        $status_text = 'Restore';

                    ?>
                    {{--<a href="blogDelete/{{$blog->id}}">delete</a>--}}
                    <a href="blogStatusChange/{{$blog->id}}/{{$blog->status}}"><span
                                class="label <?php echo $status_class; ?>"><?php echo $status_text; ?></span></a>
                </td>



            </tr>
        @endforeach

        </tbody>
    </table>
@stop