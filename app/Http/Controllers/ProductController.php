<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Facades\File;
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

        if ($request->image != "") {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension(); # extension
            $imageName = time() . "." . $ext; // Unique image name; 1130933.png

            // save image to products directory
            $image->move(public_path('/uploads/products'), $imageName);

            // save image in the database
            $product->image = $imageName;
            $product->save();
        }

        return redirect()->route("admin-index");
    }



    public function addToCart($id)
    {
        dump($id);

        // $cart = [
        //     '6' => [
        //         'name' => 'abc',
        //         'price' => 239,
        //         'sku' => '3939UU',
        //         'description' => "lorem ipsum",
        //         'image' => '399303393.jpg',
        //         'quantity' => '1',
        //     ],
        //     '7' => [

        //     ],

        // ];

        $product = Product::findOrFail($id);

        // for creating session
        $cart = session()->get('cart');

        // if product is already added in the cart
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // when product will be added first time in the cart
            $cart[$id] = [
                "name" => $product->name,
                "sku" => $product->sku,
                "price" => $product->price,
                "description" => $product->description,
                "image" => $product->image,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back();

    }

    function getCart()
    {
        $cart = session()->get('cart');
        dd($cart);
    }

    function delete($id)
    {
        // dd($id);
        $product = Product::findOrFail($id);
        // file removal from public directory
        if ($product->image != "") {
            // delete associated image file
            File::delete(public_path('/uploads/products/' . $product->image));
        }
        // product data removal from database
        $product->delete();

        return redirect()->route('admin-index');
    }

    function edit($id)
    {
        // dd($id);
        $product = Product::findOrFail(id: $id);
        $brands = Brand::all();
        return view('admin.edit_prod_form', [
            'product' => $product,
            'brands' => $brands
        ]);
    }


    function update(Request $request)
    {
        // dd($request->id);
        $product = Product::findOrFail($request->id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;
        $product->save();

        if ($request->image != "") {
            // delete old image
            File::delete(public_path('uploads/products/' . $product->image));
            // Create new image file name
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; // unique Image Name

            //save image to the public directory
            $image->move(public_path('uploads/products/'), $imageName);
            $product->image = $imageName;
            $product->save();

        }

        return redirect()->route('admin-index');
    }

}
