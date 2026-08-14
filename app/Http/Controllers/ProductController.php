<?php

namespace App\Http\Controllers;

use App\UserProduct;
use Illuminate\Http\Request;
use Auth;
use DB;
use Response;

class ProductController extends Controller
{
    public function addProduct()
    {
        return view('product.add_product');
    }

    public function saveProduct(Request $request)
    {


        $product=new UserProduct();
        $product->user_id=  Auth::id();
        $product->title= $request->title;
        $product->description= $request->description;
        $product->status= 1;
        $product->save();
        return back();
    }
    public function editUserProduct($id)
    {
        $userProduct=UserProduct::find($id);
        //dd($userProduct);
        return view('product.edit_product', compact('userProduct'));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = UserProduct::find($id);
        $productUpdate = $request->all();
        $product->update($productUpdate);
        return back();
    }

    public function delete($id)
    {
        DB::table('user_products')
            ->where('id', $id)
            ->update(['status' => 0]);
        return Response::json(['success' => 'removed']);
    }
}
