<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\SiteController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\OrderdetailController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\PageController;

use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TopicController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Backend\ProductImportController;
use App\Http\Controllers\Backend\ProductWarehousedController;
Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/san-pham', [SiteController::class, 'products'])->name('site.products');
Route::get('/san-pham-danh-muc/{slug}', [SiteController::class, 'product_category'])->name('site.product_category');
Route::get('/san-pham-thuong-hieu/{slug}', [SiteController::class, 'product_brand'])->name('site.product_brand');
Route::get('/bai-viet', [SiteController::class, 'post'])->name('site.post');
Route::get('/gio-hang', [SiteController::class, 'cart'])->name('site.cart');
Route::get('/gio-hang/addcart/{id}', [SiteController::class, 'addcart'])->name('site.addcart');
Route::get('/gio-hang/delcart/{id}', [SiteController::class, 'delcart'])->name('site.delcart');
Route::get('/gio-hang/delcart', [SiteController::class, 'delcart'])->name('site.delcartall');
Route::post('/gio-hang/update', [SiteController::class, 'updatecart'])->name('site.updatecart');
Route::get('/tiem-kiem', function () {
    echo 'tat ca tiem kiem';
});
Route::get('/khach-hang', function () {
    echo 'tat ca khach hang';
});
Route::get('/lien-he', [SiteController::class, 'contact'])->name('site.contact');
Route::get('/tin-tuc', [SiteController::class, 'news'])->name('site.news');
Route::get('/Gioi-thieu', [SiteController::class, 'introduce'])->name('site.introduce');

Route::get('/admin/login', [AuthController::class, 'getlogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'postlogin'])->name('admin.postlogin');

Route::prefix('admin')
    ->middleware('loginAdmin')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
        //category
        Route::get('category/trash', [CategoryController::class, 'trash'])->name('category.trash');
        Route::get('category/status/{category}', [CategoryController::class, 'status'])->name('category.status');
        Route::get('category/delete/{category}', [CategoryController::class, 'delete'])->name('category.delete');
        Route::get('category/restore/{category}', [CategoryController::class, 'restore'])->name('category.restore');
        Route::resource('category', CategoryController::class);
        //brand
        Route::get('brand/trash', [BrandController::class, 'trash'])->name('brand.trash');
        Route::get('brand/status/{brand}', [BrandController::class, 'status'])->name('brand.status');
        Route::get('brand/delete/{brand}', [BrandController::class, 'delete'])->name('brand.delete');
        Route::get('brand/restore/{brand}', [BrandController::class, 'restore'])->name('brand.restore');
        Route::resource('brand', BrandController::class);
        //menu
        Route::get('menu/trash', [MenuController::class, 'trash'])->name('menu.trash');
        Route::get('menu/status/{menu}', [MenuController::class, 'status'])->name('menu.status');
        Route::get('menu/delete/{menu}', [MenuController::class, 'delete'])->name('menu.delete');
        Route::get('menu/restore/{menu}', [MenuController::class, 'restore'])->name('menu.restore');
        Route::resource('menu', MenuController::class);

        //product
        Route::get('product/trash', [ProductController::class, 'trash'])->name('product.trash');
        Route::get('product/status/{product}', [ProductController::class, 'status'])->name('product.status');
        Route::get('product/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
        Route::get('product/restore/{product}', [ProductController::class, 'restore'])->name('product.restore');
        Route::resource('product', ProductController::class);
        //ProductImportController
        Route::get('product_import/trash', [ProductImportController::class, 'trash'])->name('product_import.trash');
        Route::get('product_import/status/{product_import}', [ProductImportController::class, 'status'])->name('product_import.status');
        Route::get('product_import/delete/{product_import}', [ProductImportController::class, 'delete'])->name('product_import.delete');
        Route::get('product_import/restore/{product_import}', [ProductImportController::class, 'restore'])->name('product_import.restore');
        Route::resource('product_import', ProductImportController::class);
        //productwarehoused
        Route::get('product_warehoused/trash', [ProductWarehousedController::class, 'trash'])->name('product_warehoused.trash');
        Route::get('product_warehoused/status/{productwarehoused}', [ProductWarehousedController::class, 'status'])->name('product_warehoused.status');
        Route::get('product_warehoused/delete/{productwarehoused}', [ProductWarehousedController::class, 'delete'])->name('product_warehoused.delete');
        Route::get('product_warehoused/restore/{productwarehoused}', [ProductWarehousedController::class, 'restore'])->name('product_warehoused.restore');
        Route::resource('product_warehoused', ProductWarehousedController::class);

        //Order
        Route::get('order/trash', [OrderController::class, 'trash'])->name('order.trash');
        Route::get('order/status/{order}', [OrderController::class, 'status'])->name('order.status');
        Route::get('order/delete/{order}', [OrderController::class, 'delete'])->name('order.delete');
        Route::get('order/restore/{order}', [OrderController::class, 'restore'])->name('order.restore');
        Route::resource('order', OrderController::class);

        //post
        Route::get('post/trash', [postController::class, 'trash'])->name('post.trash');
        Route::get('post/status/{post}', [postController::class, 'status'])->name('post.status');
        Route::get('post/delete/{post}', [postController::class, 'delete'])->name('post.delete');
        Route::get('post/restore/{post}', [postController::class, 'restore'])->name('post.restore');
        Route::resource('post', PostController::class);
        //page
        Route::get('page/trash', [PageController::class, 'trash'])->name('page.trash');
        Route::get('page/status/{page}', [PageController::class, 'status'])->name('page.status');
        Route::get('page/delete/{page}', [PageController::class, 'delete'])->name('page.delete');
        Route::get('page/restore/{page}', [PageController::class, 'restore'])->name('page.restore');
        Route::resource('page', PageController::class);

        //contact
        Route::get('contact/trash', [contactController::class, 'trash'])->name('contact.trash');
        Route::get('contact/status/{contact}', [contactController::class, 'status'])->name('contact.status');
        Route::get('contact/delete/{contact}', [contactController::class, 'delete'])->name('contact.delete');
        Route::get('contact/restore/{contact}', [contactController::class, 'restore'])->name('contact.restore');
        Route::resource('contact', ContactController::class);
        //slider
        Route::get('slider/trash', [SliderController::class, 'trash'])->name('slider.trash');
        Route::get('slider/status/{slider}', [SliderController::class, 'status'])->name('slider.status');
        Route::get('slider/delete/{slider}', [SliderController::class, 'delete'])->name('slider.delete');
        Route::get('slider/restore/{slider}', [SliderController::class, 'restore'])->name('slider.restore');
        Route::resource('slider', SliderController::class);
        //topic
        Route::get('topic/trash', [TopicController::class, 'trash'])->name('topic.trash');
        Route::get('topic/status/{topic}', [TopicController::class, 'status'])->name('topic.status');
        Route::get('topic/delete/{topic}', [TopicController::class, 'delete'])->name('topic.delete');
        Route::get('topic/restore/{topic}', [TopicController::class, 'restore'])->name('topic.restore');
        Route::resource('topic', TopicController::class);

        //User
        Route::get('user/trash', [UserController::class, 'trash'])->name('user.trash');
        Route::get('user/status/{user}', [UserController::class, 'status'])->name('user.status');
        Route::get('user/delete/{user}', [UserController::class, 'delete'])->name('user.delete');
        Route::get('user/restore/{user}', [UserController::class, 'restore'])->name('user.restore');
        Route::resource('user', UserController::class);
        //Customer
        Route::get('customer/trash', [CustomerController::class, 'trash'])->name('customer.trash');
        Route::get('customer/status/{customer}', [CustomerController::class, 'status'])->name('customer.status');
        Route::get('customer/delete/{customer}', [CustomerController::class, 'delete'])->name('customer.delete');
        Route::get('customer/restore/{customer}', [CustomerController::class, 'restore'])->name('customer.restore');
        Route::resource('customer', CustomerController::class);
        //Unit
        Route::resource('unit', UnitController::class);

        Route::resource('orderdetail', OrderdetailController::class);
    });
Route::get('{slug}', [SiteController::class, 'index'])->name('site.slug');
