<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'fname' =>'required',
            'email' =>'required',
            'password' =>'required',
        ]);

        if($request->hasfile('photo')){
            $image = $request->photo;
            $image_logo_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/user_images/',$image_logo_new_name);
            $image_logo_new_name = 'uploads/user_images/'.$image_logo_new_name;

        }else{
            $image_logo_new_name = '';
        }

        User::insert([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'email' => $request->email,
            'created_at' => $request->date,
            'address' => $request->address,
            'profile_photo_path' => $image_logo_new_name,
            'password' => Hash::make($request->password),
        ]);


        Session::flash('success','User Created Successfully');
        return redirect()->route('user.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        try {
            if(file_exists($user->profile_photo_path)){
                unlink($user->profile_photo_path);
            }
        } catch (Exception $e) {

        }

        $user->delete();

        Session::flash('info', 'User Deleted Successfully');
        return redirect()->back();
    }
}
