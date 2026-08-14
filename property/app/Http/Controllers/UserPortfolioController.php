<?php

namespace App\Http\Controllers;

use App\Portfolio;
use App\UserPortfolio;
use Illuminate\Http\Request;
use File;
use Auth;
use Response;
use DB;

class UserPortfolioController extends Controller
{
   public function createPortfolio()
   {
    
    $character_type= DB::table('user_character_types')
            ->join('character_types', 'user_character_types.character_type_id', '=', 'character_types.id')
            ->where('user_character_types.user_id', Auth::id())
            ->where(['user_character_types.status' => 1])
            ->where('character_types.name', '!=','agent')
            ->select('character_types.*')
            ->get();
        
       return view('portfolio.add_portfolio',compact('character_type'));
   }

   public function savePortfolio(Request $request)
   {
        $width=300;
        $height=300;

       $array = $request->images;
       // dd("hello");
       $images = $this->upload_multiple_image_and_resize_save_in_folder($array, 'User_portfolio_images',$width,$height);
       // dd($images);
       if(!$images){
        return back()->with('error', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
       }
       $img_string = implode(';', $images);
       $portfolio=new UserPortfolio();
       $portfolio->user_id=  Auth::id();
       $portfolio->character_type_id= $request->character_type_id;
       $portfolio->description= $request->description;
       $portfolio->title= $request->title;
       $portfolio->priority= $request->priority;
       $portfolio->start_date= $request->start_date;
       $portfolio->end_date= $request->end_date;
       $portfolio->status= 1;
       $portfolio->images= $img_string;
       $portfolio->save();
       return back();
   }
    public function editUserPortfolio($id)
   {
    // dd('asd')
    if(empty($id)){
      // redirect("notfoundpage");
      die("Invalid Request / URL!");
    }
     $character_type= DB::table('user_character_types')
            ->join('character_types', 'user_character_types.character_type_id', '=', 'character_types.id')
            ->where('user_character_types.user_id', Auth::id())
            ->where(['user_character_types.status' => 1])
            ->where('character_types.name', '!=','agent')
            ->select('character_types.*')
            ->get();
            

       $userportfolio=UserPortfolio::find($id);
       if(empty($userportfolio)){
        die("Page not found!");
       }
       // dd($userportfolio[0]);
       return view('portfolio.edit_portfolio', compact('userportfolio','character_type'));
    }

    public function updatePortfolio(Request $request, $id)
    {
        $width=300;
        $height=300;
        $portfolio = UserPortfolio::find($id);
        if(!empty($request->images)){
            $array = $request->images;
            // $images = $this->upload_multiple_image_save_in_folder($array, 'User_portfolio_images');
            $images = $this->upload_multiple_image_and_resize_save_in_folder($array, 'User_portfolio_images',$width,$height);
            $img_string = implode(';', $images);
            if(!empty($portfolio->images)){
                $portfolio->images = $portfolio->images.';'.$img_string;
            }else{
                $portfolio->images = $img_string;
            }
        }
        $portfolio->character_type_id= $request->character_type_id;
        $portfolio->description= $request->description;
        $portfolio->title= $request->title;
        $portfolio->priority= $request->priority;
        $portfolio->start_date= $request->start_date;
        $portfolio->end_date= $request->end_date;
        $portfolio->update();
        return back();
    }

    public function delete($id)
    {
        DB::table('user_portfolios')
            ->where('id', $id)
            ->update(['status' => 0]);
        return back();
    }


    public function delete_image($id,$image_name)
    {
        $portfolio = UserPortfolio::find($id);
        $images = explode(';',$portfolio->images);
        foreach ($images as $key => $value) {
            if($value == $image_name){
                unset($images[$key]);
            }
        }
        if(count($images) == 1){
            $images = implode("",$images);
        }else{
            $images = implode(';',$images);
        }
        // dd($images);
        $portfolio->images = $images;
        $portfolio->update();
        File::delete("images/User_portfolio_images/" . $image_name);
        File::delete("images/User_portfolio_images/thumb_" . $image_name);

        return Response::json(['success' => 'removed']);
    }
}
