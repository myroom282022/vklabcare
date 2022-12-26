<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AdminLoginContrroller;
use  App\Http\Controllers\Admin\DashboardController;
use  App\Http\Controllers\Admin\UsersController;
use  App\Http\Controllers\Admin\SliderController;
use  App\Http\Controllers\Admin\PackageController;
use  App\Http\Controllers\Admin\ProductController;


use App\Http\Controllers\franted\HomeController;
use App\Http\Controllers\franted\AboutController;
use App\Http\Controllers\franted\BlogController;
use App\Http\Controllers\franted\ContactController;
use App\Http\Controllers\franted\DepartmentController;
use App\Http\Controllers\franted\DoctorsController;
use App\Http\Controllers\franted\ServicesController;
use App\Http\Controllers\franted\CheckoutController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// franted routes -----------------------------------------

Route::get('/',[HomeController::class,'index']);
Route::get('about',[AboutController::class,'index'])->name('about');

Route::controller(ServicesController::class)->prefix('services')->group(function () {
    Route::get('index', 'index')->name('services.index');
    Route::get('index/{id}', 'index');
    Route::get('cart-item','showCart')->name('cart-item');
    Route::get('add-to-cart/{id}', 'addToCart')->name('add.to.cart');
    Route::patch('update-cart',  'update')->name('update.cart');
    Route::get('remove-from-cart/{id}',  'remove')->name('remove.from.cart');
    Route::get('billing-address',  'billingAddress')->name('billing-address');
});

Route::controller(CheckoutController::class)->prefix('payment')->group(function () {
    Route::get('index', 'index')->name('payment.index');
    Route::post('billing-address-create',  'billingAddressCreate')->name('billing-address-create');
    Route::post('store', 'store')->name('payment.store');

});



Route::get('contact',[ContactController::class,'index'])->name('contact');
Route::controller(DepartmentController::class)->group(function(){
    Route::get('departments','index')->name('departments');
    Route::get('department-single','singlePage')->name('department-single');
});

Route::controller(DoctorsController::class)->group(function(){
    Route::get('doctor','index')->name('doctor');
    Route::get('doctor-single','singlePage')->name('doctor-single');
    Route::get('appoinment','appoinment')->name('appoinment');
});
Route::controller(BlogController::class)->group(function(){

    Route::get('blog-sidebar','index')->name('blog-sidebar');
    Route::get('blog-single','singlePage')->name('blog-single');
});


// backend routes -----------------------------------------

Route::controller(AdminLoginContrroller::class)->group(function(){
    Route::get('login', 'login')->name('login');
    Route::post('post-login', 'postLogin')->name('login.post'); 
    Route::get('registration', 'registration')->name('register');
    Route::post('post-registration', 'postRegistration')->name('register.post'); 
});



Route::group(['prefix' => 'admin','middleware'=> ['auth', 'admin_login']],function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('logout', [AdminLoginContrroller::class, 'logout'])->name('logout');
    Route::controller(UsersController::class)->group(function(){
        Route::get('users', 'index')->name('users.index');
        Route::get('users/create', 'create')->name('users.create');
        Route::post('users/store', 'store')->name('users.store');
        Route::get('users/edit/{id}',  'edit')->name('users.edit');
        Route::post('users/update',  'update')->name('users.update');
        Route::get('users/delete/{id}','destroy')->name('users.delete');
    });   
    
    Route::controller(SliderController::class)->prefix('slider')->group(function () {
        Route::get('index', 'index')->name('slider.index');
        Route::get('create', 'create')->name('slider.create');
        Route::post('store', 'store')->name('slider.store');
        Route::get('edit/{id}',  'edit')->name('slider.edit');
        Route::post('update',  'update')->name('slider.update');
        Route::get('delete/{id}','destroy')->name('slider.delete');
    });

    Route::controller(PackageController::class)->prefix('package')->group(function () {
        Route::get('index', 'index')->name('package.index');
        Route::get('create', 'create')->name('package.create');
        Route::post('store', 'store')->name('package.store');
        Route::get('edit/{id}',  'edit')->name('package.edit');
        Route::post('update',  'update')->name('package.update');
        Route::get('delete/{id}','destroy')->name('package.delete');
    });

    Route::controller(ProductController::class)->prefix('product')->group(function () {
        Route::get('index', 'index')->name('product.index');
        Route::get('create', 'create')->name('product.create');
        Route::post('store', 'store')->name('product.store');
        Route::get('edit/{id}',  'edit')->name('product.edit');
        Route::post('update',  'update')->name('product.update');
        Route::get('delete/{id}','destroy')->name('product.delete');
    });
    
});