<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddressModel;
use Illuminate\Support\Facades\Auth;


class AddressController extends Controller
{
    public function add_address(Request $request){

        $request->validate([

            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'district'=>'required',
            'pincode' => 'required|digits:6',

        ]);

        $old_address = AddressModel::where('user_id',Auth::user()->user_id)->get();
            foreach($old_address as $old){
            $old->status = "Inactive";
            $old->save();
            }


        $address = new AddressModel();
        $address->user_id = Auth::user()->user_id;
        $address->address = $request->input('address');
        $address->city = $request->input('city');
        $address->district = $request->input('district');
        $address->state = $request->input('state');
        $address->pincode = $request->input('pincode');
        $address->status = "Active";

        $address->save();

        $request->session()->flash('success','Address added successfully');
        return redirect()->back();

    }

        public function get_address($id)
        {
            $address = AddressModel::find($id);
            return response()->json($address);
        }


        public function edit_address(Request $request){

            $request->validate([
    
                'address'=>'required',
                'city'=>'required',
                'state'=>'required',
                'district'=>'required',
                'pincode' => 'required|digits:6',
    
            ]);
    
            $old_address = AddressModel::where('user_id',Auth::user()->user_id)->get();
                foreach($old_address as $old){
                $old->status = "Inactive";
                $old->save();
                }
    
    
            $address = AddressModel::where('id',$request->input('id'))->first();
            $address->user_id = Auth::user()->user_id;
            $address->address = $request->input('address');
            $address->city = $request->input('city');
            $address->district = $request->input('district');
            $address->state = $request->input('state');
            $address->pincode = $request->input('pincode');
            $address->status = "Active";
    
            $address->save();
    
            $request->session()->flash('success','Address Edit successfully');
            return redirect()->back();
    
        }


        public function delete_address($id){

            $add = AddressModel::where('id',$id)->delete();
            return redirect()->back();
        
        }
    









    
}
