<?php

use Illuminate\Support\Facades\Route;



//language localization eng/myan
Route::get('lang/{lang}', [App\Http\Controllers\LanguageController::class, 'change'])->name("change.lang");


Route::get('/',[App\Http\Controllers\FrontendController::class,'welcome'])->name('welcome');




//shopping cart


Route::get('add-cart/{id}',[App\Http\Controllers\CartController::class,'add'])->name('cart.add');
Route::get('cart-list',[App\Http\Controllers\CartController::class,'list'])->name('cart.list');
Route::get('increase-cart/{id}',[App\Http\Controllers\CartController::class,'increase'])->name('cart.increase');
Route::get('decrease-cart/{id}',[App\Http\Controllers\CartController::class,'decrease'])->name('cart.decrease');
Route::get('remove-cart/{id}',[App\Http\Controllers\CartController::class,'remove'])->name('cart.remove');


//Checkout Process

Route::get('checkout',[App\Http\Controllers\OrderController::class,'checkout'])->name('checkout.open');
Route::post('checkout',[App\Http\Controllers\OrderController::class,'store'])->name('checkout.store');
Route::get('checkout/success',[App\Http\Controllers\OrderController::class,'checkoutsuccess'])->name('checkout.success');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::patch('/upload/{id}',[App\Http\Controllers\UserController::class,'upload'])->name('users.upload');


 Route::middleware(['auth', 'admin'])->group(function () {
        //Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
        // Other admin-specific routes


        //Order Management

        Route::resource('orders',App\Http\Controllers\OrderController::class);
        Route::get('order/search',[App\Http\Controllers\OrderController::class,'search'])->name('orders.search');
        //Order tracking
        Route::get('order-tracking/{id}',[App\Http\Controllers\OrderController::class,'ordertracking'])->name('orders.track');

        //Ordertracking Controller
        Route::get('order-update/{id}',[App\Http\Controllers\OrdertrackingController::class,'update'])->name('ordertrack.update');

        Route::resource('category',App\Http\Controllers\CategoryController::class);
        Route::resource('items',App\Http\Controllers\ItemController::class);


        Route::get('search',[App\Http\Controllers\ItemController::class,'search'])->name('items.search');

    });


?>
