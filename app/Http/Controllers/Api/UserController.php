<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
         
            'email' => 'required|unique:users',
           
            'password' => 'required|min:6',
        ], [
            'name.required' => 'The first name field is required.',
            'email.required' => 'The last name field is required.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => "Couldn't validate"], 403);
        }
        $user = User::create([
            'name' => $request->name,
           
            'email' => $request->email,
        
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('RestaurantCustomerAuth')->accessToken;


        return response()->json(['token' => $token, 'name'=>$user->name ], 200);
    }
    
        public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => "Errors"], 403);
        }

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('RestaurantCustomerAuth')->accessToken;
            

            return response()->json(['token' => $token, 'name'=>auth()->user()->name], 200);
        } else {
      
            return response()->json([
                'errors' => "Something went wrong"
            ], 401);
        }
    }

}