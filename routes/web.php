<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ThanksController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Http\Controllers\Admin\AdminShopController;
use App\Http\Controllers\Manager\ManagerLoginController;
use App\Http\Controllers\Manager\ManagerShopController;
use App\Http\Controllers\Manager\ManagerReserveController;
use App\Http\Controllers\Emails\MailSendController;

Route::group(['middleware' => ['auth', 'can:isGeneralUser', 'verified']], function () {
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
    Route::resource('qrCodes', QrCodeController::class)->only([
        'show',
    ]);
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/admin/login', [AdminLoginController::class, 'create'])->name(
        'admin.login'
    );
    Route::get('/manager/login', [ManagerLoginController::class, 'create'])->name(
        'manager.login'
    );
});

Route::get('/', [ShopController::class, 'index'])->name(
    'shop.index'
);
Route::get('/detail/{shop_id}', [ShopController::class, 'show'])->name(
    'shop.show'
);
Route::get('/provisional', [ThanksController::class, 'create'])->name(
    'provisional'
);
Route::resource('adminLogins', AdminLoginController::class)->only([
    'store'
]);
Route::resource('managerLogins', ManagerLoginController::class)->only([
    'store'
]);
Route::resource('thanks', ThanksController::class)->only([
    'index', 'create'
]);
Route::resource('reviews', ReviewController::class)->only([
    'show'
]);
Route::resource('courses', CourseController::class)->only([
    'create', 'store', 'show', 'edit', 'update', 'destroy'
]);
Route::post('/purchase', function (Request $request) {
    $request->user()->charge(
        $request->price,
        $request->paymentMethodId
    );

    return redirect('done');
})->middleware(['auth'])->name('purchase.post');

Route::prefix('admin')->middleware(['auth', 'can:isAdmin', 'verified'])->group(function () {
    Route::get('/', [AdminLoginController::class, 'index'])->name(
        'admin.index'
    );
    Route::get('/register', [AdminRegisterController::class, 'create'])->name(
        'admin.managerRegister'
    );
    Route::get('/shop_register', [AdminShopController::class, 'create'])->name(
        'admin.shopRegister'
    );
    Route::resource('adminShops', AdminShopController::class)->only([
        'store'
    ]);
    Route::resource('adminRegisters', AdminRegisterController::class)->only([
        'store'
    ]);
});

Route::prefix('manager')->middleware(['auth', 'can:isShopManager', 'verified'])->group(function () {
    Route::get('/', [ManagerLoginController::class, 'index'])->name(
        'manager.index'
    );
    Route::resource('managerShops', ManagerShopController::class)->only([
        'edit', 'update'
    ]);
    Route::resource('managerReserves', ManagerReserveController::class)->only([
        'show'
    ]);
    Route::post('/mail', [MailSendController::class, 'individualSend'])->name(
        'manager.individualSend'
    );
    Route::post('/mails', [MailSendController::class, 'allSend'])->name(
        'manager.allSend'
    );
    Route::resource('reserves', ReserveController::class)->only([
        'show'
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
