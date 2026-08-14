<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
use DB;
use Response;
use App\Http\Requests\StoreFAQPost;

class FaqsController extends Controller
{
	public function faqs()
    {
    	$faqs = Faq::orderBy('created_at', 'desc')->where('status', 1)->get();
        return view('faqs.faqs_list', compact('faqs'));

    }

    public function createFaqs()
    {
        return view('faqs.create_faq');

    }

    public function saveFaqs(StoreFAQPost $request)
    {
    	$faqs = new Faq;

        $faqs->title = $request->title;

        $faqs->description = $request->description;

        $faqs->status = 1;

        $faqs->save();

        return redirect('dashboard/faqs');	

    }

    public function editFaqs($id)
    {
    	 $faqs = Faq::find($id);
        return view('faqs.edit_faq', compact('faqs'));

    }

    public function updateFaqs(StoreFAQPost $request,$id)
    {
    	$faqs = Faq::find($id);
        $faqUpdate = $request->all();
        $faqs->update($faqUpdate);
        return redirect('dashboard/faqs');

    }

    public function deleteFaqs($id)
    {

        DB::table('faqs')
            ->where('id', $id)
            ->update(['status' => 0]);
        return Response::json(['success' => 'removed']);
    }

    public function trashFaqs()
    {
    	$faqs = Faq::orderBy('created_at', 'desc')->where('status', 0)->get();
        return view('faqs.faqs_trash', compact('faqs'));

    }

    public function changeStatusFaqs($id,$status_id)
    {
    	if ($status_id == 0) {
            $new_status = 1;
        }
        DB::table('faqs')
            ->where('id', $id)
            ->update(['status' => $new_status]);

        return redirect('dashboard/faqs');

    }
    public function helpCenter()
    {
    	$faqs = Faq::orderBy('created_at', 'desc')->where('status', 1)->get();
        return view('faqs.help_center', compact('faqs'));

    }
}
