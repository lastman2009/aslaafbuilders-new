<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Blog;
use DB;
use Response;
use App\Http\Requests\StoreCategoryPost;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->where('status', 1)->get();
        return view('category.category_list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;

        $category->title = $request->title;
        if(!empty($request->description))
        $category->description = $request->description;
        else
        $category->description ="okay";
        $category->status = 1;

        $category->save();
//        $blog=$request->all();

//         Blog:: create($blog);
        //dd($blog);
        return redirect('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryPost $request, $id)
    {
        $category = Category::find($id);
        $categoryUpdate = $request->all();
        $category->update($categoryUpdate);
        return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
     
        DB::table('categories')
            ->where('id', $id)
            ->update(['status' => 0]);
        return Response::json(['success' => 'removed']);

    }

    public function categoryStatusChange($cat_id, $status_id)
    {

        if ($status_id == 0) {
            $new_status = 1;
        }
        DB::table('categories')
            ->where('id', $cat_id)
            ->update(['status' => $new_status]);

        return redirect('category');

    }

    public function categoryTrash()
    {
        $categories = Category::orderBy('created_at', 'desc')->where('status', 0)->get();
        return view('category.trash_category', compact('categories'));
    }

}
