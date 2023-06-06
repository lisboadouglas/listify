<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{
    //Register API
    public function register(Request $request){

        //validation
        $rules = [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:5|confirmed',
        ];
        $feedbacks = [
            'min' => 'O campo :attribute deverá conter mais de 3 caracteres',
            'max' => 'O campo :attribute deverá conter menos de 250 caracteres',
            'required' => 'O campo :attribute é de preenchimento obrigatório',
            'email' => 'O campo :attribute deverá ser apenas tipo e-mail '
        ];
       //dd('antes do validate');
        $request->validate($rules, $feedbacks);
        
        //create user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        //return response
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully'
        ],201);
    }
    // Login API
    public function login(Request $request){
        //validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //check if user exist
        $user = User::where("email", $request->email)->first();
        if(isset($user->id)){
            //check if password equals a request
            if(Hash::check($request->password, $user->password)){
                //create a token auth
                $token = $user->createToken('authToken')->plainTextToken;
                //send a response
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login success',
                    'token' => $token
                ]);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => "Passsword incorrect"
                ], 401);
            }
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }
    }
    // Profile API
    public function profile(){
        return response()->json([
            "status" => "success",
            "message" => "User profile information",
            "data" => auth()->user()
        ]);
    }
    //Logout API
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'User logged out successfully'
        ]);
    }
}
