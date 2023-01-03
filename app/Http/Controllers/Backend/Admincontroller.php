<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\User;

class Admincontroller extends Controller
{
   /*=================== Start Dashboard Methoed ===================*/
    public function dashboard(){
        
        return view('backend.dashboard');
    } // end method

    /*=================== End Dashboard Methoed ===================*/
    
    /*=================== Start Logout Methoed ===================*/
    public function AminLogout(Request $request){
        
        Auth::guard('web')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Admin Logout Successfully.', 
            'alert-type' => 'success'
        );
        return redirect()->route('login')->with($notification);
    } // end method
    /*=================== End Logout Methoed ===================*/

    /*=================== Start Dashboard Methoed ===================*/
    public function profileview(){

        $id = Auth::user()->id;
        $adminData = User::find($id);

        // dd($adminData);
        
        return view('backend.profile_view', compact('adminData'));
    } // end method

    /*=================== End Dashboard Methoed ===================*/

    /* =============== Start StoreProfile Method ================*/
    public function profilestore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->fname = $request->fname;
        $data->lname = $request->lname;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/user_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();

        Session::flash('success','Profile Updated Successfully');
        return redirect()->back();

    }// End Method
}
