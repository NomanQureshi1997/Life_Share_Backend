<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function createAccount(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6'
        ]);

        $user = User::create([
            'name' => $attr['name'],
            'password' => bcrypt($attr['password']),
            'email' => $attr['email']
        ]);

        return response([
            'token' => $user->createToken('tokens')->plainTextToken
        ]);
    }

    public function signin(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return response('Credentials not match', 401);
        }

        return response([
            'token' => auth()->user()->createToken('API Token')->plainTextToken,
            'userInfo' => auth()->user()
        ],200);
    }

    public function signout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }

    public function updateProfile(Request $request)
    {
        try{
            $attr = $request->validate([
                'name' => 'required|string|regex:/^[a-zA-Z0-9\s]+$/',
            ]);
            User::where('id', auth()->user()->id)
            ->update(['name' => $request->name]);
    
            return response([
                'update' => 'updated successfuly'
            ],200);
        }catch (Exception $e) {

            return response('error occured', 422);
        }
    }
    public function passwordReset(Request $request)
    {
        try{

            $attr = $request->validate([
                'currentPassword' => 'required|string|min:6',
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6' 
            ]);
            
            if ( !(hash::check($attr['currentPassword'], auth()->user()->password))) {
                return response('Password in invalid', 401);
            }

            User::where('id', auth()->user()->id)
            ->update(['password' => bcrypt($attr['password'])]);

            return response([
                'update' => 'updated successfuly'
            ],200);
        }catch (Exception $e) {

            return response('error occured', 422);
        }
    }
}
