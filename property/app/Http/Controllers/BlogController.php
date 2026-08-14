<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Blog;
use App\BlogCategory;
use App\BlogTag;
use App\BlogComment;
use File;
use DB;
use Response;
use Illuminate\Support\Facades\Request as Input;
use Intervention\Image\Facades\Image;
use Auth;
use App\Http\Requests\StoreBlogPost;
use App\Http\Requests\StoreBlogEditPost;
use App\Statistic;
use App\Meta;


class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {   


    //     $blogs = Blog::where('status', '>', 0)->orderBy('created_at', 'desc')->get();
    //     return view('blog.blog_listing', compact('blogs'));
    // }
    public function index()
    {   


        $blogs = Blog::where('status', '>', 0)->orderBy('created_at', 'desc')->paginate(10);
        return view('blog.blog_listing', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $tags = Tag::where('status', 1)->get();

        return view('blog.add_blog', compact('categories', 'tags'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function save_pic($request)
    {
        $pic_name = $request->file('info_graphic')->getClientOriginalName();
       $new_name = 'infographic'.time() . '.' . $request->file('info_graphic')->getClientOriginalExtension();
        $request->file('info_graphic')->move(base_path() . $this->getPublicPath().'/images/blogs_images', $new_name);
        return $new_name;
    }

    public function save_pic_and_resize($image,$folderName,$width,$height)
    {
     
        $pic_name = $image->getClientOriginalName();    
        $new_name = time() . '.' . $image->getClientOriginalExtension();

        $thumb_image=Image::make($image)->fit($width, $height);
        $sidebar_thumb_image=Image::make($image)->fit(100, 60);
        $image->move(base_path() . $this->getPublicPath().'/images/'.$folderName, $new_name);
        $thumb_image->save(base_path() . $this->getPublicPath().'/images/'.$folderName.'/thumb_'.$new_name);
        $sidebar_thumb_image->save(base_path() . $this->getPublicPath().'/images/'.$folderName.'/sidebar_thumb_'.$new_name);
       
        return $new_name;
    }

    public function store(Request $request)
    {
        if(!empty($request->file('photo')))
        {

        if($this->isImage($request->file('photo')))
        {
            $width=300;
            $height=171;

        $new_name = $this->save_pic_and_resize($request->file('photo'),'blogs_images',$width,$height);
        if(!empty($request->file('info_graphic')))
        {
            if($this->isImage($request->file('info_graphic')))
            {
                 $info_graphic_name=$this->save_pic($request);
            }
            else
            {
                return back()->with('error', 'Sorry, only JPG, JPEG, PNG files are allowed.');
            }
       
        }
        else
        {
            $info_graphic_name='';
        }

        $blog = new Blog;


        $blog->title = trim($request->title);
        $blog->author_name = trim($request->author_name);
        $blog->identifier = $request->identifier;

        $blog->contant = $request->contant;
        
        $blog->status = 1;
        $blog->meta_keyword = $request->meta_keyword;
        $blog->meta_description = $request->meta_description;
        $blog->meta_title = $request->meta_title;
        $blog->gallery = $new_name;
        $blog->info_graphic = $info_graphic_name;

       $blog->save();
        $latest_blog_id = $blog->id;
        if(!empty($request->tags_ids)){
            $allId = $request->tags_ids;

            if(isset($request->tags) && !empty($request->tags)){
                $new_tags=$request->tags;
                $manualTagId = array();
                foreach ($new_tags as $new_tag) {
                    $tag = new Tag();
                    $tag->title = $new_tag;
                    $tag->status = 1;
                    $tag->save();
                    $manualTagId[] = $tag->id;
                }
                $tag_ids=array_merge($allId,$manualTagId);
            }else{
                $tag_ids = $allId;
            }
            foreach ($tag_ids as $tag_id) {
                DB::table('blog_tags')->insert(
                    ['blog_id' => $latest_blog_id, 'tag_id' => $tag_id]
                );
            }
        }
        if(!empty($request->category_id)){
            $cat_idss = $request->category_id;

            foreach ($cat_idss as $cat_id) {
                DB::table('blog_categories')->insert(
                    ['blog_id' => $latest_blog_id, 'category_id' => $cat_id]
                );
            }
        }
        $propertyobject = new Statistic();
        $propertyobject->updateStats('active_blogs');


        return redirect('blogs');

        }
        else
        {
             return back()->with('error', 'Sorry, only JPG, JPEG, PNG files are allowed.');
        }
    }
    else
        {
             return back()->with('error', 'Sorry, only JPG, JPEG, PNG files are allowed.');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $categories = Category::where('status', 1)->get();
        $blog_categories = BlogCategory::where('blog_id', $id)->get();
        $blog = Blog::find($id);

        $cat_id = BlogCategory::where('blog_id', $id)->first();
        $blog_tags = BlogTag::where('blog_id', $id)->get();
        $tags = Tag::where('status', 1)->get();
        return view('blog.edit_blog', compact('blog', 'categories', 'tags', 'cat_id', 'blog_categories', 'blog_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $blog = Blog::find($id);
        $blogUpdate = $request->all();
        $blog->update($blogUpdate);
        return redirect('blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('asd');
    }

    public function delete($id)
    {
        DB::table('blogs')
            ->where('id', $id)
            ->update(['status' => 0]);
        return Response::json(['success' => 'removed']);  

    }
    // public function view($id)
    // {
    //     $blog = Blog::find($id);
    //     $comments = BlogComment::where('blog_id', $id)->get();
    //     $parentComments = BlogComment::where('blog_id', $id)->get();
    //     return view('blog.view', compact('blog', 'comments', 'parentComments'));


    //     return Response::json(['success' => 'removed']);
    // }
    public function comment_save(Request $request, $id, $c_id)
    {
        $comment = $_GET['idss'];
        $this->insertComment($comment, $id, $c_id);
        $this->incrementComment($id);
    }
    public function parent_comment_save(Request $request, $id)
    {  
        $comments = $_GET['commentt'];
        $this->insertComment($comments, $id, 0);
        $this->incrementComment($id);
    }

    private function insertComment($comments, $id, $parent_id){
        $commentnew=new BlogComment();
        $commentnew->comment = $comments;
        $commentnew->blog_id = $id;
        $commentnew->parent_id = $parent_id;
        $commentnew->status = 1;
        $commentnew->user_id = Auth::id();
        return $commentnew->save() ? $commentnew->id : false;
    }

    private function incrementComment($id){
        $count=Blog::find($id);
        $count->comment_count+=1;
        return $count->update() ? $count->id : false;
    }

    public function update_blog(Request $request, $id)
    {
        // dd($request->all());
        DB::table('blog_tags')->where('blog_id', $id)->delete();
        DB::table('blog_categories')->where('blog_id', $id)->delete();
        $blog = Blog::find($id);
        if(isset($request->photo) && !empty($request->photo))
        {
            if($this->isImage($request->file('photo')))
            {
                $width=300;
                $height=171;
                $new_name = $this->save_pic_and_resize($request->file('photo'),'blogs_images',$width,$height);
                $blog->gallery = $new_name;
            }else{
                return back()->with('error', 'Sorry, only JPG, JPEG, PNG files are allowed.');
            }

        }
        if(!empty($request->file('info_graphic')))
        {
            if($this->isImage($request->file('info_graphic')))
            {
                 $info_graphic_name=$this->save_pic($request);
                 $blog->info_graphic = $info_graphic_name;

            }
            else
            {
               return back()->with('error', 'Sorry, only JPG, JPEG, PNG files are allowed.');
            }
       
        }
       
        $blog->title = $request->title;
           $blog->author_name= $request->author_name;
        $blog->contant = $request->contant;
        $blog->meta_keyword = $request->meta_keyword;
        $blog->meta_description = $request->meta_description;
        $blog->meta_title = $request->meta_title;
        $blog->status = 1;
        $blog->update();
        if(!empty($request->tags_ids)){
            $tag_ids = $request->tags_ids;
            foreach ($tag_ids as $tag_id) {
                DB::table('blog_tags')->insert(
                    ['blog_id' => $id, 'tag_id' => $tag_id]
                );
            }
        }
        if(!empty($request->category_id))
        {
            $cat_idss = $request->category_id;
            foreach ($cat_idss as $cat_id) {
                DB::table('blog_categories')->insert(
                    ['blog_id' => $id, 'category_id' => $cat_id]
                );
            }
        }
        return redirect('blogs');
    }
    public function blogStatusChange($blog_id, $status_id)
    {
        if ($status_id == 1) {
            $new_status = 2;
        } else if ($status_id == 2) {
            $new_status = 1;
        } else if ($status_id == 0) {
            $new_status = 2;
        }
        DB::table('blogs')
            ->where('id', $blog_id)
            ->update(['status' => $new_status]);
        // return redirect('blogs');
        return Response::json(['success' => $new_status]);
    }

    public function blogTrash()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->where('status', 0)->paginate(10);
        return view('blog.blog_trash', compact('blogs'));

    }

    public function delete_blog_image($image_name,$id)
    {  
        File::delete("images/blogs_images/" . $image_name);
        File::delete("images/blogs_images/" . 'thumb_'.$image_name);
        File::delete("images/blogs_images/" . 'sidebar_thumb_'.$image_name);
        return back();
    }
    public function delete_blog_info_graphic($image_name,$id)
    {  
         $blog =Blog::find($id);
        $blog->info_graphic="";
        $blog->update();
        File::delete("images/blogs_images/" . $image_name);   
        return back();

    }

     public function blogRestore($blog_id, $status_id)
    {
        if ($status_id == 0) {
            $new_status = 2;
        }
        DB::table('blogs')
            ->where('id', $blog_id)
            ->update(['status' => $new_status]);
        return redirect('blogTrash');  
    }

    // public function blogListing()
    // {
   
    //     $blogs = Blog::orderBy('created_at', 'desc')->where('status', 1)->paginate(10);
    //     $categories = Category::orderBy('created_at', 'desc')->where('status', 1)->get();
    //     // $most_view_blogs = Blog::orderBy('view', 'desc')->where('status', 1)->limit(3)->get();
    //     // $most_view_blogs = Blog::whereIn('id', [570,577,564])->where('status', 1)->get();
    //     $most_view_blogs =  DB::select("SELECT * FROM blogs WHERE id IN (570,577,564) ORDER BY FIELD(id, 570,577,564 )");
    //     $year='';
    //     $month='';
    //     $category='';
    //     $meta=Meta::find(19);
    //     $title =$meta->meta_title;
    //     $description =$meta->meta_description;
    //     $keyword =$meta->meta_keyword;
    //     return view('blog_front.blog_listing', compact('blogs','categories','most_view_blogs','year','month','category','title','description','keyword'));
    // }
     public function blogListing()
    {
        

        $blogs = Blog::orderBy('created_at', 'desc')->where(['status'=>1,'identifier'=>0])->paginate(10);
        $categories = Category::orderBy('created_at', 'desc')->where('status', 1)->get();
        // $most_view_blogs = Blog::orderBy('view', 'desc')->where('status', 1)->limit(3)->get();
        $most_view_blogs = Blog::where(['status'=>1,'identifier'=>0])->orderBy('id','DESC')->limit(5)->get();
      
        $year='';
        $month='';
        $category='';
        $meta=Meta::find(19);
        $title =$meta->meta_title;
        $description =$meta->meta_description;
        $keyword =$meta->meta_keyword;
        return view('blog_front.blog_listing', compact('blogs','categories','most_view_blogs','year','month','category','title','description','keyword'));
    }
    

     public function newsListing(){

        $blogs = Blog::orderBy('created_at', 'desc')->where(['status'=>1,'identifier'=>1])->paginate(7);
        $categories = Category::orderBy('created_at', 'desc')->where('status', 1)->get();
        // $most_view_blogs = Blog::orderBy('view', 'desc')->where('status', 1)->limit(3)->get();
        $most_view_blogs = Blog::where(['status'=>1,'identifier'=>1])->orderBy('id','DESC')->limit(5)->get();
        $year='';
        $month='';
        $category='';
        $meta=Meta::find(19);
        $title =$meta->meta_title;
        $description =$meta->meta_description;
        $keyword =$meta->meta_keyword;
        return view('blog_front.news_listing', compact('blogs','categories','most_view_blogs','year','month','category','title','description','keyword'));
    }
    
    
    public function blogSearch(Request $request)
        {
        $blogs = Blog::where('title', Input::input('title'))->orWhere('title', 'like', '%' . Input::input('title') . '%')->paginate(10);
        // $most_view_blogs = Blog::whereIn('id', [570,577,564])->where('status', 1)->limit(3)->get();
         $most_view_blogs =  DB::select("SELECT * FROM blogs WHERE id IN (570,577,564) ORDER BY FIELD(id, 570,577,564 )");
        $categories = Category::orderBy('created_at', 'desc')->where('status', 1)->get();

        $year='';
        $month='';
        $category='';
        $meta=Meta::find(19);
        $title =$meta->meta_title;
        $description =$meta->meta_description;
        $keyword =$meta->meta_keyword;
        return view('blog_front.blog_listing', compact('blogs','categories','most_view_blogs','year','month','category','title','description','keyword'));
        }
    public function blogListingYearMonth($year,$month)
    {

        $blogs = Blog::orderBy('created_at', 'desc')->where('status', 1)->whereYear('created_at',$year)->whereMonth('created_at', $month)->paginate(10);
        $categories = Category::orderBy('created_at', 'desc')->where('status', 1)->get();
        // $most_view_blogs = Blog::orderBy('view', 'desc')->where('status', 1)->limit(3)->get();
        // $most_view_blogs = Blog::whereIn('id', [570,577,564])->where('status', 1)->limit(3)->get();
         $most_view_blogs =  DB::select("SELECT * FROM blogs WHERE id IN (570,577,564) ORDER BY FIELD(id, 570,577,564 )");
            $category='';
         $meta=Meta::find(19);
        $title =$meta->meta_title;
        $description =$meta->meta_description;
        $keyword =$meta->meta_keyword;
        return view('blog_front.blog_listing', compact('blogs','categories','most_view_blogs','year','month','category','title','description','keyword'));
    }
    public function removeProceedingQuestionMark($str){
        $str = str_replace('%3F', '', $str);
        return str_replace('?', '', $str);
    }
    function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
    }
    public function view($id, $title, Request $request)
    {
        $blog = Blog::find($id);
        if($blog != null)
        {
            //$title = basename($request->fullUrl());
            $title_new = str_slug($blog->title);
            $title = str_slug(urldecode($title));
            if($title == $title_new)
            {
                $comments = BlogComment::where('blog_id', $id)->where('status', 1)->get();
                $parentComments = BlogComment::where('blog_id', $id)->where('status', 1)->get();
                //$categories = Category::orderBy('created_at', 'desc')->where('status', 1)->get();
                $categories = BlogCategory::select(DB::raw("categories.title as title , categories.id as id"))
                ->join("blogs", "blogs.id", "blog_categories.blog_id")
                ->join("categories", "categories.id", "blog_categories.category_id")
                ->where("blogs.id", $id)
                ->where("categories.status", 1)
                ->get();
                // dd($categories);
                $blogsArchives= Blog::where('status', 1)
                ->select(DB::raw("count(id) as count_blog, MONTH(created_at) as month, YEAR(created_at) as year"))
                ->groupBy(DB::raw("MONTH(created_at)"))->groupBy(DB::raw("YEAR(created_at)"))->get();
                
                $years = Blog::where("status",1)->select(DB::raw("YEAR(created_at) as year"))->distinct()->get();
                // dd($years);
                $this->incrementView($blog);
                // $most_view_blogs = Blog::orderBy('view', 'desc')->where('status', 1)->limit(3)->get();
                // $most_view_blogs = Blog::whereIn('id', [570,577,564])->where('status', 1)->orderBy('id','DESC')->limit(3)->get();
                $most_view_blogs = Blog::where(['status'=>1,'identifier'=>1])->orderBy('id','DESC')->limit(5)->get();
// dd($years);

                return view('blog_front.blog_detail', compact('blog', 'comments', 'parentComments', 'most_view_blogs', 'categories', 'blogsArchives', 'years'));
            }
             return abort('404');
        }
        return abort('404');
    }
    public function incrementView($blog){
        $blog->view+=1;
        return $blog->update() ? true : false;
    }

    public function blogCommentsUpdate($comment_id,$comment)
    {
        $update_comment= BlogComment::find($comment_id);
        $update_comment->comment = $comment;
        $update_comment->update();
       
        return Response::json(['success' => 'true']);
    }
    public function commentDelete($comment_id)
    {
        $update_comment= BlogComment::find($comment_id);
        $update_comment->status = 0;
        $blog_id = $update_comment->blog_id;
        $update_comment->update();
       $update_blog=Blog::find($blog_id);
       $update_blog->comment_count=$update_blog->comment_count-1;
        $update_blog->update();
        return Response::json(['success' => 'true']);

    }
    public function blogListingByCategory($category, $id){
        $blogs = Blog::select(DB::raw("blogs.id as id , blogs.gallery as gallery ,  blogs.title as title , blogs.contant as contant , blogs.created_at as created_at , blogs.comment_count as comment_count , categories.title as category_title"))     
        ->leftjoin("blog_categories", "blogs.id", "blog_categories.blog_id")
        ->leftjoin("categories", "categories.id", "blog_categories.category_id")
        ->where('categories.id', $id)
        ->where("categories.status", 1)
        ->orderBy("blogs.id", "DESC")
        ->paginate(10);
        
        // if(!$blogs->isEmpty()){
        //     if(implode("-",explode(" ", strtolower($blogs[0]->category_title))) == $category){
                
        //     }else{
        //         dd("no");
        //     }
        // }
        $categories = Category::orderBy('created_at', 'desc')->where('status', 1)->get();
        // $most_view_blogs = Blog::orderBy('view', 'desc')->where('status', 1)->limit(3)->get();
        // $most_view_blogs = Blog::whereIn('id', [570,577,564])->where('status', 1)->orderBy('id','DESC')->limit(3)->get();
         $most_view_blogs =  DB::select("SELECT * FROM blogs WHERE id IN (570,577,564) ORDER BY FIELD(id, 570,577,564 )");
        $year='';
        $month='';
        $title =$category;
        $description ="";
        $keyword ="";
        // if()   
        // $title = implode("-",explode(" ", strtolower($category)));
         return view('blog_front.blog_listing', compact('blogs','categories','most_view_blogs','year','month','category','title','description','keyword'));
    }
}
