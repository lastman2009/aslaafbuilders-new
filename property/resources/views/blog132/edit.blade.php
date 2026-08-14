@extends('layouts.master')

@section('header')
    <h2>Add new Blog</h2>
@stop

@section('content')

    <form action="/update_blog/{{$blog->id}}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="title" class="control-label col-md-2">Title</label>
            <div class="col-md-10">
                <input type="text" name="title" value="{{$blog->title}}" required class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="contant" class="control-label col-md-2">Contant</label>
            <div class="col-md-10">
                <input type="text" name="contant" class="form-control" value="{{$blog->contant}}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="comment" class="control-label col-md-2">Photo</label>
            <div class="col-md-10">
                <input type="file" name="photo" value="{{$blog->gallery}}" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2">Category</label>
            <div class="col-lg-10">
                <select multiple="multiple" name="category_id[]" class="form-control listbox-filter-disabled">
                    <?php
                    $blog_cat = array();
                    if(isset($blog_categories))
                    {

                            foreach($blog_categories as $blog_catg)
                            {
                                $blog_cat[]=$blog_catg->cat_id;
                            }

                    }

                    foreach($categories as $category)
                    {
                    $select_atr = '';
                    if(in_array($category->id,$blog_cat))
                    {
                        $select_atr = 'selected="selected"';
                    }
                    ?>
                    <option value="{{$category->id}}" <?php echo $select_atr;?> >{{$category->title}}</option>
                    <?php
                    }

                    ?>

                </select>
            </div>
        </div>


        {{--<div class="form-group">--}}
        {{--<label for="category" class="control-label col-md-2">Category</label>--}}
        {{--<div class="col-md-10">--}}

        {{--<select class="form-control" name="category_id">--}}
        {{--<option value="">Please select</option>--}}
        {{--@foreach($categories as $category)--}}
        {{--<option value="{{ $category->id }}">{{$category->title}}</option>--}}

        {{--@endforeach--}}
        {{--</select>--}}
        {{--</div>--}}
        {{--</div>--}}

        <div class="form-group">
            <label class="control-label col-md-2">Tags</label>
            <div class="col-lg-10">
                <select multiple="multiple" name="tags_ids[]" class="form-control listbox-filter-disabled">
                    <?php
                    $blog_tagss = array();
                    if(isset($blog_tags))
                    {

                        foreach($blog_tags as $blog_tag)
                        {
                            $blog_tagss[]=$blog_tag->tag_id;
                        }

                    }

                    foreach($tags as $tag)
                    {
                    $select_atr = '';
                    if(in_array($tag->id,$blog_tagss))
                    {
                        $select_atr = 'selected="selected"';
                    }
                    ?>
                    <option value="{{$tag->id}}" <?php echo $select_atr;?> >{{$tag->title}}</option>
                    <?php
                    }

                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="comment" class="control-label col-md-2">Other Tags</label>
            <div class="col-md-10">
                <input type="checkbox" class="chk" onclick="ShowHideDiv(this)">
            </div>
        </div>

        <div class="form-group" id="box" style="display: none">
            <label for="comment" class="control-label col-md-2">Tag Name</label>
            <div class="col-md-10">
                <input type="text" name="tags" class="form-control">

            </div>

        </div>


        {{--<div class="form-group">--}}
        {{--<label for="comment" class="control-label col-md-2">Comment</label>--}}
        {{--<div class="col-md-10">--}}
        {{--<input type="text" name="comment" class="form-control">--}}
        {{--</div>--}}
        {{--</div>--}}
        <div>
            <div class="col-md-offset-2 col-md-10">
                <input type="submit" value="Update" class="btn btn-primary">
            </div>
        </div>


    </form>

    {{--{!! form::close() !!}--}}
@stop
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $(".chk").click(function () {
            if ($(this).is(":checked")) {
                $("#box").show();
            } else {
                $("#box").hide();
            }
        });
    });
</script>