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

        Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('tao-moi', 'create')->name('create');
            Route::post('tao-moi', 'store');
            Route::get('cap-nhap/{id}', 'edit')->name('update');
            Route::post('cap-nhap/{id}', 'update');
            Route::post('xoa/{id}', 'destroy')->name('delete');
            Route::post('trang-thai/{id}', 'postStatus')->name('status');
        });

        Route::controller(PostController::class)->prefix('post')->name('post.')->group(function () {
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

    });
});

Route::controller(HomeController::class)->group(function () {
    Route::get('login', 'getLogin')->name('login');
    Route::post('login', 'postLogin');
    Route::get('logout', 'getLogOut')->name('logout');

    Route::get('/', 'index')->name('index');

    Route::get('/tim-kiem', 'search')->name('search');

    Route::prefix('san-pham')->name('product.')->group(function () {
        Route::get('/{categorySlug}/', 'getProductList')->name('list');
        Route::get('/{categorySlug}/chi-tiet/{productSlug}', 'getProductDetail')->name('detail');
    });

    Route::prefix('bai-huong-dan')->name('instruction.')->group(function () {
        Route::get('/', 'getInstructionList')->name('index');
        Route::get('/{instructionSlug}/chi-tiet', 'getInstructionDetail')->name('detail');
    });

    Route::prefix('tin-tuc')->name('post.')->group(function () {
        Route::get('/', 'getPostList')->name('index');
        Route::get('/{postSlug}/chi-tiet', 'getPostDetail')->name('detail');
    });

    Route::prefix('gioi-thieu')->name('introduce.')->group(function () {
        Route::get('/', 'getIntroduce')->name('index');
    });

    Route::prefix('lien-he')->name('contact.')->group(function () {
        Route::get('/', 'getContact')->name('index');
        Route::post('/register', 'postContactForm')->name('register');
    });

    Route::prefix('giai-phap')->name('solution.')->group(function () {
        Route::get('/', 'getSolutionList')->name('index');
        Route::get('/{solutionSlug}/chi-tiet', 'getSolutionDetail')->name('detail');
    });

    Route::prefix('tuyen-dung')->name('recruitment.')->group(function () {
        Route::get('/', 'getRecruitmentList')->name('index');
        Route::get('/{recruitmentSlug}/chi-tiet', 'getRecruitmentDetail')->name('detail');
        Route::post('/register', 'postUserProfileForm')->name('register');
    });
});

Route::post('register', [HomeController::class, 'register'])->name('register');
