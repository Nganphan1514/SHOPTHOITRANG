<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\Users\UserLoginController;
use App\Http\Controllers\Admin\User01Controller;
use App\Http\Controllers\Admin\Users\ForgotPasswordController;
use App\Http\Controllers\Admin\Users\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;

//cau hoi
Route::post('/reviews/{review}/reply', [ReviewController::class, 'reply'])->name('reviews.reply');
//qư

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
// Phần đăng kí
Route::get('admin/users/register', [RegisterController::class, 'index'])->name('register');
Route::post('admin/users/register', [RegisterController::class, 'register']);

Route::middleware('guest')->group(function () {
    Route::get('forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])
    ->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLink'])
    ->name('password.email');
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])
    ->name('password.reset');
    Route::post('reset-password', [ForgotPasswordController::class, 'resetPassword'])
    ->name('password.update');
});

// Route để đăng xuất
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home1');
Route::post('/services/load-product', [HomeController::class, 'loadProduct']);

//Phần contact tách riêng
Route::get('contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendcontact'])->name('contact.send');

Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('search', [App\Http\Controllers\ProductController::class, 'search']);


Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('/settings', [UserLoginController::class, 'settings'])->name('settings');
    // Route to show user profile
    Route::get('/user/{id}/profile', [UserLoginController::class, 'profile'])->name('user.profile');

    // Route to update user profile
    Route::put('/user/{id}/update', [UserLoginController::class, 'update'])->name('user.update');

    Route::post('add-cart', [CartController::class, 'index']);
    Route::get('carts', [CartController::class, 'show']);
    Route::post('update-cart', [CartController::class, 'update'])->name('cart.update');
    Route::get('carts/delete/{id}', [CartController::class, 'remove']);
    Route::post('carts', [CartController::class, 'addCart']);

    Route::get('order', [\App\Http\Controllers\Admin\CartController::class, 'index_user'])->name('order');
    Route::get('order/view/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'show_user'])->name('view_more');
   

});   
    Route::middleware(['auth', 'checkAdmin'])->prefix('admin')->group(function () {        
            Route::get('/', [MainController::class, 'index'])->name('admin');
            Route::get('main', [MainController::class, 'index']);

        // Routes phần Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        // Routes phần Product
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
        });

        // Routes phần Slider
        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });

        // Routes phần Upload
        Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);

        // Routes phần Cart
        Route::get('customers', [\App\Http\Controllers\Admin\CartController::class, 'index']);
        Route::get('customers/view/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'show']);
        Route::post('customers/update-status', [\App\Http\Controllers\Admin\CartController::class, 'updateStatus'])->name('customers.updateStatus');

    });


    Route::prefix('admin/user01')->group(function () {
        Route::get('/', [User01Controller::class, 'index'])->name('admin.user01.index');
        Route::get('/add', [User01Controller::class, 'create']); // Hiển thị form thêm người dùng
        Route::post('/store', [User01Controller::class, 'store'])->name('admin.user01.store'); // Lưu người dùng
        Route::get('/edit/{id}', [User01Controller::class, 'edit'])->name('admin.user01.edit');
        Route::post('/update/{id}', [User01Controller::class, 'update'])->name('admin.user01.update');
        Route::DELETE('/destroy/{id}', [User01Controller::class, 'destroy'])->name('admin.user01.destroy');
        Route::get('/list', [User01Controller::class, 'index'])->name('admin.user01.list');

    });




