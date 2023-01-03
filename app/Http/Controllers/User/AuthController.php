<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\User;

use App\Http\Requests\RegisterRequest;
use DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /* ============== Start Login Method ===============*/ 
    public function Login(Request $request){
        try{

            if (Auth::attempt($request->only('email','password'))) {
                $user = Auth::user();
                $token = $user->createToken('app')->accessToken;

                return response([
                    'message' => "Successfully Login",
                    'token' => $token,
                    'user' => $user
                ],200); // States Code
            }

        }catch(Exception $exception){
            return response([
                'message' => $exception->getMessage()
            ],400);
        }
        return response([
            'message' => 'Invalid Email Or Password' 
        ],401);

    } // end method 
    /* ============== Ebd Login Method ===============*/ 

    /* ============== Start Register Method ===============*/ 
    public function Register(RegisterRequest $request){

        try{

            $user = User::create([
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password) 
            ]);
            $token = $user->createToken('app')->accessToken;

            return response([
                'message' => "Registration Successfull",
                'token' => $token,
                'user' => $user
            ],200);

            }catch(Exception $exception){
                return response([
                    'message' => $exception->getMessage()
                ],400);
            } 

    } // end mehtod 
    /* ============== End Register Method ===============*/ 
}
