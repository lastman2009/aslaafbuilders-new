<?php $user_id = Auth::id();
?>
@extends('layouts.master')

@section('header')
    <h2>Blog View</h2>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
@stop
@section('content')

    <img src="../images/{{$blog->gallery}}" height="500" width="500">

    <div>
        <h3>
            {{$blog->contant}}
        </h3>
    </div>
    <input type="hidden" value="{{$blog->id}}" id="b_id">
    <div>
        <?$c_id = 0;?>
        @foreach($comments as $commentt)
            <h3>
                @if($commentt->parent_id==0)
                    {{$commentt->comment}}
                    <?php
                    $c_id = "";
                    $c_id = $commentt->id;
                    ?>
                    @if($user_id!="")
                        <input type='button' id="btn_<?php echo $c_id ?>" class="btn btn-primary" value='reply'>
                    @endif
            </h3>
            @endif
            <h4>
                @foreach($parentComments as $parentComment)
                    @if($parentComment->parent_id==$commentt->id)
                        {{$parentComment->comment}} <br>
                    @endif
                @endforeach
            </h4>

            <input type="hidden" name="comment_p_id" id="comment_p_id_<?php echo $c_id ?>"
                   value="{{$commentt->id}}">

            @if($user_id!="")
                <div id='reply_<?php echo $c_id?>' style="display: none">
                    <div class="form-group">
                        <div class="col-md-4">
                            <input type="text" name="comment_reply" class="form-control"
                                   id="reply_comment_<?php echo $c_id?>">
                        </div>
                        <button class="btn btn-primary" id="reply_send_<?php echo $c_id?>"
                                data-comment="{{$commentt->id}}" data-blog="{{$blog->id}}">send
                        </button>

                    </div>

                </div>
                <script type="text/javascript">

                    $("#btn_<?php echo $c_id?>").click(function () {
                        $("#reply_<?php echo $c_id?>").show();

                    });
                    $('#reply_send_<?php echo $c_id?>').click(function () {
                        var blog_id = $(this).data('blog');
                        var comment_id = $('#comment_p_id_<?php echo $c_id ?>').val();
                        var url = '/blogComment/' + blog_id + '/' + comment_id;
                        var comment = $('#reply_comment_<?php echo $c_id?>').val();
                        $.ajax({
                            url: url,
                            type: 'GET',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                idss: comment
                            },
                            success: function (data) {
                                location.reload();
                            }
                        });
                    });


                </script>
            @endif
        @endforeach
        @if($user_id!="")
            <div class="form-group">
                <div class="col-md-4">
                    <input type="text" name="comment" class="form-control" id="m_text">
                </div>
                <button class="btn btn-primary" id="m_com">comment</button>

            </div>
        @endif


    </div>
@stop


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">


    $(document).ready(function () {


        $('#m_com').click(function () {
            var blog_id = $('#b_id').val();
            var url = '/blogComments/' + blog_id;
            var comments = $('#m_text').val();
//            alert(comment);
            $.ajax({
                url: url,
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    commentt: comments
                },
                success: function (data) {
                    //alert(data);
                    location.reload();
                }
            });
        });
    });
</script>