<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function create()
    {
        # getting it from database
        $brands = Brand::all();

        return view('admin.create_prod_form', [
            'brands' => $brands
        ]);

    }

    function store(Request $request)
    {
        // dump($request->name);
        // dump($request->price);
        // dump($request->sku);
        // dd($request->image);

        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;

        // new record in data
        $product->save();



        // if ($request->image != "") {
        //     $image = $request->image;
        //     $ext = $image->getClientOriginalExtension();
        //     $imageName = time() . "." . $ext; // Unique image name;

        //     // save image to products directory
        //     $image->move(public_path('/uploads/products'), $imageName);

        //     // save image in the database
        //     $product->image = $imageName;
        //     $product->save();
        // }



        return redirect()->route("admin-index");
    }



}
