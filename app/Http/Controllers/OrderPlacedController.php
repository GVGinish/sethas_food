<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderPlacedModel;
use App\Models\CartModel;
use App\Models\ProductModel;
use App\Models\AddressModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;




class OrderPlacedController extends Controller
{

    // protected $razorpayKey;
    // protected $razorpaySecret;
    // protected $api;

    // public function __construct()
    // {
    //     $this->razorpayKey = 'rzp_test_7pGhFZaps8CWA2';
    //     $this->razorpaySecret = 'SSdF5OsusWf32Lm5s1KM35AA';
    //     $this->api = new Api($this->razorpayKey, $this->razorpaySecret);
    // }


    // public function conform_appointment(Request $request)
    // {

        

    //     $input = $request->all();
    //     $order = $this->api->order->create([
    //         'receipt' => 'order_'.$input['name'],
    //         'amount' => $input['amount'] * 100, // amount in paisa
    //         'currency' => 'INR'
    //     ]);
    
    //     $orderId = $order['id'];
    
    //     // Fetch the order details again if needed
    //     $order = $this->api->order->fetch($orderId);
    
    //     return response()->json([
    //         'orderId' => $orderId,
    //         'orderAmount' => $order['amount'],
    //         'currency' => $order['currency'],
    //         'orderReceipt' => $order['receipt'],
           
    //     ]);

       
    // }

    // public function verifyPayment(Request $request)
    // {
    //     // try {
    //         // Retrieve inputs from the request
    //         $razorpay_payment_id = $request->input('razorpay_payment_id');
    //         $razorpay_order_id = $request->input('razorpay_order_id');
    //         $razorpay_signature = $request->input('razorpay_signature');

 

    //         // Prepare attributes to verify with Razorpay API
    //         $attributes = [
    //             'razorpay_order_id' => $razorpay_order_id,
    //             'razorpay_payment_id' => $razorpay_payment_id,
    //             'razorpay_signature' => $razorpay_signature
    //         ];

    //         $api = new Api($this->razorpayKey, $this->razorpaySecret);
    //         $api->utility->verifyPaymentSignature($attributes);



    //         do{
    //                 $inv = "INV".rand(0000,99999);
    //                 $check = ConformModel::where('invoice',$inv)->count();
        
    //             }while($check > 0);
        
    //             $con = new ConformModel();
    //             $con->invoice = $inv;
    //             $con->service = $request->input('service');
    //             $con->name = $request->input('name');
    //             $con->phone = $request->input('phone');
    //             $con->email = $request->input('email');
    //             $con->appointment_date = $request->input('appointment_date');
    //             $con->appointment_time = $request->input('appointment_time');
    //             $con->amount = $request->input('amount');
    //             $con->company_name = (!empty($request->input('company_name'))) ? $request->input('company_name') : "";
    //             $con->gst = (!empty($request->input('gst'))) ? $request->input('gst') : "";

        
    //             $con->save();
        
    //             $appointmentDate = $request->input('appointment_date');
    //             $appointmentTime = $request->input('appointment_time');
        
             
    //             $parts = explode(" - ", $appointmentTime);
    //             $updatedString = $parts[0];
        
    //             $appointment = AppointmentModel::where('appointment_date', $appointmentDate)
    //                             ->where('appointment_time', date('H:i:s', strtotime($updatedString)))
    //                             ->first();
        
    //                 $appointment->status = 'appointed';
    //                 $appointment->save();
        

    //         $paymentHistory = new PaymentHistory();
    //         $paymentHistory->service = $request->input('service');
    //         $paymentHistory->name = $request->input('name');
    //         $paymentHistory->phone = $request->input('phone');
    //         $paymentHistory->email = $request->input('email');
    //         $paymentHistory->appointment_date = $request->input('appointment_date');
    //         $paymentHistory->appointment_time = $request->input('appointment_time');
    //         $paymentHistory->amount = $request->input('amount'); 
    //         $paymentHistory->company_name = (!empty($request->input('company_name'))) ? $request->input('company_name') : "";
    //         $paymentHistory->gst = (!empty($request->input('gst'))) ? $request->input('gst') : "";
            

    //         $paymentHistory->razorpay_payment_id = $razorpay_payment_id;
    //         $paymentHistory->razorpay_order_id = $razorpay_order_id;
    //         $paymentHistory->razorpay_signature = $razorpay_signature;
    //         $paymentHistory->save();
    //         try {
    //              $email_data = [
    //                 $request->input('service'),
    //                 $request->input('amount'),
    //                 $request->input('name'),
    //                 $request->input('phone'),
    //                 $request->input('email'),
    //                 $request->input('appointment_date'),
    //                 $request->input('appointment_time'),
    //                 $request->input('company_name'),
    //                 $request->input('gst'),
    //                 $inv,
    //                 $razorpay_order_id
                    
                    
    //             ];
                

    //     // Send email using WelcomeMail Mailable
    //              Mail::to($request->input('email'))->send(new WelcomeMail($email_data));
    //     } catch (\Exception $e) {
    //             \Log::error('Error sending registration email: ' . $e->getMessage());
    //         }

    //         return response()->json(['data' => 'success','order_id'=>$razorpay_payment_id]);
            
    //     // } catch (\Exception $e) {
    //     //     return response()->json(['data'=>'faild']);

    //     // }
    // }


    
public function place_order(Request $request,$id=null)
{

    $user_id = Auth::user()->user_id;
    $cart_data = CartModel::where('user_id', $user_id)->where('status', 'New')->get();

   
    $old_address = AddressModel::where('user_id',$user_id)->get();
        foreach($old_address as $old){
        $old->status = "Inactive";
        $old->save();
        }

    $id_active = AddressModel::find($id);
    $id_active->status = "Active";
    $id_active->save(); 

    $address_check = AddressModel::where('user_id', $user_id)->exists();


    if(!$address_check){
        $request->session()->flash('error', 'Please add a shipping address before checkout');
        return redirect()->back();
    }
    $check_active = AddressModel::where('user_id', $user_id)->where('status','Active')->count();
    
    if($check_active == 0){
        $request->session()->flash('error', 'Please select any one of the below address');
        return redirect()->back();
    }

    if ($cart_data->isEmpty()) {
        $request->session()->flash('error', 'Cart is empty');
        return redirect()->back();
    }

    $total_price = 0;

    do {
        $billing_id = "BILLID" . rand(10000, 99999);
        $check = CartModel::where('billing_id', $billing_id)->count();
       } while ($check > 0);

    DB::beginTransaction();

    try {
        foreach ($cart_data as $cart) {
            $product = ProductModel::where('product_id', $cart->product_id)->lockForUpdate()->first();

            if ($product) {
             
                $cart->status = "Order Placed";
                $cart->billing_id = $billing_id;
                $cart->order_date = date('Y-m-d H:i:s');
                $cart->save();

                $total_price += $cart->total_price;
            } else {
                throw new \Exception('Product not found for product ID: ' . $cart->product_id);
            }
        }

        $order = new OrderPlacedModel();
        $order->user_id = $user_id;
        $order->billing_id = $billing_id;
        $order->total = $total_price;
        $order->status = "Order Placed";
        $order->save();

        DB::commit();

        return view('website.success',compact('billing_id'));
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Order placement failed: ' . $e->getMessage());
        return redirect()->back()->withErrors(['Order placement failed: ' . $e->getMessage()]);
    }
}

public function order_list(){

        $latestOrderIds = OrderPlacedModel::select('billing_id', \DB::raw('MAX(id) as latest_id'))
                                            ->groupBy('billing_id')
                                            ->pluck('latest_id');

        $all_order = OrderPlacedModel::whereIn('id', $latestOrderIds)
                                       ->orderBy('id', 'DESC')
                                       ->where('status','Order placed')
                                       ->get();

        $page = "order_list";
        return view('admin.order_list',compact('all_order','page'));
}

public function bill_detail($bill_id = null,$user_id = null)
{
    $all_order = CartModel::with(['orderPlaced','user_data'])
                          ->where('billing_id', $bill_id)
                          ->orderBy('id', 'DESC')
                          ->get();

    $firstOrder = $all_order->first();

    $orderPlaced = $firstOrder ? $firstOrder->orderPlaced : null;
    $user_data = $firstOrder ? $firstOrder->user_data : null;
    $address = AddressModel::where('user_id',$user_id)->where('status','Active')->first();
    $c = 1;
    $page = "bill_detail";
    return view('admin.bill_detail', compact('all_order', 'bill_id', 'user_data', 'c','orderPlaced','address','page'));
}





public function Order() {
    $order_list = CartModel::select('billing_id', DB::raw('MAX(order_date) as latest_order_date'), 'status')
                            ->where('status', 'Order Placed')
                            ->groupBy('billing_id', 'status')
                            ->orderBy('latest_order_date', 'desc')
                            ->get();

    $order_list = $order_list->map(function($order) {
        $order->items = CartModel::where('billing_id', $order->billing_id)
                                 ->orderBy('id', 'desc')
                                 ->get(['product_name', 'quantity', 'retail', 'total_price','image']);
        return $order;
    });

    return view('website.Order', [
        'orderList' => $order_list,
        'cart_all' => $order_list->flatMap->items 
    ]);
}


public function change_status($billing_id = null, $status = null)
{

    
    $order = OrderPlacedModel::where('billing_id',$billing_id)->first();

    
    if (empty($order)) {
        return redirect()->back()->with('error', 'Order not found');
    }

    $order->status = $status;
    $order->save();

    $cartItems = CartModel::where('billing_id', $order->billing_id)->get();
    foreach ($cartItems as $cartItem) {
        $cartItem->status = $status;
        $cartItem->save();
    }

    return redirect()->back()->with('status', 'Status updated successfully');
}



public function shipped_list(){

    $latestOrderIds = OrderPlacedModel::select('billing_id', \DB::raw('MAX(id) as latest_id'))
                                        ->groupBy('billing_id')
                                        ->pluck('latest_id');

    $all_order = OrderPlacedModel::whereIn('id', $latestOrderIds)
                                   ->orderBy('id', 'DESC')
                                   ->where('status','Delivered')
                                   ->get();
                                   
    $page = "shipped_list";
    return view('admin.shipped_list',compact('all_order','page'));
}



public function cancelled_list(){

    $latestOrderIds = OrderPlacedModel::select('billing_id', \DB::raw('MAX(id) as latest_id'))
                                        ->groupBy('billing_id')
                                        ->pluck('latest_id');

    $all_order = OrderPlacedModel::whereIn('id', $latestOrderIds)
                                   ->orderBy('id', 'DESC')
                                   ->where('status','Cancelled')
                                   ->get();
                                   
    $page = "cancelled_list";
    return view('admin.cancelled_list',compact('all_order','page'));
}



public function bill(){

    $latestOrderIds = OrderPlacedModel::select('billing_id', \DB::raw('MAX(id) as latest_id'))
                                        ->groupBy('billing_id')
                                        ->pluck('latest_id');

    $all_order = OrderPlacedModel::whereIn('id', $latestOrderIds)
                                   ->orderBy('id', 'DESC')
                                   ->where('status','!=','Order placed')
                                   ->get();

    $page = "bill";
    return view('admin.bill',compact('all_order','page'));
}



















}

