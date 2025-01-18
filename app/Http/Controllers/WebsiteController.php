<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Room;
use Illuminate\Http\Request;


class WebsiteController extends Controller
{
    public function webIndexPage()
    {
        return view('web.index');
    }

    public function webMasterPage()
    {
        return view('web.webmaster');
    }
    public function webCheckoutPage()
    {
        return view('web.checkout');
    }
    public function shopPage()
    {
        return view('web.shop');
    }
    public function adminMasterPage()
    {
        return view('admin.adminmaster');
    }

    public function adminIndexPage()
    {
        $products = Product::all();
        return view('admin.adminIndex', [
            'products' => $products
        ]);
    }

}
