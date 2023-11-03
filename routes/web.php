<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    Route::get('/dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index']);
    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('/sliders','index');
        Route::get('/sliders/create','create');
        Route::post('/sliders/create','store');
        Route::get('/sliders/{slider}/edit', 'edit');
        Route::put('/sliders/{slider}','update');
        Route::get('/sliders/{slider}/delete','destroy');



    });
    //route categories
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        
        Route::get('/category','index');
        Route::get('/category/create','create');
        Route::post('/category','store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}','update');
        Route::delete('/category/{category}/','destroy');
    });
    //route product
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products','index');
        Route::get('/products/create','create');
        Route::post('/products','store');
        Route::get('/products/{product}/edit','edit');
        Route::put('/products/{product}','update');
        Route::get('/products/{product}/delete','destroy');
        ////
        Route::get('/product-image/{product_image_id}/delete','destroyImage');
        Route::post('/product-color/{prod_color_id}','updateProdColorQty');
        Route::get('/product-color/{prod_color_id}/delete','deleteProdColor');
    
    });

    Route::get('/brands', App\livewire\Admin\Brand\Index::class)->name('brands');
    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        
        Route::get('/colors','index');
        Route::get('/colors/create','create');
        Route::post('/colors/create','store');
        Route::get('/colors/{color}/edit','edit');
        Route::put('/colors/{color_id}','update');
        Route::get('/colors/{color_id}/delete','destroy');

    });
});