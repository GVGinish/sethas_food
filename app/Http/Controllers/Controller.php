<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


use App\Models\AdminModel;



class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    

public function login_page(){

    return view('admin/login_page');
  }





  public function signin_panel(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $credentials = $request->only('username', 'password');

    if (Auth::guard('admin')->attempt($credentials)) {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('login_page')->with('error', 'Invalid username or password');
    }
}



public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('login_page')->withHeaders([
        'Cache-Control' => 'no-cache, no-store, must-revalidate',
        'Pragma' => 'no-cache',
        'Expires' => '0',
    ]);
}


public function dashboard(){

    return view('admin.dashboard');
}



}
