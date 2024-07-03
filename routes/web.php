<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\VendorOrderController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ActiveUserController;
use App\Http\Middleware\RedirectIfAuthenticated;

use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;

use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\ReviewController;

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
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/update/password', [AdminController::class, 'updatePassword'])->name('update.password');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    //Brand Controller
    Route::controller(BrandController::class)->group(function () {
        Route::get('all/brand', 'AllBrand')->name('all.brand');
        Route::get('add/brand', 'AddBrand')->name('add.brand');
        Route::post('store/brand', 'StoreBrand')->name('store.brand');
        Route::get('edit/brand/{id}', 'EditBrand')->name('edit.brand');
        Route::post('update/brand', 'UpdateBrand')->name('update.brand');
        Route::get('delete/brand/{id}', 'DeleteBrand')->name('delete.brand');
    });
    //Category Controller
    Route::controller(CategoryController::class)->group(function () {
        Route::get('all/category', 'AllCategory')->name('all.category');
        Route::get('add/category', 'AddCategory')->name('add.category');
        Route::post('store/category', 'StoreCategory')->name('store.category');
        Route::get('edit/category/{id}', 'EditCategory')->name('edit.category');
        Route::post('update/category', 'UpdateCategory')->name('update.category');
        Route::get('delete/category/{id}', 'DeleteCategory')->name('delete.category');
    });

    //Sub Category Controller
    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('all/sub-category', 'AllSub_category')->name('all.sub_category');
        Route::get('add/sub-category', 'AddSub_category')->name('add.sub_category');
        Route::post('store/sub-category', 'StoreSub_category')->name('store.sub_category');
        Route::get('edit/sub-category/{id}', 'EditSub_category')->name('edit.sub_category');
        Route::post('update/sub-category', 'UpdateSub_category')->name('update.sub_category');
        Route::get('delete/sub-category/{id}', 'DeleteSub_category')->name('delete.sub_category');
        Route::get('subcategory/ajax/{category_id}', 'GetSubcategory');
    });

    //vendor active and inActive
    Route::controller(AdminController::class)->group(function () {
        Route::get('inActive/vendor', 'inActiveVendor')->name('inActive.vendor');
        Route::get('inActive/vendor/details/{id}', 'inActiveVendorDetails')->name('inactive.vendor.details');
        Route::post('active/vendor/approve', 'ActiveVendorApprove')->name('active.vendor.approve');
        Route::get('active/vendor', 'ActiveVendor')->name('active.vendor');
        Route::get('active/vendor/details/{id}', 'ActiveVendorDetails')->name('active.vendor.details');
        Route::post('inactive/vendor/approve', 'inActiveVendorApprove')->name('inactive.vendor.approve');
    });

    //Admin Product Manage
    Route::controller(ProductController::class)->group(function () {
        Route::get('all/product', 'AllProduct')->name('all.product');
        Route::get('add/product', 'AddProduct')->name('add.product');
        Route::post('store/product', 'StoreProduct')->name('store.product');
        Route::get('edit/product/{id}', 'EditProduct')->name('edit.product');
        Route::post('update/product', 'UpdateProduct')->name('update.product');
        Route::get('delete/product/{id}', 'DeleteProduct')->name('delete.product');

        Route::post('update/thumbnail/product', 'thumbnailProduct')->name('update.product.thumbnail');
        Route::post('update/multiImage/product', 'multiImageProduct')->name('update.product.multiImage');
        Route::get('delete/multiImage/product/{id}', 'multiImageDeleteProduct')->name('multiImage.delete');

        Route::get('product/inactive/{id}', 'InActiveProduct')->name('product.InActive');
        Route::get('product/active/{id}', 'ActiveProduct')->name('product.Active');

        // For Product Stock
        Route::get('/product/stock', 'ProductStock')->name('product.stock');
    });


    //slider all route
    Route::controller(SliderController::class)->group(function () {
        Route::get('all/slider', 'AllSlider')->name('all.slider');
        Route::get('add/slider', 'AddSlider')->name('add.slider');
        Route::post('store/slider', 'StoreSlider')->name('store.slider');
        Route::get('edit/slider/{id}', 'EditSlider')->name('edit.slider');
        Route::post('update/slider', 'UpdateSlider')->name('update.slider');
        Route::get('delete/slider/{id}', 'DeleteSlider')->name('delete.slider');
    });

    //Banner all route
    Route::controller(BannerController::class)->group(function () {
        Route::get('all/banner', 'AllBanner')->name('all.banner');
        Route::get('add/banner', 'AddBanner')->name('add.banner');
        Route::post('store/banner', 'StoreBanner')->name('store.banner');
        Route::get('edit/banner/{id}', 'EditBanner')->name('edit.banner');
        Route::post('update/banner', 'UpdateBanner')->name('update.banner');
        Route::get('delete/banner/{id}', 'DeleteBanner')->name('delete.banner');
    });

    //Coupon all route
    Route::controller(CouponController::class)->group(function () {
        Route::get('all/coupon', 'AllCoupon')->name('all.coupon');
        Route::get('add/coupon', 'AddCoupon')->name('add.coupon');
        Route::post('store/coupon', 'StoreCoupon')->name('store.coupon');
        Route::get('edit/coupon/{id}', 'EditCoupon')->name('edit.coupon');
        Route::post('update/coupon', 'UpdateCoupon')->name('update.coupon');
        Route::get('delete/coupon/{id}', 'DeleteCoupon')->name('delete.coupon');
    });


    //Shipping Area all route
    Route::controller(ShippingAreaController::class)->group(function () {
        Route::get('all/division', 'AllDivision')->name('all.division');
        Route::get('add/division', 'AddDivision')->name('add.division');
        Route::post('store/division', 'StoreDivision')->name('store.division');
        Route::get('edit/division/{id}', 'EditDivision')->name('edit.division');
        Route::post('update/division', 'UpdateDivision')->name('update.division');
        Route::get('delete/division/{id}', 'DeleteDivision')->name('delete.division');

        // district all route
        Route::get('all/district', 'AllDistrict')->name('all.district');
        Route::get('add/district', 'AddDistrict')->name('add.district');
        Route::post('store/district', 'StoreDistrict')->name('store.district');
        Route::get('edit/district/{id}', 'EditDistrict')->name('edit.district');
        Route::post('update/district', 'UpdateDistrict')->name('update.district');
        Route::get('delete/district/{id}', 'DeleteDistrict')->name('delete.district');

        // state all route
        Route::get('all/state', 'AllState')->name('all.state');
        Route::get('add/state', 'AddState')->name('add.state');
        Route::post('store/state', 'StoreState')->name('store.state');
        Route::get('edit/state/{id}', 'EditState')->name('edit.state');
        Route::post('update/state', 'UpdateState')->name('update.state');
        Route::get('delete/state/{id}', 'DeleteState')->name('delete.state');


        Route::get('/district/ajax/{division_id}', 'GetDistrict');
    });

    //Order all route
    Route::controller(OrderController::class)->group(function () {
        Route::get('pending/order', 'PendingOrder')->name('pending.order');
        Route::get('/admin/order/details/{order_id}', 'AdminOrderDetails')->name('admin.order.details');

        Route::get('/admin/confirmed/order', 'AdminConfirmedOrder')->name('admin.confirmed.order');
        Route::get('/admin/processing/order', 'AdminProcessingOrder')->name('admin.processing.order');
        Route::get('/admin/delivered/order', 'AdminDeliveredOrder')->name('admin.delivered.order');

        Route::get('/pending/confirm/{order_id}', 'PendingToConfirm')->name('pending-confirm');
        Route::get('/confirm/processing/{order_id}', 'ConfirmToProcess')->name('confirm-processing');
        Route::get('/processing/delivered/{order_id}', 'ProcessToDelivered')->name('processing-delivered');

        Route::get('/admin/invoice/download/{order_id}', 'AdminInvoiceDownload')->name('admin.invoice.download');
    });

    //Role Permission all route
    Route::controller(RoleController::class)->group(function () {
        Route::get('all/permission', 'AllPermission')->name('all.permission');
        Route::get('add/permission', 'AddPermission')->name('add.permission');
        Route::post('store/permission', 'StorePermission')->name('store.permission');
        Route::get('edit/permission/{id}', 'EditPermission')->name('edit.permission');
        Route::post('update/permission/{id}', 'UpdatePermission')->name('update.permission');
        Route::get('delete/permission/{id}', 'DeletePermission')->name('delete.permission');
    });
    Route::controller(RoleController::class)->group(function () {
        Route::get('all/role', 'AllRole')->name('all.role');
        Route::get('add/role', 'AddRole')->name('add.role');
        Route::post('store/role', 'StoreRole')->name('store.role');
        Route::get('edit/role/{id}', 'EditRole')->name('edit.role');
        Route::post('update/role/{id}', 'UpdateRole')->name('update.role');
        Route::get('delete/role/{id}', 'DeleteRole')->name('delete.role');
    });
    // Role in Permission all route
    Route::controller(RoleController::class)->group(function () {
        Route::get('add/role/permission', 'AddRolePermission')->name('add.role.permission');
        Route::get('all/role/permission', 'AllRolePermission')->name('all.role.permission');
        Route::post('role/permission/store', 'RolePermissionStore')->name('role.permission.store');
        Route::get('admin/edit/role/{id}', 'AdminEditRole')->name('admin.edit.role');
        Route::post('/admin/role/update/{id}', 'AdminRoleUpdate')->name('admin.role.update');
        Route::get('/admin/delete/roles/{id}', 'AdminRolesDelete')->name('admin.delete.roles');
    });

    // Admin User All Route
    Route::controller(AdminController::class)->group(function () {
        Route::get('/all/admin', 'AllAdmin')->name('all.admin');
        Route::get('/add/admin', 'AddAdmin')->name('add.admin');
        Route::post('/admin/user/store', 'AdminUserStore')->name('admin.user.store');
        Route::get('/edit/admin/role/{id}', 'EditAdminRole')->name('edit.admin.role');
        Route::post('/admin/user/update/{id}', 'AdminUserUpdate')->name('admin.user.update');
        Route::get('/delete/admin/role/{id}', 'DeleteAdminRole')->name('delete.admin.role');
    });

    // Report All Route
    Route::controller(ReportController::class)->group(function () {
        Route::get('/report/view', 'ReportView')->name('report.view');
        Route::post('/search/by/date', 'SearchByDate')->name('search-by-date');
        Route::post('/search/by/month', 'SearchByMonth')->name('search-by-month');
        Route::post('/search/by/year', 'SearchByYear')->name('search-by-year');

        Route::get('/order/by/user', 'OrderByUser')->name('order.by.user');
        Route::post('/search/by/user', 'SearchByUser')->name('search-by-user');
    });

    // Blog category manage All Route
    Route::controller(BlogController::class)->group(function () {
        Route::get('/admin/blog/category', 'AllBlogCategory')->name('admin.blog.category');
        Route::get('/add/blog/category', 'AddBlogCategory')->name('add.blog.category');
        Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');
        Route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('edit.blog.category');
        Route::post('/update/blog/category/{id}', 'UpdateBlogCategory')->name('update.blog.category');
        Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');
    });

    // Blog post All Route
    Route::controller(BlogController::class)->group(function () {
        Route::get('/admin/blog/post', 'AllBlogPost')->name('admin.blog.post');
        Route::get('/add/blog/post', 'AddBlogPost')->name('add.blog.post');
        Route::post('/store/blog/post', 'StoreBlogPost')->name('store.blog.post');
        Route::get('/edit/blog/post/{id}', 'EditBlogPost')->name('edit.blog.post');
        Route::post('/update/blog/post/{id}', 'UpdateBlogPost')->name('update.blog.post');
        Route::get('/delete/blog/post/{id}', 'DeleteBlogPost')->name('delete.blog.post');


        Route::get('/blog', 'AllBlog')->name('home.blog');
        Route::get('/post/details/{id}/{slug}', 'BlogDetails');
        Route::get('/post/category/{id}/{slug}', 'BlogPostCategory');
    });

    // Frontend Review All Route
    Route::controller(ReviewController::class)->group(function () {
        Route::post('/store/review', 'StoreReview')->name('store.review');
    });

    // Admin Reviw All Route
    Route::controller(ReviewController::class)->group(function () {

        Route::get('/pending/review', 'PendingReview')->name('pending.review');
        Route::get('/review/approve/{id}', 'ReviewApprove')->name('review.approve');
        Route::get('/publish/review', 'PublishReview')->name('publish.review');
        Route::get('/review/delete/{id}', 'ReviewDelete')->name('review.delete');
    });

    // Admin site setting All Route
    Route::controller(SiteSettingController::class)->group(function () {

        Route::get('/site/setting', 'SiteSetting')->name('site.setting');
        Route::post('/site/setting/update', 'SiteSettingUpdate')->name('site.setting.update');

        Route::get('/seo/setting', 'SeoSetting')->name('seo.setting');
        Route::post('/seo/setting/update', 'SeoSettingUpdate')->name('seo.setting.update');
    });

    // Active user and vendor All Route
    Route::controller(ActiveUserController::class)->group(function () {

        Route::get('/all/user', 'AllUser')->name('all-user');
        Route::get('/all/vendor', 'AllVendor')->name('all-vendor');
    });

    // Active user and vendor All Route
    Route::controller(ContactController::class)->group(function () {

        Route::get('/all/contact/us', 'AllContact')->name('all.contact');
    });

});



// Add to wishlist all route
Route::controller(WishlistController::class)->group(function () {
    Route::post('/add-to-wishlist/{product_id}', 'AddToWishlist');
});


// product details page all route
Route::controller(IndexController::class)->group(function () {
    Route::get('product/details/{id}/{slug}', 'ProductDetails')->name('product.details');
    Route::get('vendor/details/{id}', 'VendorDetails')->name('vendor.details');
    Route::get('product/category/{id}/{slug}', 'CateWiseProduct')->name('cate.wise.product');
    Route::get('product/subcategory/{id}/{slug}', 'SubCateWiseProduct')->name('sub.cate.wise.product');

    Route::get('product/size', 'ProductSize');

    //
    Route::get('product/view/modal/{id}', 'ProductViewAjax');

    // search product all route
    Route::post('/search', 'ProductSearch')->name('product.search');
    Route::post('search-product', 'SearchProduct');
});

// Add to Cart store data
Route::controller(CartController::class)->group(function () {
    Route::post('cart/data/store/{id}', 'AddToCart');
    Route::post('dCart/data/store/{id}', 'AddToCartDetails');
    Route::post('cart/mobile/data/store', 'AddToMobileCartDetails');
    Route::get('/product/mini/cart', 'AddMiniCart');
    Route::get('/product/mobile/mini/cart', 'MobileAddMiniCart');
    Route::get('/miniCart/product/remove/{rowId}', 'RemoveMiniCart');
});

// Add to cart all route
Route::controller(CartController::class)->group(function () {
    Route::get('/my/cart', 'MyCart')->name('my.cart');
    Route::get('/get-cart-product', 'GetCartProduct');
    Route::get('/cart/remove/{rowId}', 'CartRemove');
    Route::get('/cart/decrement/{rowId}', 'CartDecrement');
    Route::get('/cart/increment/{rowId}', 'CartIncrement');
});

//All user route
// Route::middleware(['auth','role:user'])->group(function () {


// Add to wishlist all route
Route::controller(WishlistController::class)->group(function () {
    Route::get('/wishlist', 'AllWishlist')->name('wishlist');
    Route::get('/get-wishlist-product ', 'GetWishlistProduct');
    Route::get('/wishlist-remove/{id} ', 'WishlistRemove');
});

// Checkout all route
Route::controller(CheckoutController::class)->group(function () {
    Route::get('/district-get/ajax/{division_id}', 'DistrictGetAjax');
    Route::get('/state-get/ajax/{district_id}', 'StateGetAjax');
    Route::post('/checkout/store', 'CheckoutStore')->name('checkout.store');
});

// Cash all route
Route::controller(CashController::class)->group(function () {
    Route::post('/cash/order', 'CashOrder')->name('cash.order');
});

// All User all route
Route::controller(AllUserController::class)->group(function () {
    Route::get('/user/account/details', 'UserAccountDetails')->name('user.account.detail');
    Route::get('/user/change/password', 'UserChangePassword')->name('user.change.password');
    Route::get('/user/orders/page', 'UserOrdersPage')->name('user.orders.page');
    Route::get('/user/order_details/{order_id}', 'UserOrdersDetails');
    Route::get('/user/invoice_download/{order_id}', 'UserOrdersInvoice');

    // Order Tracking
    Route::get('/user/track/order', 'UserTrackOrder')->name('user.track.order');
    Route::post('/order/tracking', 'OrderTracking')->name('order.tracking');
});



// });

Route::post('/coupon-apply', [CartController::class, 'CouponApply']);
Route::get('/coupon-calculation', [CartController::class, 'couponCalculation']);
Route::get('/coupon/remove', [CartController::class, 'couponRemove']);

// check out page all route
Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');


//vendor
Route::middleware(['auth', 'role:vendor'])->group(function () {
    Route::get('/vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashboard');
    Route::get('/vendor/logout', [VendorController::class, 'vendorDestroy'])->name('vendor.logout');
    Route::get('/vendor/profile', [VendorController::class, 'vendorProfile'])->name('vendor.profile');
    Route::post('/vendor/profile/store', [VendorController::class, 'vendorProfileStore'])->name('vendor.profile.store');
    Route::get('/vendor/change/password', [VendorController::class, 'vendorChangePassword'])->name('vendor.change.password');
    Route::post('/vendor/update/password', [VendorController::class, 'vendorUpdatePassword'])->name('vendor.update.password');


    //vendor product Controller
    Route::controller(VendorProductController::class)->group(function () {
        Route::get('all/vendor/product', 'AllVendorProduct')->name('vendor.product.all');
        Route::get('add/vendor/product', 'AddVendorProduct')->name('vendor.add.product');
        Route::post('store/vendor/product', 'StoreVendorProduct')->name('store.VendorProduct');
        Route::get('edit/vendor/product/{id}', 'EditVendorProduct')->name('edit.vendor.product');
        Route::post('update/vendor/product', 'UpdateVendorProduct')->name('update.vendor.product');
        Route::get('delete/vendor/product/{id}', 'DeleteVendorProduct')->name('delete.vendor.product');

        Route::post('vendor/update/thumbnail/product', 'vendorThumbnailProduct')->name('vendor.update.product.thumbnail');
        Route::post('vendor/update/multiImage/product', 'vendorMultiImageProduct')->name('vendor.update.product.multiImage');
        Route::get('delete/vendor/multiImage/product/{id}', 'vendorMultiImageDeleteProduct')->name('vendor.multiImage.delete');

        Route::get('vendor/product/inactive/{id}', 'vendorInActiveProduct')->name('vendor.product.InActive');
        Route::get('vendor/product/active/{id}', 'vendorActiveProduct')->name('vendor.product.Active');


        Route::get('/vendor/subcategory/ajax/{category_id}', 'vendorGetSubcategory');
    });

    //vendor order Controller
    Route::controller(VendorOrderController::class)->group(function () {
        Route::get('/vendor/order', 'VendorOrder')->name('vendor.order');
    });


    Route::controller(ReviewController::class)->group(function () {

        Route::get('/vendor/all/review', 'VendorAllReview')->name('vendor.all.review');
    });
});



Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('Admin.Login')->middleware(RedirectIfAuthenticated::class);
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/contact', [FrontendController::class, 'Contact'])->name('contact');
Route::get('/vendor/login', [VendorController::class, 'VendorLogin'])->name('Vendor.Login')->middleware(RedirectIfAuthenticated::class);
Route::get('/become/vendor', [VendorController::class, 'BecomeVendor'])->name('become.vendor');
Route::get('/vendor/list', [VendorController::class, 'VendorList'])->name('vendor.list');
Route::post('/vendor/register', [VendorController::class, 'VendorRegister'])->name('vendor.register');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');
});

// Route::get('/dashboard', function () {
//     return view('index');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
