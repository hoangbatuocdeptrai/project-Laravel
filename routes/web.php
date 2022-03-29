<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminBorrowerController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminBannerController;
use App\Http\Controllers\Admin\AdminCustomerController;
// use Auth;

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

Route::group(['prefix' => ''], function (){

    Route::get('', [HomeController::class, 'index'])->name('home.index');
    Route::get('contact', [HomeController::class, 'contact'])->name('home.contact');
    Route::post('contact', [HomeController::class, 'addContact'])->name('home.add-contact');
    Route::get('about', [HomeController::class, 'about'])->name('home.about');
    Route::get('shop', [HomeController::class, 'shop'])->name('home.shop');
    Route::get('blog', [HomeController::class, 'blog'])->name('home.blog');
    Route::get('blog-view/{id}', [HomeController::class, 'blog_view'])->name('home.blog-view');
    Route::get('wishlist', [HomeController::class, 'wishlist'])->name('home.wishlist');
    Route::get('not', [HomeController::class, 'notFound'])->name('home.not');
    Route::get('product-detail/{id}/{name}', [HomeController::class, 'productDetail'])->name('home.product-detail');
    Route::get('author/info/{id}', [HomeController::class, 'infoAuthor'])->name('home.info-author');
    Route::get('category/{id}-{slug}', [HomeController::class, 'category'])->name('home.category');
    Route::get('author/{id}-{slug}', [HomeController::class, 'author'])->name('home.author');
});

Route::group(['prefix' => 'favorite','middleware' => 'mkh'], function(){
    Route::get('add/{id}',[FavoriteController::class,'add'])-> name('favorite.add');
    Route::get('remove/{id}',[FavoriteController::class,'remove'])-> name('favorite.remove');
    Route::get('clear',[FavoriteController::class,'clear'])-> name('favorite.clear');
    Route::get('view',[FavoriteController::class,'view'])-> name('favorite.view');
});

Route::group(['prefix' => 'cart'], function(){
    Route::get('add/{id}',[CartController::class,'add'])-> name('cart.add');
    Route::get('remove/{id}',[CartController::class,'remove'])-> name('cart.remove');
    Route::get('update/{id}',[CartController::class,'update'])-> name('cart.update');
    Route::get('clear',[CartController::class,'clear'])-> name('cart.clear');
    Route::get('view',[CartController::class,'view'])-> name('cart.view');
    Route::post('view',[CartController::class,'post_code']);
    Route::get('code',[CartController::class,'code'])-> name('cart.code')->middleware('mkh');
    Route::post('code',[CartController::class,'create_code']);
    Route::get('empty',[CartController::class,'empty'])-> name('cart.empty');
});

Route::group(['prefix' => 'order'], function(){
    Route::get('check_out',[OrderController::class,'check_out'])-> name('order.check_out')->middleware('mkh');
    Route::post('check_out',[OrderController::class,'post_checkout'])->middleware('mkh');
    Route::get('success/{token}',[OrderController::class,'success_order'])->name('order.success');
    Route::get('destroy/{token}',[OrderController::class,'destroy_order'])->name('order.destroy');
});

Route::group(['prefix' => 'borrower'], function(){
    Route::get('check_borrower',[BorrowerController::class,'check_borrower'])-> name('borrower.check_borrower')->middleware('mkh');
    Route::post('check_borrower',[BorrowerController::class,'post_check_borrower'])->name('borrower.post_check_borrower')->middleware('mkh');
    Route::post('check_code',[BorrowerController::class,'check_code'])->name('borrower.check_code')->middleware('mkh');
    Route::post('check_cus/{id}',[BorrowerController::class,'check_cus'])->name('borrower.check_cus')->middleware('mkh');
    Route::post('check_s/{id}',[BorrowerController::class,'check_s'])->name('borrower.check_s')->middleware('mkh');
    Route::get('pay', [BorrowerController::class, 'pay'])->name('borrower.pay');
});


// Login admin
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'check_login'])->name('admin.check_login');
Route::post('admin/send_email', [AdminController::class, 'send_link'])->name('admin.send_link');
Route::get('admin/forgot_password/{token}', [AdminController::class, 'forgot_password'])->name('admin.forgot_password');
Route::post('admin/forgot_password', [AdminController::class, 'password_new'])->name('admin.password_new');


Route::group(['prefix' => 'admin','middleware' => 'auth'], function (){
    Route::get('', [AdminController::class, 'index'])->name('admin.index');
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('contact', [AdminController::class, 'contact'])->name('admin.contact');


    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/create', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category/edit/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('category/trashed', [CategoryController::class, 'trashed'])->name('category.trashed');
    Route::get('category/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore');
    Route::get('category/forcedelete/{id}', [CategoryController::class, 'forcedelete'])->name('category.forcedelete');

    Route::get('author', [AuthorController::class, 'index'])->name('author.index');
    Route::get('author/create', [AuthorController::class, 'create'])->name('author.create');
    Route::post('author/create', [AuthorController::class, 'store'])->name('author.store');
    Route::get('author/edit/{id}', [AuthorController::class, 'edit'])->name('author.edit');
    Route::post('author/edit/{id}', [AuthorController::class, 'update'])->name('author.update');
    Route::post('author/destroy/{id}', [AuthorController::class, 'destroy'])->name('author.destroy');
    Route::get('author/trashed',[AuthorController::class,'trashed'])->name('author.trashed');
    Route::get('author/restore/{id}', [AuthorController::class, 'restore'])->name('author.restore');
    Route::get('author/forcedelete/{id}', [AuthorController::class, 'forcedelete'])->name('author.forcedelete');



    Route::get('product', [ProductController::class, 'index'])->name('product.index');
    Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('product/create', [ProductController::class, 'store'])->name('product.store');
    Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('product/edit/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::post('product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('product/trashed',[ProductController::class,'trashed'])->name('product.trashed');
    Route::get('product/restore/{id}', [ProductController::class, 'restore'])->name('product.restore');
    Route::get('product/forcedelete/{id}', [ProductController::class, 'forcedelete'])->name('product.forcedelete');
    Route::get('product/delete-image/{id}', [ProductController::class, 'deleteImage'])->name('delete.deleteImage');

    Route::get('customer', [AdminCustomerController::class, 'index'])->name('admin.customer.index');
    Route::post('customer/destroy/{id}', [AdminCustomerController::class, 'destroy'])->name('customer.destroy');
    // Quản lý đơn hàng
    Route::get('order', [AdminOrderController::class,'index'])->name('admin.order.index');
    Route::get('order/detail/{id}', [AdminOrderController::class,'detail'])->name('admin.order.detail');
    Route::post('order/status/{id}', [AdminOrderController::class,'status'])->name('admin.order.status');
    Route::get('order/pdf/{id}', [AdminOrderController::class, 'pdf'])->name('admin.order.pdf');


    Route::get('borrower', [AdminBorrowerController::class, 'index'])->name('admin.borrower.index');
    Route::get('borrower/detail/{token}', [AdminBorrowerController::class, 'detail'])->name('admin.borrower.detail');
    Route::get('borrower/pdf/{id}', [AdminBorrowerController::class, 'pdf'])->name('admin.borrower.pdf');
    Route::post('borrower/status/{id}', [AdminBorrowerController::class, 'status'])->name('admin.borrower.status');
    Route::get('borrower/add-price/{id}', [AdminBorrowerController::class, 'addPrice'])->name('admin.borrower.add-price');

    Route::get('blog', [AdminBlogController::class, 'index'])->name('admin.blog.index');
    Route::get('blog/create', [AdminBlogController::class, 'create'])->name('admin.blog.create');
    Route::post('blog/create', [AdminBlogController::class, 'store'])->name('admin.blog.store');
    Route::get('blog/edit/{id}', [AdminBlogController::class, 'edit'])->name('admin.blog.edit');
    Route::post('blog/edit/{id}', [AdminBlogController::class, 'update']);
    Route::post('blog/destroy/{id}', [AdminBlogController::class, 'destroy'])->name('admin.blog.destroy');


    Route::get('banner', [AdminBannerController::class, 'index'])->name('admin.banner.index');
    Route::get('banner/create', [AdminBannerController::class, 'create'])->name('admin.banner.create');
    Route::post('banner/create', [AdminBannerController::class, 'store'])->name('admin.banner.store');
    Route::post('banner/edit/{id}', [AdminBannerController::class, 'update'])->name('admin.banner.update');
    Route::get('banner/forcedelete/{id}', [AdminBannerController::class, 'forcedelete'])->name('admin.banner.forcedelete');
    Route::get('banner/delete-slide/{id}', [AdminBannerController::class, 'deleteImage'])->name('admin.delete.deleteSlide');
    Route::post('banner/slides', [AdminBannerController::class, 'slides'])->name('admin.banner.slides');

});


Route::group(['prefix' => 'customer'], function (){
    Route::get('login', [CustomerController::class, 'login'])->name('customer.login');
    Route::post('register', [CustomerController::class, 'create_login'])->name('customer.create_login');
    Route::get('create_register/{id}', [CustomerController::class, 'create_register'])->name('customer.create_register');
    Route::post('login', [CustomerController::class, 'post_login'])->name('customer.post_login');
    Route::get('logout', [CustomerController::class, 'logout'])->name('customer.logout');
    Route::get('account', [CustomerController::class, 'account'])->name('customer.account')->middleware('mkh');
    Route::post('edit_account', [CustomerController::class, 'edit_account'])->name('customer.edit_account');
    Route::get('pdf_detail/{id}', [CustomerController::class, 'detail'])->name('customer.detail')->middleware('mkh');
    Route::get('pdf_detail_borower/{id}', [CustomerController::class, 'detail_borrower'])->name('customer.detail_borrower')->middleware('mkh');
    Route::get('send_email', [CustomerController::class, 'send_email'])->name('customer.send_email');
    Route::post('send_email', [CustomerController::class, 'send_link']);
    Route::get('confirm/{token}', [CustomerController::class, 'confirm'])->name('customer.confirm');
    Route::get('forgot_password/{token}', [CustomerController::class, 'forgot_password'])->name('customer.forgot_password');
    Route::post('forgot_password', [CustomerController::class, 'password_new'])->name('customer.password_new');
    Route::post('rating', [CustomerController::class, 'rating'])->name('customer.rating');
});