<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
class Blog extends Model
{
    protected $fillable=['title','contant','comment'];
    // public function get_all_comments_of_block_by_id($blog_id)
    // {
    //     $comments=Comment::find($blog_id);
    //     return $comments;
    // }
}
