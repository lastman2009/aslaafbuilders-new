<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Blog;
use DB;
use App\Http\Requests\StoreTagPost;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags= Tag::orderBy('created_at','desc')->where('status',1)->get();
        return view('tag.tag_listing', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tag.add_tag');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagPost $request)
    {
            $description=$request->description;

            $titles=$request->title;
            foreach ($titles as $title) {
                $tag = new Tag();
                $tag->title = $title;
                $tag->description=$description;
                $tag->status = 1;
                $tag->save();
            }

        return redirect('tag');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag=Tag::find($id);
        return view('tag.edit_tag',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTagPost $request, $id)
    {

        $tag=Tag::find($id);
        $tagUpdate=$request->all();
        $tag->update($tagUpdate);
        return redirect('tag');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        DB::table('tags')
            ->where('id', $id)
            ->update(['status' => 0]);
        return redirect('tag');

    }

    public function tagStatusChange($tag_id,$status_id)
    {

        if($status_id== 0)
        {
            $new_status = 1;
        }
        DB::table('tags')
            ->where('id', $tag_id)
            ->update(['status' => $new_status]);

        return redirect('tag');

    }

    public function tagTrash()
    {   
        $tags= Tag::orderBy('created_at','desc')->where('status',0)->get();
        return view('tag.trash_tag', compact('tags'));
    }
}
