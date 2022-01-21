<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ThanksController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Http\Controllers\ManagerController;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/done', [ReserveController::class, 'index'])->name(
        'reserve.index'
    );
    Route::get('/mypage', [UserController::class, 'index'])->name(
        'user.index'
    );
    Route::resource('users', UserController::class)->only([
        'show'
    ]);
    Route::resource('likes', LikeController::class)->only([
        'store', 'destroy'
    ]);
    Route::resource('reserves', ReserveController::class)->only([
        'store', 'edit', 'update', 'destroy'
    ]);
    Route::resource('reviews', ReviewController::class)->only([
        'store', 'update', 'destroy'
    ]);
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/admin/login', [AdminLoginController::class, 'create'])->name(
        'admin.login'
    );
    Route::get('/manager/login', [ManagerController::class, 'create'])->name(
        'manager.login'
    );
});

Route::get('/', [ShopController::class, 'index'])->name(
    'shop.index'
);
Route::get('/detail/{shop_id}', [ShopController::class, 'show'])->name(
    'shop.show'
);

Route::resource('logins', AdminLoginController::class)->only([
    'store'
]);
Route::resource('registers', AdminRegisterController::class)->only([
    'store'
]);
Route::resource('managers', ManagerController::class)->only([
    'store'
]);
Route::resource('thanks', ThanksController::class)->only([
    'index'
]);
Route::resource('reviews', ReviewController::class)->only([
    'show'
]);

Route::prefix('admin')->middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::get('/', [AdminLoginController::class, 'index'])->name(
        'admin.index'
    );
    Route::get('/register', [AdminRegisterController::class, 'create'])->name(
        'admin.manager_register'
    );
    Route::get('/shop_register', [ShopController::class, 'create'])->name(
        'admin.shop_register'
    );
    Route::resource('shops', ShopController::class)->only([
        'store'
    ]);
});

Route::middleware(['auth', 'can:isStoreManager'])->group(function () {
    Route::resource('managers', ManagerController::class)->only([
        'index'
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
