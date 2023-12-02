<?php

use App\Http\Controllers\Admin\AdminProductColorController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AdminPermissionController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminProductImageController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {

    //USER
    Route::get('dashboard', [DashboardController::class, 'show'])->middleware('auth');
    Route::get('admin', [DashboardController::class, 'show']);
    Route::get('admin/user/list', [AdminUserController::class, 'list'])->name('user.list');
    Route::get('admin/user/add', [AdminUserController::class, 'add'])->name('user.add');
    Route::post('admin/user/store', [AdminUserController::class, 'store'])->name('user.store');
    Route::get('admin/user/delete/{id}', [AdminUserController::class, 'delete'])->name('user.delete');
    Route::get('admin/user/action', [AdminUserController::class, 'action'])->name('user.action');
    Route::get('admin/user/edit/{user}', [AdminUserController::class, 'edit'])->name('user.edit');
    Route::post('admin/user/update/{user}', [AdminUserController::class, 'update'])->name('user.update');

    //Permission
    Route::get('admin/permission/add', [AdminPermissionController::class, 'add'])->name('permission.add');
    Route::post('admin/permission/store', [AdminPermissionController::class, 'store'])->name('permission.store');
    Route::get('admin/permission/edit/{id}', [AdminPermissionController::class, 'edit'])->name('permission.edit');
    Route::post('admin/permission/update/{id}', [AdminPermissionController::class, 'update'])->name('permission.update');
    Route::get('admin/permission/delete/{id}', [AdminPermissionController::class, 'delete'])->name('permission.delete');

    //ROLE
    Route::get('admin/role/index', [AdminRoleController::class, 'index'])->name('role.index')->can('role.view');
    Route::get('admin/role/add', [AdminRoleController::class, 'add'])->name('role.add')->can('role.add');
    Route::post('admin/role/store', [AdminRoleController::class, 'store'])->name('role.store')->can('role.add');
    Route::get('admin/role/edit/{role}', [AdminRoleController::class, 'edit'])->name('role.edit')->can('role.edit');
    Route::post('admin/role/update/{role}', [AdminRoleController::class, 'update'])->name('role.update')->can('role.edit');
    Route::get('admin/role/delete/{role}', [AdminRoleController::class, 'delete'])->name('role.delete')->can('role.delete');

    //PAGE
    Route::get('admin/page/list', [AdminPageController::class, 'list'])->name('page.list');
    Route::get('admin/page/add', [AdminPageController::class, 'add'])->name('page.add');
    Route::post('admin/page/store', [AdminPageController::class, 'store'])->name('page.store');
    Route::get('admin/page/edit/{id}', [AdminPageController::class, 'edit'])->name('page.edit');
    Route::post('admin/page/update/{page}', [AdminPageController::class, 'update'])->name('page.update');
    Route::get('admin/page/delete/{page}', [AdminPageController::class, 'delete'])->name('page.delete');
    Route::get('admin/page/action', [AdminPageController::class, 'action'])->name('page.action');

    //POST
    Route::get('admin/post/list', [AdminPostController::class, 'list'])->name('post.list');
    Route::get('admin/post/add', [AdminPostController::class, 'add'])->name('post.add');
    Route::post('admin/post/store', [AdminPostController::class, 'store'])->name('post.store');
    Route::get('admin/post/edit/{post_id}', [AdminPostController::class, 'edit'])->name('post.edit');
    Route::post('admin/post/update/{post}', [AdminPostController::class, 'update'])->name('post.update');
    Route::get('admin/post/delete/{post}', [AdminPostController::class, 'delete'])->name('post.delete');
    Route::get('admin/post/action', [AdminPostController::class, 'action'])->name('post.action');

    //PRODUCT
    Route::get('admin/product/list', [AdminProductController::class, 'list'])->name('product.list');
    Route::get('admin/product/add', [AdminProductController::class, 'add'])->name('product.add');
    Route::post('admin/product/store', [AdminProductController::class, 'store'])->name('product.store');
    Route::get('admin/product/edit/{id}', [AdminProductController::class, 'edit'])->name('product.edit');
    Route::post('admin/product/update/{product}', [AdminProductController::class, 'update'])->name('product.update');
    Route::get('admin/product/delete/{product}', [AdminProductController::class, 'delete'])->name('product.delete');
    Route::get('admin/product/action', [AdminProductController::class, 'action'])->name('product.action');



    //PRODUCT-IMAGE
    Route::get('admin/product_image/list', [AdminProductImageController::class, 'list'])->name('product_image.list');

    //CUSTOMER
    Route::get('admin/customer/list', [AdminCustomerController::class, 'list'])->name('customer.list');
    Route::get('admin/customer/add', [AdminCustomerController::class, 'add'])->name('customer.add');
    Route::post('admin/customer/store', [AdminCustomerController::class, 'store'])->name('customer.store');
    Route::get('admin/customer/edit/{id}', [AdminCustomerController::class, 'edit'])->name('customer.edit');
    Route::post('admin/customer/update/{customer}', [AdminCustomerController::class, 'update'])->name('customer.update');
    Route::get('admin/customer/delete/{customer}', [AdminCustomerController::class, 'delete'])->name('customer.delete');
    Route::get('admin/customer/action', [AdminCustomerController::class, 'action'])->name('customer.action');

    //ORDER
    Route::get('admin/order/list', [AdminOrderController::class, 'list'])->name('order.list');
    Route::get('admin/order/action', [AdminOrderController::class, 'action'])->name('order.action');
    Route::get('admin/order/seen/{order_id}', [AdminOrderController::class, 'seen'])->name('order.seen');
    Route::post('admin/order/change/{order_id}', [AdminOrderController::class, 'changeStatus'])->name('order.change');
    Route::get('admin/order/cancel/{order_id}', [AdminOrderController::class, 'cancel'])->name('order.cancel');

    //COLOR
    // Route::get('admin/color/list',[AdminProductColorController::class,'list'])->name('color.list');

    //SLIDER
    Route::get('admin/slider/list' , [SliderController::class , 'list'])->name('slider.list');
    Route::get('admin/slider/add' , [SliderController::class , 'add'])->name('slider.add');
    Route::post('admin/slider/store' , [SliderController::class , 'store'])->name('slider.store');

    Route::get('admin/slider/edit/{id}' , [SliderController::class , 'edit'])->name('slider.edit');
    Route::post('admin/slider/update/{id}' , [SliderController::class , 'update'])->name('slider.update');


















});


