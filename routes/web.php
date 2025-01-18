<?php

use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Room;

Route::get('/web/index', [WebsiteController::class, 'webIndexPage'])->name('web-index');
Route::get('/web/master', [WebsiteController::class, 'webMasterPage'])->name('web-master');
Route::get('/web/shop/{brand_id?}', [WebsiteController::class, 'shopPage'])->name('web-shop');

Route::get('/web/checkout', [WebsiteController::class, 'webCheckoutPage'])->name('web-checkout');
Route::post('/web/placeorder', [WebsiteController::class, 'placeorder'])->name('web-place-order');





Route::get('/admin/index', [WebsiteController::class, 'adminIndexPage'])->name('admin-index');
Route::get('/admin/master', [WebsiteController::class, 'adminMasterPage'])->name('admin-master');

Route::get('admin/products/create', [ProductController::class, 'create'])->name('admin-product-create');
Route::post('admin/products/store', [ProductController::class, 'store'])->name('admin-products-store');
