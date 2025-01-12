<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;
use App\Models\Room;

Route::get("/", [WebsiteController::class, 'indexPage'])->name('mainPage');
Route::get('/aboutPage', [WebsiteController::class, 'aboutPage'])->name('about');
Route::get('/contactPage', [WebsiteController::class, 'contactPage'])->name('contact');
Route::get('/galleryPage', [WebsiteController::class, 'galleryPage'])->name('gallery');
Route::get('/blogPage', [WebsiteController::class, 'blogPage'])->name('blog');
Route::get('/roomPage', [WebsiteController::class, 'roomPage'])->name('room');

Route::get('/addroom', function () {
    $new_room = new Room();
    $new_room->room_number = 105;
    $new_room->description = " this is a single bed luxury room";
    $new_room->category = "4 star";
    $new_room->save();
    echo "room added successfully";
    echo "<br>";

    $rooms = Room::all();
    dd($rooms);
});
