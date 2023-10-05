<?php

use Illuminate\Support\Facades\Route;

// ***************All Admin Panel******************
use App\Http\Controllers\Admin\AllAppontmentController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Auth\AdminLoginContrroller;
use App\Http\Controllers\Admin\TransitionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\SendMails\MailController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\AuthController;

// ***************All Fronted Panel******************

use App\Http\Controllers\franted\BlogController;
use App\Http\Controllers\Auth\AuthOtpController;
use App\Http\Controllers\franted\HomeController;
use App\Http\Controllers\franted\AboutController;
use App\Http\Controllers\franted\ContactController;
use App\Http\Controllers\franted\DoctorsController;
use App\Http\Controllers\franted\CheckoutController;
use App\Http\Controllers\franted\ServicesController;
use App\Http\Controllers\franted\DepartmentController;
use App\Http\Controllers\franted\BookAppoinmentController;

// ***************User Panel******************
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserPaymentController;
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

//                     ###################
// ************************All fronted  Panel *********************************
//                     @@@@@@@@@@@@@@@@@@@@@@                   

Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('route:cache');
    Artisan::call('optimize');
    return "Cleared!";
 });
 
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('about',[AboutController::class,'index'])->name('about');

Route::controller(ServicesController::class)->prefix('services')->group(function () {
    Route::get('index', 'index')->name('services.index');
    Route::get('product/{id}', 'product');
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
    Route::get('success', 'successPage')->name('payment.success');
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

Route::controller(BookAppoinmentController::class)->group(function(){

    Route::get('book-appoinment','create')->name('book-appoinment-create');
    Route::post('book-appoinment','store')->name('book-appoinment-store');
});

Route::get('send',[MailController::class,'index']);
//                     ###################
// ************************User Panel *********************************
//                     @@@@@@@@@@@@@@@@@@@@@@

Route::controller(AuthController::class)->group(function(){
    Route::get('login', 'login')->name('user-login');
    Route::post('login', 'postLogin')->name('user-login-post'); 
    Route::get('register', 'userRegister')->name('user-register');
    Route::post('register', 'postRegister')->name('user-register-post'); 
});

Route::controller(AuthOtpController::class)->group(function(){
    Route::get('otp/login', 'login')->name('otp.login');
    Route::post('otp/resend', 'generate')->name('otp.resend');
    Route::get('otp/verification', 'verification')->name('otp.verification');
    Route::post('otp/login', 'loginWithOtp')->name('otp.getlogin');
    Route::get('otp/login/{user_id}/{otp}', 'linkVerify')->name('otp.linkVerify');
});

Route::group(['prefix' => 'user','middleware'=> ['auth', 'is_user']],function () {
    Route::controller(UserDashboardController::class)->group(function(){
        Route::get('/dashboard', 'index')->name('user-dashboard');
        Route::get('/update-profile', 'updateProfile')->name('user-update-profile');
        Route::get('logout','logout')->name('user-logout');
    });
    Route::controller(UserPaymentController::class)->group(function(){
        Route::get('/payment', 'index')->name('user-payment');
        Route::get('/orders', 'usersOrders')->name('user-orders');
    });
});

//                     ###################
// ************************Admin Panel *********************************
//                     @@@@@@@@@@@@@@@@@@@@@@


Route::controller(AdminLoginContrroller::class)->group(function(){
    Route::get('admin/login', 'login')->name('admin-login');
    Route::post('admin/login', 'postLogin')->name('admin-login-post'); 
    Route::get('admin/registration', 'registration')->name('register');
    Route::post('admin/post-registration', 'postRegistration')->name('register-post'); 
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

    Route::controller(TransitionController::class)->prefix('transition')->group(function () {
        Route::get('index', 'index')->name('transition.index');
        Route::get('order/{id}', 'order')->name('transition.order');
        Route::get('delete/{id}','destroy')->name('transition.delete');
    });

    Route::controller(AdminProfileController::class)->prefix('profile')->group(function () {
        Route::get('index', 'index')->name('profile.index');
        Route::post('update','update')->name('profile.update');
        Route::get('change-password','changePassword')->name('profile.change.password');
        Route::post('change-password','ChangePasswordPost')->name('profile.update.password');

    });

    Route::controller(AllAppontmentController::class)->group(function(){
        Route::get('list-appoinment','index')->name('list-appoinment');
    });
});
