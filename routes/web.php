<?php

use App\Http\Controllers\Cate_controller;
use App\Http\Controllers\Product_controller;
use App\Http\Controllers\Saleproduct_controller;
use App\Http\Controllers\Thuonghieu_controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/dashboard', function () {
//     return view('dashboard.dashboard');
// });
Route::prefix('dashboard')->group(function () {
    Route::prefix('/callajax')->group(function () {
        Route::post('/addcate',[Cate_controller::class,'store']);
        Route::put('/delcate/{id}',[Cate_controller::class,'delete']);
        Route::put('/updatecate/{id}',[Cate_controller::class,'update']);

        Route::post('/addth',[Thuonghieu_controller::class,'store']);
        Route::put('/delth/{id}',[Thuonghieu_controller::class,'delete']);
        Route::put('/updateth/{id}',[Thuonghieu_controller::class,'delete']);

        Route::get('/getthbycate/{cate}',[Thuonghieu_controller::class,'getbycate']);

        Route::get('/productbytext/{text}',[Product_controller::class,'getProductByText']);
    });
    Route::post('/product/addproductinterface',[Product_controller::class,'store_product_interface'])->name('product.interface');
    Route::put('/product/editproductinterface/{id}',[Product_controller::class,'edit_product_interface'])->name('product.edit');
    Route::get('/product/addnew', [Product_controller::class,'addnewindex'])->name('product.add');
    Route::get('/danh-muc', [Cate_controller::class,'getView']);
    // Route::post('/danh-muc',[Cate_controller::class,'store']);
    Route::get('/thuong-hieu',[Thuonghieu_controller::class,'index']);
    Route::get('/san-pham',[Product_controller::class,'index'])->name('product.index');
    Route::get('/san-pham/edit/{id}',[Product_controller::class,'editview']);
    Route::get('/dang-ban',[Saleproduct_controller::class,'index'])->name('saleproduct.index');
    Route::get('/dang-ban/them',[Saleproduct_controller::class,'addview']);
    Route::post('/dang-ban/addnew',[Saleproduct_controller::class,'store'])->name('saleproduct.store');
    Route::get('/dang-ban/edit/{id}',[Saleproduct_controller::class,'editview']);
    Route::put('/dang-ban/update/{id}',[Saleproduct_controller::class,'update'])->name('saleproduct.update');
    Route::get('/', function () {
        return view('dashboard.dashboard');
    });
});
Route::get('/san-pham', function () {
    return view('cate');
});
Route::get('/chi-tiet/{id}',[Product_controller::class,'detail']);
Route::get('/', [Product_controller::class,'getHomepage']);

