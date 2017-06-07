<?php

namespace App\Http\Controllers;


use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use DB;
use Hash;

class UserController extends Controller
{
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {
/*
        $data = User::orderBy('id','DESC')->paginate(5);

        return view('users.index',compact('data'))

            ->with('i', ($request->input('page', 1) - 1) * 5);*/

        $data = User::all();
        $location = Location::all();

        return view('users.index',compact('data' , 'location'));


    }

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $roles = Role::all('display_name','id');
        $location = Location::all();

        return view('users.create',compact('roles','location'));

    }
    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        /*$this->validate($request, [

            'name' => 'required',

            'email' => 'required|email|unique:users,email',

            'password' => 'required|same:confirm-password',

            'roles' => 'required'

        ]);*/


        $input = $request->all();


        $input['password'] = Hash::make($input['password']);


        $user = User::create($input);

        foreach ($request->input('roles') as $key => $value) {

            $user->attachRole($value);

        }


        return redirect()->route('users.index')

            ->with('success','User created successfully');

    }
    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $user = User::find($id);

        return view('users.show',compact('user'));

    }

    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $user = User::find($id);

        $roles = Role::all();

        $location = Location::all();

        $userRole = $user->roles->toArray();


        return view('users.edit',compact('user','roles','userRole','location'));

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


        $user = User::find($id);
        $user->detachRole($id);

        $value = $request->input('roles_id');
        $user->location_id = $request->input('location_id');

        $user->attachRole($value);

        $user->save();



        return redirect()->route('users.index')

            ->with('success','User updated successfully');

    }

    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        User::find($id)->delete();

        return redirect()->route('users.index')

            ->with('success','User deleted successfully');

    }






}
