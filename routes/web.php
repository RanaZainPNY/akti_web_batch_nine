<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return view('index');
});

Route::get('/aboutPage', function () {
    // return view('welcome');
    return view('about');
});

Route::get('/contactPage', function () {
    // return view('welcome');
    return view('contact');
});


Route::get('/galleryPage', function () {
    // return view('welcome');
    return view('gallery');
});

Route::get('/blogPage', function () {
    // return view('welcome');
    return view('blog');
});

Route::get('/roomPage', function () {
    // return view('welcome');
    return view('room');
});

Route::get('/aboutPage', function () {
    // return view('welcome');
    return view('about');
});

Route::get('/roomPage', function () {
    // return view('welcome');
    return view('room');
});

