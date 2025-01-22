<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Room;
use App\Models\Order;
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
        // fetching data from database
        $products = Product::all();
        return view('web.shop', [
            'products' => $products
        ]);
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

    public function placeorder(Request $request)
    {
        // dd($request);
        // DB::table('orders')]
        $order = new Order();
        $order->firstname = $request->firstname;
        $order->lastname = $request->lastname;
        $order->address = $request->address;
        $order->email = $request->email;
        $order->contact = $request->contact;


        $cart = session()->get('cart');
        if ($cart) {
            $total = 0;
            foreach ($cart as $id => $details) {
                $total += $details['quantity'] * $details['price'];
            }

            $order->total = $total;
            $order->save();
            // empty the cart
            session()->forget('cart');
            return redirect()->back();

        } else {
            echo "cart is empty";
        }

    }

}
