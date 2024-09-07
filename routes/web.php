<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WithdrawalController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\ResetPassWordController;
use App\Http\Controllers\User\UserClient;
use App\Http\Controllers\User\WithdrawMoneyController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('login', [DashboardController::class, 'getLogin'])->name('login');
    Route::post('login', [DashboardController::class, 'postLogin']);
    Route::get('logout', [DashboardController::class, 'getLogOut'])->name('logout');

    Route::middleware([Authenticate::class])->group(function () {

        Route::controller(DashboardController::class)->name('dashboard.')->group(function () {
            Route::get('/', 'index')->name('index');
        });
        Route::controller(UserController::class)->prefix('user')->name('user.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('tao-moi', 'create')->name('create');
            Route::post('tao-moi', 'store');
            Route::get('cap-nhap/{id}', 'edit')->name('update');
            Route::post('cap-nhap/{id}', 'update');
            Route::post('xoa/{id}', 'destroy')->name('delete');
            Route::post('trang-thai/{id}', 'postStatus')->name('status');
        });

        Route::controller(ProductController::class)->prefix('product')->name('product.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('tao-moi', 'create')->name('create');
            Route::post('tao-moi', 'store');
            Route::get('cap-nhap/{id}', 'edit')->name('update');
            Route::post('cap-nhap/{id}', 'update');
            Route::post('xoa/{id}', 'destroy')->name('delete');
            Route::post('trang-thai/{id}', 'postStatus')->name('status');
        });
        Route::controller(WithdrawalController::class)->prefix('withdrawal')->name('withdrawal.')->group(function () {
            Route::get('/', 'index')->name('index');
        });
    });
});

Route::get('/gioi-thieu', function () { return view('user/introduction');})->name('introduction');
Route::get('/tin-tuc', function () { return view('user/news');})->name('news');
Route::get('/chinh-sach', function () { return view('user/policy');})->name('policy');


Route::controller(WithdrawMoneyController::class)->group(function(){
    Route::get('/rut-tien', 'index')->name('withdraw_money.index');
    Route::post('/rut-tien', 'post')->name('withdraw_money.post');
});

Route::controller(UserProductController::class)->group(function(){
    Route::get('/', 'home')->name('home');
    Route::get('/video-hom-nay', 'today_video')->name('today_video');
    Route::get('/xem-video/{id}', 'watch_videos')->name('watch_videos');
    Route::post('/add-point', 'add_point');

});

Route::controller(UserClient::class)->group(function(){
    Route::get('/dang-nhap', 'index')->name('login.index');
    Route::post('/dang-nhap', 'postLogin')->name('login.post');
    Route::get('/dang-xuat', 'logout')->name('logout');
    Route::get('/dang-ky', 'indexRegister')->name('register.index');
    Route::post('/dang-ky', 'postRegister')->name('register.post');
});

Route::controller(ResetPassWordController::class)->prefix('resetPassword')->name('resetPassword.')->group(function () {
    Route::get('tao-moi', 'getForgotPassword')->name('create');
    Route::post('tao-moi', 'postForgotPassword');
    Route::get('reset-password/{token}', 'showResetPasswordForm')->name('getCreatePass');
    Route::post('reset-password', 'submitResetPasswordForm')->name('reset-password');
});
