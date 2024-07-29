<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CouponModel;

class CouponController extends Controller
{

    public function coupon_list(){

        $page = "coupon_list";
        $all_data = CouponModel::orderBy('id','DESC')->get();
        return view('admin.coupon_list',compact('all_data','page'));

    }

    public function coupon(){
        $page = "coupon";
        return view('admin.coupon',compact('page'));

    }

    public function add_coupon(Request $request){

        $request->validate([
            'coupon_code' => 'required|string|max:255',
            'coupon_amount' => 'required|numeric|min:0',
        ]);
        $coupon = new CouponModel();
        $coupon->coupon_code = $request->input('coupon_code');
        $coupon->coupon_amount = $request->input('coupon_amount');

        $coupon->save();

        $request->session()->flash('success','Coupon added succesfully');
        return redirect()->route('coupon_list');

    }
     public function delete_coupon(Request $request){

        CouponModel::where('id',$request->input('id'))->delete();
        $request->session()->flash('success','Coupon deleted succesfully');
        return redirect()->back();

     }

     public function change_coupon(Request $request){

        $coupon = CouponModel::where('id',$request->input('id'))->first();
        $coupon->coupon_amount = $request->input('coupon_amount');

        $coupon->save();

        $request->session()->flash('success','Coupon amount change succesfully');
        return redirect()->route('coupon_list');


     }
    
}
