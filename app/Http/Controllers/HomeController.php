<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\User;
use Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::latest()->get();
        return response()->json($users);
    }


    /*=================== Start profileview Methoed ===================*/
    public function profileview(){

        $id = Auth::user()->id;
        $adminData = User::find($id);
        // dd($adminData);
        
        return response()->json($adminData);

    } // end method
    /*=================== End profileview Methoed ===================*/

    /*=================== Start store Methoed ===================*/
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

        $users = User::insert([
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

        return response()->json($users);
    }

    /*=================== End store Methoed ===================*/
}
