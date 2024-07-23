<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function add_customer(Request $request){

        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits_between:10,12',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|string|min:6|same:password',

        ]);

        
        do {
            $user_id = "USER" . rand(10000, 99999);
            $check = User::where('user_id', $user_id)->count();
        } while ($check > 0);

        
    
        $add = new User;
        $add->user_id = $user_id;
        $add->username = $request->input('username');
        $add->email = $request->input('email');
        $add->phone = $request->input('phone');
        $add->password = Hash::make($request->input('password'));
    
        $add->save();
    
        return redirect()->route('website_login_page');
    }

}
