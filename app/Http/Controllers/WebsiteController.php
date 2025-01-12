<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;


class WebsiteController extends Controller
{
    //
    public function indexPage()
    {
        return view('index');
    }
    public function aboutPage()
    {

        return view('about');
    }

    public function contactPage()
    {
        return view('contact');
    }

    public function galleryPage()
    {
        return view('gallery');
    }

    public function blogPage()
    {
        return view('blog');

    }
    public function roomPage()
    {
        return view('room');
    }

}
