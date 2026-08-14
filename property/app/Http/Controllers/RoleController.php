<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\characterType;
use App\UserCharacterType;
use Session;
use DB;
use Auth;
use App\Property;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::where('status',0)->get();
        return view('role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $role=new Role(['name' =>$request->name]);
            $role->save();
            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $role=Role::find($id);
            return view('role.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $role=Role::find($id);
            $role->name=$request->name;
            $role->update();
            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $role=Role::find($id);
        $role->status =2;
        $role->update();
        return back();
    }

    public function test()
    {   
        // $users=User::with('UserCharacterTypes')->get();
        $user=User::where('id',Auth::id())->get();
        $user=$user->load('UserCharacterType');

        dd($user);
        $users=CharacterType::with('UserCharacterTypes')->get();
        foreach($users as $user)
        {
            $role_id=$user->UserCharacterType[0]->id;
        }
    }
}
