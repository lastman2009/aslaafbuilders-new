@extends('layouts.master')

@section('header')
    <h2>Blog List</h2>
   <a href="/home"><button class="btn btn-primary">Back to main page</button></a>
@stop
@section('content')
    <a href="/blogs/create" class="btn btn-primary">Add New</a>
    <a href="/category" class="btn btn-primary">Categories</a>
    <a href="/tag" class="btn btn-primary">Tags</a>
    <a href="/blogTrash" class="btn btn-primary">Blog Trash</a>
    <a href="/client" class="btn btn-primary">Clients</a>
    <a href="/upload_image_tiles" class="btn btn-primary">TILES</a>
    <a href="/uploadImagesView" class="btn btn-primary">Upload Image</a>
    <a href="/templeteUpload" class="btn btn-primary">Upload Newslatter</a>
    <a href="/uploadZipFile" class="btn btn-primary">Upload Newslatter zip</a>
     <a href="/createprofileTheme" class="btn btn-primary">Create Profile Theme</a>
      <a href="/updateProfiletheme" class="btn btn-primary">Update Profile Theme</a>
      <a href="/previewProfileTheme" class="btn btn-primary">Preview Profile Theme</a>
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
                <td><?php echo strip_tags($blog->contant); ?></td>

                <td>{{$blog->created_at}}</td>

                <td><img src="../images/{{$blog->gallery}}" height="60" width="60"></td>
                <td>
                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-success">Edit</a>
                    <a href="blogDelete/{{$blog->id}}" class="btn btn-danger">Delete</a>
                    <?php
                    $status_class = 'label-default';
                    $status_text = 'Un Publish';
                    if ($blog->status == 2) {
                        $status_class = 'label-success';
                        $status_text = 'Publish';
                    }
                    ?>
                
                    <a href="blogStatusChange/{{$blog->id}}/{{$blog->status}}"><span
                                class="label <?php echo $status_class; ?>"><?php echo $status_text; ?></span></a></td>
                </td>


            </tr>
        @endforeach

        </tbody>
    </table>
@stop