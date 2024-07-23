<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WebController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\WhishlistController;


use App\Http\Middleware\AdminAuthenticate;
use App\Http\Middleware\UserAuthenticate;









/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('adminlogin',[CategoryController::class , 'login_page'])->name('login_page');
Route::post('/signin_panel', [Controller::class, 'signin_panel'])->name('signin_panel');

Route::middleware('auth:admin')->group(function () {

    
Route::get('dashboard',[Controller::class , 'dashboard'])->name('dashboard');
Route::get('category',[CategoryController::class , 'category'])->name('category');
Route::get('category_list',[CategoryController::class , 'category_list'])->name('category_list');
Route::get('product',[ProductController::class , 'product'])->name('product');
Route::get('product_list',[ProductController::class , 'product_list'])->name('product_list');
Route::get('edit_image{id}',[ProductController::class , 'edit_image'])->name('edit_image');
Route::get('edit_product{id}',[ProductController::class , 'edit_product'])->name('edit_product');

Route::post('logout',[Controller::class , 'logout'])->name('logout');
Route::post('add_category',[CategoryController::class , 'add_category'])->name('add_category');
Route::post('change_category',[CategoryController::class , 'change_category'])->name('change_category');
Route::post('delete_item',[CategoryController::class , 'delete_item'])->name('delete_item');
Route::post('add_product',[ProductController::class , 'add_product'])->name('add_product');
Route::post('delete_product',[ProductController::class , 'delete_product'])->name('delete_product');
Route::post('delete_image',[ProductController::class , 'delete_image'])->name('delete_image');
Route::post('change_product',[ProductController::class , 'change_product'])->name('change_product');
Route::post('add_image',[ProductController::class , 'add_image'])->name('add_image');




});



Route::middleware('auth:web')->group(function () {

    Route::post('add_wishlist', [WhishlistController::class, 'add_wishlist'])->name('add_wishlist');
    Route::post('website_logout',[WebController::class , 'website_logout'])->name('website_logout');
    Route::post('clear_wishlist', [WhishlistController::class, 'clear_wishlist'])->name('clear_wishlist');
    Route::get('/wishlist',[WhishlistController::class , 'wishlist'])->name('wishlist');

    Route::get('/single_delete/{id}', [WhishlistController::class, 'single_delete'])->name('single_delete');
    Route::get('/cart_single_delete/{id}', [CartController::class, 'cart_single_delete'])->name('cart_single_delete');

    
    Route::post('add_to_cart', [CartController::class, 'add_to_cart'])->name('add_to_cart');
    Route::get('Cart',[CartController::class , 'Cart'])->name('Cart');

    Route::post('/update_quantity', [CartController::class, 'updateQuantity'])->name('update_quantity');
    
    Route::get('checkout',[CartController::class , 'checkout'])->name('checkout');

    
    

    
    

});



Route::get('/website_login_page',[WebController::class , 'website_login_page'])->name('website_login_page');
Route::post('/website_signin',[WebController::class , 'website_signin'])->name('website_signin');


Route::post('add_customer',[UserController::class , 'add_customer'])->name('add_customer');

Route::get('register',[WebController::class , 'register'])->name('register');

Route::get('/',[WebController::class , 'index'])->name('index');
Route::get('empty_cart',[WebController::class , 'empty_cart'])->name('empty_cart');
Route::get('Checkout',[WebController::class , 'Checkout'])->name('Checkout');
Route::get('register',[WebController::class , 'register'])->name('register');
Route::get('payment',[WebController::class , 'payment'])->name('payment');
Route::get('contact',[WebController::class , 'contact'])->name('contact');
Route::get('Products{id}',[WebController::class , 'Products'])->name('Products');

Route::get('about_us',[WebController::class , 'about_us'])->name('about_us');
// Route::get('login',[WebController::class , 'login'])->name('login');
Route::get('Profile',[WebController::class , 'Profile'])->name('Profile');
Route::get('Order',[WebController::class , 'Order'])->name('Order');
Route::get('product_listing_list{id}',[WebController::class , 'product_listing_list'])->name('product_listing_list');
Route::get('product_details{id}',[WebController::class , 'product_details'])->name('product_details');


































