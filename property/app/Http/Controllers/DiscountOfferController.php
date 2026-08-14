<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DiscountOffer;
use DB;
use Response;
class DiscountOfferController extends Controller
{
    public function listDiscountOffer()
    {
        $discountOffers = DiscountOffer::orderBy('created_at', 'desc')->where('status' ,'>=' ,1)->get();
        return view('discountOffer.discountOffer_list', compact('discountOffers'));
    }

    public function createDiscountOffer()
    {
        return view('discountOffer.create_discountOffer');

    }
    public function saveDiscountOffer(Request $request)
    {
        $discountOffer = new DiscountOffer;

        $discountOffer->name = $request->name;
        $discountOffer->percent_price = $request->percent_price;
        $discountOffer->status = 1;
        $discountOffer->save();

        return redirect('discountOffer');
    }

    public function editDiscountOffer($id)
    {
        $discountOffer = DiscountOffer::find($id);
        return view('discountOffer.edit_discountOffer', compact('discountOffer'));
    }

     public function updateDiscountOffer(Request $request, $id)
    {
        $discountOffer = DiscountOffer::find($id);
        $discountOfferUpdate = $request->all();
        $discountOffer->update($discountOfferUpdate);
        return redirect('discountOffer');
    }

    public function discountOfferDelete($id)
    {
     
        DB::table('discount_offers')
            ->where('id', $id)
            ->update(['status' => 0]);
        return Response::json(['success' => 'removed']);

    }

     public function discountOfferStatusChange($discountOffer_id, $status_id)
    {
        if ($status_id == 1) {
            $new_status = 2;
        } else if ($status_id == 2) {
            $new_status = 1;
        }  else if ($status_id == 0) {
            $new_status = 2;
        }
        DB::table('discount_offers')
            ->where('id', $discountOffer_id)
            ->update(['status' => $new_status]);
        return Response::json(['success' => $new_status]);
    }

    public function discountOfferRestore($id, $status_id)
    {
        if ($status_id == 0) {
            $new_status = 1;
        }
        DB::table('discount_offers')
            ->where('id', $id)
            ->update(['status' => $new_status]);

        return redirect('discountOffer');

    }

     public function discountOfferTrash()
    {
        $discountOffers = discountOffer::orderBy('created_at', 'desc')->where('status', 0)->get();
        return view('discountOffer.trash_discountOffer', compact('discountOffers'));
    }
}
