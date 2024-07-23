<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WhishlistModel;
use App\Models\ProductModel;
use App\Models\User;

use Illuminate\Support\Facades\Auth;




class WhishlistController extends Controller
{
    public function add_wishlist(Request $request){

        $check = WhishlistModel::where('user_id',Auth::user()->user_id)->where('product_id',$request->input('product_id'))->count();
        $product = WhishlistModel::where('user_id',Auth::user()->user_id)->get();

        if($check > 0){
            $request->session()->flash('success','This product already exist');
            return view('website.wishlist',compact('product'));
        }
      
        $whi = new WhishlistModel();
        $whi->product_id = $request->input('product_id');
        $whi->user_id = Auth::user()->user_id;
        $whi->save();
        return redirect()->route('wishlist');

    }


    // public function clear_wishlist(Request $request){

    //     $clear = WhishlistModel::all();

    //     $clear->delete();
    //     $request->session()->flash('success','Whishlist Cleared');
    //     return redirect()->back();
    // }

    public function wishlist(Request $request)
    {
        $data['product'] = WhishlistModel::where('user_id',Auth::user()->user_id)->get();
        return view('website.wishlist',$data);
    }

    public function clear_wishlist(Request $request)
{
    WhishlistModel::query()->delete();
    $request->session()->flash('success', 'Wishlist Cleared');
    $data['product'] = WhishlistModel::where('user_id',Auth::user()->user_id)->get();
    return view('website.wishlist',$data);
}

public function single_delete($id)
{
    $del = WhishlistModel::where('id', $id)->first();
    if ($del) {
        $del->delete();
        $data['product'] = WhishlistModel::where('user_id', Auth::user()->user_id)->get();
        return redirect()->route('wishlist');
   
}
}



}


