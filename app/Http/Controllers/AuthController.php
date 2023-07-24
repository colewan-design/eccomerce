<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Customers;

class AuthController extends Controller
{
    public function userLogin(Request $request) {
        // login user
        $user_data = (object) [];
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $user_customer_data = Customers::where('customer_ref', $user->customer_ref)->first();
            // generate token
            $token_hash = Hash::make($request->customer_ref);
            $user_data->token = $user->createToken($token_hash)->plainTextToken;
            $user_data->customer_ref = $user->customer_ref;
            $user_data->customer_fname = $user->customer_fname;
            $user_data->customer_lname = $user->customer_lname;

            return $this->returnResponse(200, 'success', $user_data, 'Welcome, '.$user->name);
        } else {
            // failed login
            return $this->returnResponse(500, 'error', $user_data, 'Login failed');
        }
    }

    public function userLogout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $this->returnResponse(200, 'success', null, 'Logged out successfully');
    }
}
