<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    public function Forget(){

        return view('website.Forget');
    }
    public function reset_password($user_id = null){

        $user = User::where('user_id',$user_id)->first();
        return view('website.reset_password',compact('user'));
    }

    
    public function sent_mail(Request $request) {
        $request->validate(['email' => 'required|email']);
    
        $email = $request->input('email');
        $check_mail = User::where('email', $email)->first();
    
        if (is_null($check_mail)) {
            return redirect()->back()->with('error_message','Please enter a correct email ID');
        }
    
        $email_data = [
            'link' => asset('reset_password/' . $check_mail->user_id),
            'username' => $check_mail->username,
            'email_type' => 'forgot_password', 
        ];
        
        Mail::to($email)->send(new WelcomeMail($email_data));
        
    
        return redirect()->back()->with('message', 'Password change link was sent to your email');
    }

    public function change_password(Request $request) {

        $request->validate([
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|string|min:6|same:password',
        ]);
  
        $user = User::where('user_id',$request->input('user_id'))->first();
        $user->password = Hash::make($request->input('password'));
        $user->save();
      
 
        return redirect()->route('website_login_page')->with('message','Password changed successfully');
    }

    
    
}
