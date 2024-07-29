<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartModel;
use App\Models\ProductModel;
use App\Models\WhishlistModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
 use App\Http\Controllers\CartController;


class CartController extends Controller
{
    // public function add_to_cart(Request $request){

    //     $check = CartModel::where('user_id',Auth::user()->user_id)->where('product_id',$request->input('product_id'))->count();
    //     $product = ProductModel::where('product_id',$request->input('product_id'))->first();

    //     if($check > 0){
    //     if($request->input('from') == "wishlist"){

    //         $whishlist = WhishlistModel::where('user_id',Auth::user()->user_id)->where('product_id',$request->input('product_id'))->first();

    //       $whishlist->delete();
    //     }
    //         $request->session()->flash('success','This product already exist in cart');
    //         return redirect()->route('Cart');
    //     }

    //     if($request->input('from') == "wishlist"){

    //       $whishlist = WhishlistModel::where('user_id',Auth::user()->user_id)->where('product_id',$request->input('product_id'))->first();

    //       $whishlist->delete();

          

    //     }
      
    //     $cart = new CartModel();
    //     $cart->user_id = Auth::user()->user_id;
    //     $cart->product_id = $product->product_id;
    //     $cart->product_name = $product->product_name;
    //     $cart->mrp = $product->mrp;
    //     $cart->retail = $product->retail;
    //     $cart->total_price = $product->retail;
    //     $cart->image = $product->image;
    //     $cart->quantity = 1;

    //     $cart->save();
    //     return redirect()->route('Cart');

    // }

    public function add_to_cart(Request $request) {

        $userId = Auth::user()->user_id;
        $productId = $request->input('product_id');
        $from = $request->input('from');
    
        $isInCart = CartModel::where('user_id', $userId)->where('product_id', $productId)->where('status','New')->exists();
    
        if ($isInCart) {
            if ($from == "wishlist") {
                $this->removeFromWishlist($userId, $productId);
            }
            $request->session()->flash('success', 'This product already exists in the cart');
            return redirect()->route('Cart');
        }
    
        $product = ProductModel::where('product_id',$productId)->first();
        if (!$product) {
            $request->session()->flash('error', 'Product not found');
            return redirect()->route('Cart');
        }
    
        if ($from == "wishlist") {
            $this->removeFromWishlist($userId, $productId);
        }

        do {
            $cart_id = "CARTID" . rand(10000, 99999);
            $check = CartModel::where('cart_id', $cart_id)->count();
        } while ($check > 0);

        $newcart = CartModel::where('user_id', $userId)->where('status','New')->first();
    
        $quantTotal = $product->retail * $request->input('quantity') ;
        
            $cart = new CartModel();
            $cart->billing_id = "";
            $cart->user_id = $userId;
            $cart->product_id = $product->product_id;
            $cart->cart_id = ((empty($newcart)) ? $cart_id : $newcart->cart_id );
            $cart->product_name = $product->product_name;
            $cart->mrp = $product->mrp;
            $cart->retail = $product->retail;
            $cart->total_price = (!empty($request->input('quantity')) ? $quantTotal : $product->retail)  ;
            $cart->weight = $product->weight;
            $cart->image = $product->image;
            $cart->quantity = (!empty($request->input('quantity')) ? $request->input('quantity') : 1);
            $cart->save();
      
    
        return redirect()->route('Cart');
    }

    private function removeFromWishlist($userId, $productId) {
        WhishlistModel::where('user_id', $userId)->where('product_id', $productId)->delete();
    }
    


    public function Cart()
    {
        $product = CartModel::where('user_id', Auth::user()->user_id)->where('status', 'New')->get();
    
        if ($product->isEmpty()) {
            return view('website.empty_cart');
        } else {
            return view('website.Cart', compact('product'));
        }
    }
    

    public function clear_Cart(Request $request)
{
    CartModel::query()->delete();
    $request->session()->flash('success', 'Cart Cleared');
    $data['product'] = CartModel::where('user_id',Auth::user()->user_id)->get();
    return view('website.Cart',$data);
}

public function cart_single_delete($id)
{
    $del = CartModel::where('id', $id)->first();
    if ($del) {
        $del->delete();
        $data['product'] = CartModel::where('user_id', Auth::user()->user_id)->get();
        return redirect()->route('Cart');
   
}
}

public function updateQuantity(Request $request)
{
    $cartItemId = $request->input('id');
    $newQuantity = $request->input('quantity');

    $cartItem = CartModel::find($cartItemId);
    if (!$cartItem) {
        return response()->json('cart_item_not_found', 404);
    }

    $product = ProductModel::where('product_id', $cartItem->product_id)->first();
    if (!$product) {
        return response()->json('product_not_found', 404);
    }

    if ($newQuantity < 1) {
        return response()->json(['status' => 'minus_value']);
    }

    if ($product->stock !== "Instock") {
        return response()->json(['status' => 'noquantity']);
    }

    $update_value = $cartItem->retail * $newQuantity;
    $cartItem->quantity = $newQuantity;
    $cartItem->total_price = $update_value;
    $cartItem->save();

    $cart_total = CartModel::select('total_price')
    ->where('user_id', Auth::user()->user_id)
    ->where('status', 'New')
    ->sum('total_price');


    if ($cart_total <= 0) {
        return response()->json(['status' => 'empty']);
    }

    return response()->json(['status' => 'success', 'update_value' => $update_value, 'cart_total' => $cart_total]);
}



}
