<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Middleware\RedirectIfAuthenticated;

use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Frontend\IndexController;

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
    Route::get('subcategory/ajax/{category_id}','GetSubcategory');
    });

//vendor active and inActive
Route::controller(AdminController::class)->group(function(){
    Route::get('inActive/vendor','inActiveVendor')->name('inActive.vendor');
    Route::get('inActive/vendor/details/{id}','inActiveVendorDetails')->name('inactive.vendor.details');
    Route::post('active/vendor/approve','ActiveVendorApprove')->name('active.vendor.approve');
    Route::get('active/vendor','ActiveVendor')->name('active.vendor');
    Route::get('active/vendor/details/{id}','ActiveVendorDetails')->name('active.vendor.details');
    Route::post('inactive/vendor/approve','inActiveVendorApprove')->name('inactive.vendor.approve');

    });

//Admin Product Manage
Route::controller(ProductController::class)->group(function(){
    Route::get('all/product','AllProduct')->name('all.product');
    Route::get('add/product','AddProduct')->name('add.product');
    Route::post('store/product','StoreProduct')->name('store.product');
    Route::get('edit/product/{id}','EditProduct')->name('edit.product');
    Route::post('update/product','UpdateProduct')->name('update.product');
    Route::get('delete/product/{id}','DeleteProduct')->name('delete.product');

    Route::post('update/thumbnail/product','thumbnailProduct')->name('update.product.thumbnail');
    Route::post('update/multiImage/product','multiImageProduct')->name('update.product.multiImage');
    Route::get('delete/multiImage/product/{id}','multiImageDeleteProduct')->name('multiImage.delete');

    Route::get('product/inactive/{id}','InActiveProduct')->name('product.InActive');
    Route::get('product/active/{id}','ActiveProduct')->name('product.Active');
    });


//slider all route
Route::controller(SliderController::class)->group(function(){
    Route::get('all/slider','AllSlider')->name('all.slider');
    Route::get('add/slider','AddSlider')->name('add.slider');
    Route::post('store/slider','StoreSlider')->name('store.slider');
    Route::get('edit/slider/{id}','EditSlider')->name('edit.slider');
    Route::post('update/slider','UpdateSlider')->name('update.slider');
    Route::get('delete/slider/{id}','DeleteSlider')->name('delete.slider');
    });

//Banner all route
Route::controller(BannerController::class)->group(function(){
    Route::get('all/banner','AllBanner')->name('all.banner');
    Route::get('add/banner','AddBanner')->name('add.banner');
    Route::post('store/banner','StoreBanner')->name('store.banner');
    Route::get('edit/banner/{id}','EditBanner')->name('edit.banner');
    Route::post('update/banner','UpdateBanner')->name('update.banner');
    Route::get('delete/banner/{id}','DeleteBanner')->name('delete.banner');
    });

    // product details page all route
    Route::controller(IndexController::class)->group(function(){
        Route::get('product/details/{id}/{slug}','ProductDetails')->name('product.details');
        Route::get('vendor/details/{id}','VendorDetails')->name('vendor.details');
        Route::get('product/category/{id}/{slug}','CateWiseProduct')->name('cate.wise.product');
        Route::get('product/subcategory/{id}/{slug}','SubCateWiseProduct')->name('sub.cate.wise.product');

        //
        Route::get('product/view/modal/{id}','ProductViewAjax');

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


//vendor product Controller
Route::controller(VendorProductController::class)->group(function(){
    Route::get('all/vendor/product','AllVendorProduct')->name('vendor.product.all');
    Route::get('add/vendor/product','AddVendorProduct')->name('vendor.add.product');
    Route::post('store/vendor/product','StoreVendorProduct')->name('store.VendorProduct');
    Route::get('edit/vendor/product/{id}','EditVendorProduct')->name('edit.vendor.product');
    Route::post('update/vendor/product','UpdateVendorProduct')->name('update.vendor.product');
    Route::get('delete/vendor/product/{id}','DeleteVendorProduct')->name('delete.vendor.product');

    Route::post('vendor/update/thumbnail/product','vendorThumbnailProduct')->name('vendor.update.product.thumbnail');
    Route::post('vendor/update/multiImage/product','vendorMultiImageProduct')->name('vendor.update.product.multiImage');
    Route::get('delete/vendor/multiImage/product/{id}','vendorMultiImageDeleteProduct')->name('vendor.multiImage.delete');

    Route::get('vendor/product/inactive/{id}','vendorInActiveProduct')->name('vendor.product.InActive');
    Route::get('vendor/product/active/{id}','vendorActiveProduct')->name('vendor.product.Active');


    Route::get('/vendor/subcategory/ajax/{category_id}','vendorGetSubcategory');
    });
});



Route::get('/admin/login',[AdminController::class,'AdminLogin'])->name('Admin.Login')->middleware(RedirectIfAuthenticated::class);
Route::get('/',[FrontendController::class,'index'])->name('frontend.index');
Route::get('/vendor/login',[VendorController::class,'VendorLogin'])->name('Vendor.Login')->middleware(RedirectIfAuthenticated::class);
Route::get('/become/vendor',[VendorController::class,'BecomeVendor'])->name('become.vendor');
Route::post('/vendor/register',[VendorController::class,'VendorRegister'])->name('vendor.register');


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
