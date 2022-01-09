<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ThanksController;

Route::get('/',[ShopController::class,'index'])->name(
    'shop.index'
);
Route::get('/detail/{shop_id}',[ShopController::class,'show'])->name(
    'shop.show'
);
Route::get('/done',[ReserveController::class,'index'])->name(
    'reserve.index'
);
Route::get('/mypage',[UserController::class,'index'])->name(
    'user.index'
);
Route::resource('likes',LikeController::class)->only([
    'store','destroy'
]);
Route::resource('reserves',ReserveController::class)->only([
    'store','destroy'
]);
Route::resource('thanks',ThanksController::class)->only([
    'index'
]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
