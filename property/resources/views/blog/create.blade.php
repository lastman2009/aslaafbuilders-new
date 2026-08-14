@extends('layouts.master')

@section('header')
    <h2>Add new Blog</h2>
@stop

@section('content')
    <form action="/blogs" class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="title" class="control-label col-md-2">Title</label>
            <div class="col-md-10">
                <input type="text" name="title" required class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="contant" class="control-label col-md-2">Contant</label>
            <div class="col-md-10">
                <input type="text" name="contant" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label for="comment" class="control-label col-md-2">Photo</label>
            <div class="col-md-10">
                <input type="file" name="photo" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2">Category</label>
            <div class="col-lg-10">
                <select multiple="multiple" name="category_id[]" class="form-control listbox-filter-disabled" required="">

                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach

                </select>
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-md-2">Tags</label>
            <div class="col-lg-10">
                <select multiple="multiple" name="tags_ids[]" class="form-control listbox-filter-disabled" required="">

                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->title}}</option>
                            @endforeach

                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="comment" class="control-label col-md-2">Other Tags</label>
            <div class="col-md-10">
                <input type="checkbox" class="chk">
            </div>
        </div>

        <div class="form-group" id="box" style="display: none">
            <label for="comment" class="control-label col-md-2">Tag Name</label>
            <div class="col-md-10">
                <input type="text" name="tags" class="form-control">

            </div>

        </div>


        <div>
            <div class="col-md-offset-2 col-md-10">
                <input type="submit" value="Save" class="btn btn-primary">
            </div>
        </div>


    </form>

@stop
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script >
    $(document).ready(function(){
        $(".chk").click(function () {
            if ($(this).is(":checked")) {
                $("#box").show();
            } else {
                $("#box").hide();
            }
        });
    });
</script>