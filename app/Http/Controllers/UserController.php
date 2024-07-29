<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

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

        $email=$request->input('email');
    
        $add = new User;
        $add->user_id = $user_id;
        $add->username = $request->input('username');
        $add->email = $email;
        $add->phone = $request->input('phone');
        $add->password = Hash::make($request->input('password'));
    
        $add->save();

        $email_data = [
            'username' => $request->input('username'),
            'email' => $email,
            'phone' => $request->input('phone'),
            'password' => $request->input('password'),
            'email_type' => 'registration', 
        ];
                
        
        Mail::to($email)->send(new WelcomeMail($email_data));
    
        return redirect()->route('website_login_page');
    }

}
