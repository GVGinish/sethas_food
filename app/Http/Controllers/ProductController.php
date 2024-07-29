<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\ImageModel;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\DB;



class ProductController extends Controller
{
    public function product(){

        $page="product";
        $category = CategoryModel::get();
        return view('admin.product',compact('category','page'));
    }

    public function add_product(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required|max:25',
            'mrp' => 'required|numeric',
            'retail' => 'required|numeric',
            'description' => 'required',
            'weight' => 'required',
            'stock' => 'required',
        ]);

        $pro = new ProductModel();

        do {
            $pro_id = "PRO" . rand(10000, 99999);
            $check = ProductModel::where('product_id', $pro_id)->count();
        } while ($check > 0);

        

        if ($request->hasFile('primary_image')) {
            $primaryImage = $request->file('primary_image'); 
            if ($primaryImage) {
                // Generate a unique filename
                $primaryImageGen = time() . '_' . rand(1000, 9999) . '.' . $primaryImage->getClientOriginalExtension();
                $primaryImage->move(public_path('admin_asset/product_image'), $primaryImageGen);
                $primaryImageName = 'admin_asset/product_image/' . $primaryImageGen;
            } else {
                throw new \Exception('Uploaded file is not valid.');
            }
        }

        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $imagePaths = [];

            foreach ($images as $image) {
                $imageName = time() . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('admin_asset/product_image'), $imageName);
                $imagePaths[] = 'admin_asset/product_image/' . $imageName;
            }

            $pro->product_id = $pro_id;
            $pro->category_id = $request->input('category_id');
            $pro->product_name = $request->input('product_name');
            $pro->mrp = $request->input('mrp');
            $pro->retail = $request->input('retail');
            $pro->weight = $request->input('weight');
            $pro->description = $request->input('description');
            $pro->stock = $request->input('stock');
            $pro->image = $primaryImageName;

            $pro->save();

            $primary = new ImageModel();
            $primary->images = $primaryImageName;
            $primary->product_id = $pro_id;
            $primary->save();


            foreach ($imagePaths as $imagePath) {
                $img = new ImageModel();
                $img->product_id = $pro_id;
                $img->images = $imagePath;
                $img->save();
            }

           



            $request->session()->flash('success', 'Product added successfully');
            return redirect()->route('product_list');
        } else {
            $request->session()->flash('error', 'Product images are required');
            return redirect()->back();
        }
    }


    public function product_list()
    {
        $all_data = ProductModel::orderBy('id', 'DESC')
            ->with('category')
            ->get();
        $page="product_list";
        return view('admin.product_list', compact('all_data','page'));
    }

    public function delete_product(Request $request)
        {
            $product = ProductModel::find($request->input('id'));

            if (!$product) {
                $request->session()->flash('error', 'Product not found');
                return redirect()->back();
            }

            $product->delete();

            $all_images = ImageModel::where('product_id', $request->input('product_id'))->get();

            foreach ($all_images as $image) {
                $imagePath =  $image->images;

                if (file_exists($imagePath)) {
                    @unlink($imagePath);
                }

                $image->delete();
            }

            $request->session()->flash('success', 'Product deleted successfully');
            return redirect()->back();
        }

        public function delete_image(Request $request)
        {
            $image = ImageModel::find($request->input('id'));

            if (!$image) {
                $request->session()->flash('error', 'Image not found');
                return redirect()->back();
            }

            $imagePath = $image->images;

            if (file_exists($imagePath)) {
                @unlink($imagePath);
            }

            $image->delete();

            $request->session()->flash('success', 'Image deleted successfully');
            return redirect()->back();
        }







        public function view_product($id)
        {
            $edit = ProductModel::with('category')->findOrFail($id);
            
            $category = CategoryModel::where('category_id', $edit->category_id)->value('category'); // Corrected the column name
            $page="view_product";
            return view('admin.view_product', compact('edit', 'category','page'));
        }
        

        public function edit_product($id)
        {
            $edit = ProductModel::with('category')->findOrFail($id);
            $category = CategoryModel::orderBy('id', 'DESC')->get();
            $page="view_product";
            return view('admin.edit_product', compact('edit','category','page'));
        }

        

        public function change_product(Request $request)
{
    $request->validate([
        'category_id' => 'required',
        'product_name' => 'required|max:25',
        'mrp' => 'required|numeric',
        'retail' => 'required|numeric',
        'weight' => 'required',
        'description' => 'required',
        'stock' => 'required',
    ]);

    DB::beginTransaction();
    try {
        $pro = ProductModel::find($request->input('id'));
        if (!$pro) {
            throw new \Exception('Product not found');
        }

        $editimageName = $pro->image;

        if ($request->hasFile('new_image')) {
            $editimage = $request->file('new_image');
            if ($editimage) {
                // Generate a unique filename
                $editimageGen = time() . '_' . rand(1000, 9999) . '.' . $editimage->getClientOriginalExtension();
                $editimage->move(public_path('admin_asset/product_image'), $editimageGen);
                $editimageName = 'admin_asset/product_image/' . $editimageGen;
                // Delete old image if exists
                if ($pro->image && file_exists(public_path($pro->image))) {
                    @unlink(public_path($pro->image));
                }
            } else {
                throw new \Exception('Uploaded file is not valid.');
            }
        }

        $pro->category_id = $request->input('category_id');
        $pro->product_name = $request->input('product_name');
        $pro->mrp = $request->input('mrp');
        $pro->weight = $request->input('weight');
        $pro->retail = $request->input('retail');
        $pro->description = $request->input('description');
        $pro->stock = $request->input('stock');
        $pro->image = $editimageName;

        $pro->save();

        DB::commit();

        $request->session()->flash('success', 'Product edited successfully');
        return redirect()->route('product_list');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
}


public function add_image(Request $request)
{
    $pro_id = ProductModel::find($request->input('product_id'));

    

    if ($request->hasFile('add_image')) {
        $newImage = $request->file('add_image'); 
        if ($newImage) {
            // Generate a unique filename
            $newImageGen = time() . '_' . rand(1000, 9999) . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('admin_asset/product_image'), $newImageGen);
            $newImageName = 'admin_asset/product_image/' . $newImageGen;
        } else {
            throw new \Exception('Uploaded file is not valid.');
        }
    } else {
        $request->session()->flash('error', 'No image file provided');
        return redirect()->back();
    }

    $add_img = new ImageModel();
    $add_img->product_id = $request->input('product_id');
    $add_img->images = $newImageName;

    $add_img->save();

    $request->session()->flash('success', 'Image added successfully');
    return redirect()->back();
}



        
        




}
