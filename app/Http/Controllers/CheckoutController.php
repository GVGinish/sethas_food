<?php

namespace App\Http\Controllers;
use App\Models\CartModel;
use App\Models\ProductModel;
use App\Models\AddressModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function Checkout(Request $request,$cart_id = null){

        $cart_product = CartModel::where('user_id',Auth::user()->user_id)->where('cart_id',$cart_id)->where('status','New')->get();

        foreach($cart_product as $cart){

            $pro_qty = ProductModel::where('product_id',$cart->product_id)->first();


            if($pro_qty->stock != "Instock"){

                $request->session()->flash('error','Please delete the out of stock product');
                return redirect()->back();

            }
            
        }

        $user_address = AddressModel::where('user_id',Auth::user()->user_id)->get();
        $user = User::where('user_id',Auth::user()->user_id)->first();

        return view('website.Checkout',compact('cart_product','user_address','user'));
    }
}
