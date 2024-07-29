<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;

class CategoryController extends Controller
{

    public function category(){

        $page="category";
        return view('admin.category',compact('page'));
    }

    public function category_list(){


        $page = "category_list";
        $all_data = CategoryModel::orderby('id', 'DESC')->get();
        return view('admin.category_list',compact('all_data','page'));
    }



    public function add_category(Request $request){

        $request->validate([

            'category' => 'required|max:15',
        ]);

        do{

            $cat = "CAT".rand(0000,99999);
            $check = CategoryModel::where('category_id',$cat)->count();

        }while($check > 0);

        $add = new CategoryModel();

        $add->category_id = $cat;
        $add->category = $request->input('category');

        $add->save();


        $request->session()->flash('success', 'Category added successfully');
        return redirect()->back();

    }

    public function change_category(Request $request){

        $request->validate([

            'category' => 'required|max:15',
        ]);

        $add = CategoryModel::find($request->input('id'));


        $add->category = $request->input('category');

        $add->save();


        $request->session()->flash('success', 'Category update successfully');
        return redirect()->back();

    }

    public function delete_item(Request $request){


        $del = CategoryModel::find($request->input('id'));



        $del->delete();

        $request->session()->flash('success', 'Category deleted successfully');
        return redirect()->back();

    }







}
