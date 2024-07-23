<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\ImageModel;

use Illuminate\Support\Facades\Validator;



class WebController extends Controller
{
   
    public function index(){

        return view('website.index');
    }

    public function website_login_page(){

        return view('website.login_page');
      }


      public function website_signin(Request $request)
      {
          $request->validate([
              'email' => 'required',
              'password' => 'required',
          ]);
      
          $credentials = $request->only('email', 'password');
      
          if (Auth::guard('web')->attempt($credentials)) {
              return redirect()->route('index');
          } else {
              return redirect()->route('website_login_page')->with('error', 'Invalid email or password');
          }
      }

      public function website_logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('index')->withHeaders([
        'Cache-Control' => 'no-cache, no-store, must-revalidate',
        'Pragma' => 'no-cache',
        'Expires' => '0',
    ]);
}
    
      

    
    
    public function Cart(){

        return view('website.Cart');
    }

    public function empty_cart(){

        return view('website.empty_cart');
    }

    public function Checkout(){

        return view('website.Checkout');
    }

    public function register(){

        return view('website.register');
    }

    

    public function payment(){

        return view('website.payment');
    }

    public function contact(){

        return view('website.contact');
    }


    public function Products($id = null)
    {
        if (!empty($id) && $id != "All") {
            $categoryModel = CategoryModel::where('category', $id)->first();
            $products = ProductModel::where('category_id', $categoryModel->category_id)->paginate(6);
        } else {
            $products = ProductModel::with('category')->paginate(6);
        }
    
        $data['category_list'] = CategoryModel::get();
        $data['category'] = $id;
        $data['all_pro'] = $products;
        return view('website.Product', $data);
    }
    
    

    public function about_us(){

        return view('website.about_us');
    }

    // public function login(){

    //     return view('website.login');
    // }

    public function Order(){

        return view('website.Order');
    }

    public function Profile(){

        return view('website.Profile');
    }

    public function product_listing_list($id = null)
{
    if (!empty($id)) {
        $categoryModel = CategoryModel::where('category', $id)->first();
        $products = ProductModel::where('category_id', $categoryModel->category_id)->get();
    } else {
        $products = ProductModel::with('category')->get();

    }

    $data['all_pro'] = $products;
    return view('website.product_listing_list', $data);
}

public function product_details($id = null)
{
    if (!empty($id)) {
        $detail = ProductModel::where('product_id', $id)->first();
        $images= ImageModel::where('product_id',$id)->get();
       
    } else {
        $detail = ProductModel::all();
    }

    $data['detail'] = $detail;
    $data['images'] = $images;


    return view('website.product_details', $data);
}




}
