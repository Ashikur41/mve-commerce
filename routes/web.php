<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;

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

//Admin
Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class,'AdminDestroy'])->name('admin.logout');
    Route::get('/admin/profile',[AdminController::class,'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store',[AdminController::class,'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password',[AdminController::class,'AdminChangePassword'])->name('admin.change.password');
    Route::post('/update/password',[AdminController::class,'updatePassword'])->name('update.password');
});


Route::middleware(['auth','role:admin'])->group(function () {
//Brand Controller
Route::controller(BrandController::class)->group(function(){
    Route::get('all/brand','AllBrand')->name('all.brand');
    Route::get('add/brand','AddBrand')->name('add.brand');
    Route::post('store/brand','StoreBrand')->name('store.brand');
    Route::get('edit/brand/{id}','EditBrand')->name('edit.brand');
    Route::post('update/brand','UpdateBrand')->name('update.brand');
    Route::get('delete/brand/{id}','DeleteBrand')->name('delete.brand');
    });
//Category Controller
Route::controller(CategoryController::class)->group(function(){
    Route::get('all/category','AllCategory')->name('all.category');
    Route::get('add/category','AddCategory')->name('add.category');
    Route::post('store/category','StoreCategory')->name('store.category');
    Route::get('edit/category/{id}','EditCategory')->name('edit.category');
    Route::post('update/category','UpdateCategory')->name('update.category');
    Route::get('delete/category/{id}','DeleteCategory')->name('delete.category');
    });

//Sub Category Controller
Route::controller(SubCategoryController::class)->group(function(){
    Route::get('all/sub-category','AllSub_category')->name('all.sub_category');
    Route::get('add/sub-category','AddSub_category')->name('add.sub_category');
    Route::post('store/sub-category','StoreSub_category')->name('store.sub_category');
    Route::get('edit/sub-category/{id}','EditSub_category')->name('edit.sub_category');
    Route::post('update/sub-category','UpdateSub_category')->name('update.sub_category');
    Route::get('delete/sub-category/{id}','DeleteSub_category')->name('delete.sub_category');
    });

});








//vendor
Route::middleware(['auth','role:vendor'])->group(function () {
    Route::get('/vendor/dashboard',[VendorController::class,'VendorDashboard'])->name('vendor.dashboard');
    Route::get('/vendor/logout',[VendorController::class,'vendorDestroy'])->name('vendor.logout');
    Route::get('/vendor/profile',[VendorController::class,'vendorProfile'])->name('vendor.profile');
    Route::post('/vendor/profile/store',[VendorController::class,'vendorProfileStore'])->name('vendor.profile.store');
    Route::get('/vendor/change/password',[VendorController::class,'vendorChangePassword'])->name('vendor.change.password');
    Route::post('/vendor/update/password',[VendorController::class,'vendorUpdatePassword'])->name('vendor.update.password');
});



Route::get('/admin/login',[AdminController::class,'AdminLogin'])->name('Admin.Login');
Route::get('/',[FrontendController::class,'index'])->name('frontend.index');
Route::get('/vendor/login',[VendorController::class,'VendorLogin'])->name('Vendor.Login');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[UserController::class,'UserDashboard'])->name('dashboard');
    Route::post('/user/profile/store',[UserController::class,'UserProfileStore'])->name('user.profile.store');
    Route::get('/user/logout',[UserController::class,'UserLogout'])->name('user.logout');
    Route::post('/user/update/password',[UserController::class,'UserUpdatePassword'])->name('user.update.password');
});

// Route::get('/dashboard', function () {
//     return view('index');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
