<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\HomeController;
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
    });
});
