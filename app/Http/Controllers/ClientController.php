<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddClientPostValidation;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::where('status', 1)->where('user_id', Auth::id())->get();
//        return view('client.client_list', compact('clients'));
        return view('dashboard.clients.client-list', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('client.createClient');
        return view('dashboard.clients.createClient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddClientPostValidation $request)
    {
        $client = new Client();
        $client->name = $request->name;
        $client->user_id = Auth::id();
        $client->mobile_no = $request->mobile_no;
        $client->address = $request->address;
        $client->status = 1;
        $client->save();
        return redirect('client');
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
        $client = Client::find($id);
        return view('dashboard.clients.editClient', compact('client'));
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
        $client = Client::find($id);
        $clientUpdate = $request->all();
        $client->update($clientUpdate);
        return redirect('client');
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
        DB::table('clients')
            ->where('id', $id)
            ->update(['status' => 0]);
        return redirect('client');
    }

    public function clientStatusChange($client_id, $status_id)
    {
        if ($status_id == 0) {
            $new_status = 1;
        }
        DB::table('clients')
            ->where('id', $client_id)
            ->update(['status' => $new_status]);
        return redirect('client');
    }

    public function clientTrash()
    {
        $clients = Client::where('status', 0)->where('user_id' ,Auth::id())->get();
//        return view('client.clientTrash', compact('clients'));
        return view('dashboard.clients.trashClient', compact('clients'));
    }

    public function update_client(AddClientPostValidation $request, $id)
    {
        $client = Client::find($id);
        $clientUpdate = $request->all();
        $client->update($clientUpdate);
        return redirect('client');
    }
//    public function image_tiles()
//    {
//
//        return view('imageTiles.image_tile');
//
//    }
//
//    public function image_tiles()
//    {
//
//        return view('imageTiles.image_tile');
//
//    }
//    public function upload_image_tiles()
//    {
//
//        return view('imageTiles.uploadImage');
//
//    }
//    public function show_uploaded_image()
//    {
////        dd(54654);
////        dd($_FILES);
//        return view('imageTiles.uploaded_images');
//
//    }

}
