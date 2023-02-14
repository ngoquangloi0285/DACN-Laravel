<?php

// frontend controller

use App\Http\Controllers\auth\AccountController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\ContactPageController;
use App\Http\Controllers\frontend\NewsPageController;
use App\Http\Controllers\frontend\ProductPageController;

// backend controller
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\BrandController as BackendBrandController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\SliderController;


// Router frontend

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/product', [ProductPageController::class, 'index'])->name('home.product');
Route::get('/news', [NewsPageController::class, 'index'])->name('home.news');
Route::get('/contact', [ContactPageController::class, 'index'])->name('home.contact');
// cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.show');
Route::get('/cart/store/{id}', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/delete', [CartController::class, 'delete'])->name('cart.delete');
Route::get('/cart/order', [CartController::class, 'orderindex'])->name('cart.order');
Route::post('/cart/orderdetail', [CartController::class, 'orderdetail'])->name('cart.orderdetail');

// auth
Route::get('/register', [AccountController::class, 'register'])->name('auth.register');
Route::post('/register', [AccountController::class, 'register_action'])->name('auth.register_action');
Route::get('/login', [AccountController::class, 'login'])->name('auth.login');
Route::post('/login', [AccountController::class, 'login_action'])->name('auth.login_action');
Route::get('/password', [AccountController::class, 'password'])->name('auth.password');
Route::post('/password', [AccountController::class, 'password_action'])->name('auth.password_action');
Route::get('/forgotpassword', [AccountController::class, 'forgot_form'])->name('auth.forgot_form');
Route::post('/forgotpassword', [AccountController::class, 'forgot_action'])->name('auth.forgot_action');
Route::get('/logout', [AccountController::class, 'logout'])->name('auth.logout');

Route::get('admin/login', [AccountController::class, 'adminlogin'])->name('auth.adminlogin');
Route::post('admin/login', [AccountController::class, 'adminlogin_action'])->name('auth.adminlogin_action');
// Router backend
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    // Trang chủ
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    // Quản lý chức năng
    // Category
    Route::resource('category', CategoryController::class);
    Route::get('category_trash', [CategoryController::class, 'trash'])->name('category.category_trash');
    Route::get('category_des_del_res_all', [CategoryController::class, 'category_des_del_res_all'])->name('category.category_des_del_res_all');
    Route::prefix('category')->group(function () {
        Route::get('status/{category}', [CategoryController::class, 'status'])->name('category.status');
        Route::get('delete/{category}', [CategoryController::class, 'delete'])->name('category.delete');
        Route::get('restore/{category}', [CategoryController::class, 'restore'])->name('category.restore');
        Route::get('destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });
    // product
    Route::resource('product', ProductController::class);
    Route::get('product_trash', [ProductController::class, 'trash'])->name('product.product_trash');
    Route::get('product_des_del_res_all', [ProductController::class, 'product_des_del_res_all'])->name('product.product_des_del_res_all');
    Route::prefix('product')->group(function () {
        Route::get('status/{product}', [ProductController::class, 'status'])->name('product.status');
        Route::get('delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
        Route::get('restore/{product}', [ProductController::class, 'restore'])->name('product.restore');
        Route::get('destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    });
    // users
    Route::resource('user', UserController::class);
    Route::prefix('user')->group(function () {
        Route::get('status/{user}', [UserController::class, 'status'])->name('user.status');
        Route::get('delete/{user}', [UserController::class, 'delete'])->name('user.delete');
    });
    // brand
    Route::resource('brand', BackendBrandController::class);
    Route::get('brand_trash', [BackendBrandController::class, 'trash'])->name('brand.brand_trash');
    Route::get('brand_des_del_res_all', [BackendBrandController::class, 'des_del_res_all'])->name('brand.des_del_res_all');
    Route::prefix('brand')->group(function () {
        Route::get('status/{brand}', [BackendBrandController::class, 'status'])->name('brand.status');
        Route::get('delete/{brand}', [BackendBrandController::class, 'delete'])->name('brand.delete');
        Route::get('restore/{brand}', [BackendBrandController::class, 'restore'])->name('brand.restore');
        Route::get('destroy/{brand}', [BackendBrandController::class, 'destroy'])->name('brand.destroy');
    });
    // order
    Route::resource('order', OrderController::class);
    Route::get('order_trash', [OrderController::class, 'trash'])->name('order.order_trash');
    Route::prefix('order')->group(function () {
        Route::get('status/{order}', [OrderController::class, 'status'])->name('order.status');
        Route::get('delete/{order}', [OrderController::class, 'delete'])->name('order.delete');
        Route::get('restore/{order}', [OrderController::class, 'restore'])->name('order.restore');
        Route::get('destroy/{order}', [OrderController::class, 'destroy'])->name('order.destroy');
    });
    // contact
    Route::resource('contact', ContactController::class);
    Route::prefix('contact')->group(function () {
        Route::get('status/{contact}', [ContactController::class, 'status'])->name('contact.status');
        Route::get('delete/{contact}', [ContactController::class, 'delete'])->name('contact.delete');
    });
    // topic
    Route::resource('topic', TopicController::class);
    Route::get('topic_trash', [TopicController::class, 'trash'])->name('topic.topic_trash');
    Route::prefix('topic')->group(function () {
        Route::get('status/{topic}', [TopicController::class, 'status'])->name('topic.status');
        Route::get('delete/{topic}', [TopicController::class, 'delete'])->name('topic.delete');
        Route::get('restore/{topic}', [TopicController::class, 'restore'])->name('topic.restore');
        Route::get('destroy/{topic}', [TopicController::class, 'destroy'])->name('topic.destroy');
    });
    // post
    Route::resource('post', PostController::class);
    Route::get('post_trash', [PostController::class, 'trash'])->name('post.post_trash');
    Route::prefix('post')->group(function () {
        Route::get('status/{post}', [PostController::class, 'status'])->name('post.status');
        Route::get('delete/{post}', [PostController::class, 'delete'])->name('post.delete');
        Route::get('restore/{post}', [PostController::class, 'restore'])->name('post.restore');
        Route::get('destroy/{post}', [PostController::class, 'destroy'])->name('post.destroy');
    });
    // slider
    Route::resource('slider', SliderController::class);
    Route::get('slider_trash', [SliderController::class, 'trash'])->name('slider.slider_trash');
    Route::prefix('slider')->group(function () {
        Route::get('status/{slider}', [SliderController::class, 'status'])->name('slider.status');
        Route::get('delete/{slider}', [SliderController::class, 'delete'])->name('slider.delete');
        Route::get('restore/{slider}', [SliderController::class, 'restore'])->name('slider.restore');
        Route::get('destroy/{slider}', [SliderController::class, 'destroy'])->name('slider.destroy');
    });
    // menu
    Route::resource('menu', MenuController::class);
    Route::get('menu_trash', [MenuController::class, 'trash'])->name('menu.menu_trash');
    Route::prefix('menu')->group(function () {
        Route::get('status/{menu}', [MenuController::class, 'status'])->name('menu.status');
        Route::get('delete/{menu}', [MenuController::class, 'delete'])->name('menu.delete');
        Route::get('restore/{menu}', [MenuController::class, 'restore'])->name('menu.restore');
        Route::get('destroy/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');
    });
});

Route::get('{slug}', [HomeController::class, 'index'])->name('slug.home');


