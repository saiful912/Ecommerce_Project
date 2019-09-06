<?php

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
// Route by Homepage
Route::get('/','frontend\HomeController@showHome')->name('home');
//product show route
Route::get('/products', 'frontend\ProductsController@index')->name('products');
Route::get('/product/{slug}', 'frontend\ProductsController@show')->name('products.show');
Route::get('/search', 'frontend\HomeController@search')->name('search');
//Cart Route
Route::get('/carts', 'frontend\CartsController@index')->name('carts');
Route::post('/carts/store', 'frontend\CartsController@store')->name('carts.store');
Route::post('/carts/update/{id}', 'frontend\CartsController@update')->name('carts.update');
Route::post('/carts/delete/{id}', 'frontend\CartsController@destroy')->name('carts.delete');
//checkout routs
Route::get('/checkout', 'frontend\CheckoutsController@index')->name('checkouts');
Route::post('/checkout/store', 'frontend\CheckoutsController@store')->name('checkouts.store');
//Category show Route
Route::get('/products/categories', 'frontend\CategoriesController@index')->name('categories.index');
Route::get('/products/category/{id}', 'frontend\CategoriesController@show')->name('categories.show');
//Register Route
Route::get('/register','frontend\AuthController@showRegisterForm')->name('register');
Route::post('/register','frontend\AuthController@process_register');

Route::get('/token/{token}', 'frontend\VerificationController@verify')->name('user.verification');

//Login Route
Route::get('/login','frontend\AuthController@showLoginForm')->name('login');
Route::post('/login','frontend\AuthController@process_login');

//password email send
Route::get('/password/reset',
    'Auth\ForgotPasswordController@showLinkPassword')->name('password.request');
Route::post('/password/resetPost',
    'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//password reset
Route::get('/password/reset/{token}',
    'Auth\ResetPasswordController@showResetForm ')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
//user Profile
Route::group(['middleware'=>'auth'],function(){
    Route::get('/profile','frontend\AuthController@profile_show')->name('profile');
    Route::post('/profile','frontend\AuthController@update_profile');
    Route::post('/password','frontend\AuthController@update_password')->name('password.update');
    Route::post('/image','frontend\AuthController@update_image')->name('image.update');
    Route::get('/logout','frontend\AuthController@logout')->name('logout');
});


// Admin Route
Route::group(['prefix' => 'admin'], function () {
    //backend route
    Route::get('/', 'backend\AdminController@index')->name('admin.index');
    Route::get('/profile', 'backend\AdminController@profile')->name('admin.profile');
    Route::post('/profile','backend\AdminController@update_profile');
    Route::post('/password','backend\AdminController@update_password')->name('admin.password.update');
    Route::post('/photo','backend\AdminController@update_photo')->name('admin.image.update');
    Route::get('/login', 'Auth\admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Auth\admin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout/submit', 'Auth\admin\LoginController@logout')->name('admin.logout');
    // Password Email Send
    Route::get('/password/reset', 'Auth\admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/resetPost', 'Auth\admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    // Password Reset
    Route::get('/password/reset/{token}', 'Auth\admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'Auth\admin\ResetPasswordController@reset')->name('admin.password.reset.post');
    //Product route
    Route::get('/product/create','backend\AdminProductsController@product_create')->name('admin.product.create');
    Route::get('/products', 'backend\AdminProductsController@manage_products')->name('admin.products');
    Route::get('/products/edit/{id}', 'backend\AdminProductsController@products_edit')->name('admin.products.edit');
    Route::post('/product/create', 'backend\AdminProductsController@product_store')->name('admin.product.store');
    Route::post('/product/update/{id}', 'backend\AdminProductsController@product_update')->name('admin.product.update');
    Route::post('/product/delete/{id}', 'backend\AdminProductsController@product_delete')->name('admin.product.delete');
//order routes
    Route::get('/orders', 'backend\AdminOrdersController@index')->name('admin.orders');
    Route::get('/orders/view/{id}', 'backend\AdminOrdersController@show')->name('admin.order.show');
    Route::post('/orders/delete/{id}', 'backend\AdminOrdersController@delete')->name('admin.order.delete');

    Route::post('/orders/completed/{id}', 'backend\AdminOrdersController@completed')->name('admin.order.completed');
    Route::post('/orders/paid/{id}', 'backend\AdminOrdersController@paid')->name('admin.order.paid');
    Route::post('/orders/charge_update/{id}', 'backend\AdminOrdersController@chargeUpdate')->name('admin.order.charge');
    Route::get('/orders/invoice/{id}', 'backend\AdminOrdersController@generateInvoice')->name('admin.order.invoice');

    //Category route
    Route::get('/categories/create',
        'backend\AdminCategoriesController@category_create')->name('admin.categories.create');
    Route::get('/categories', 'backend\AdminCategoriesController@manage_categories')->name('admin.categories');
    Route::get('/categories/edit/{id}',
        'backend\AdminCategoriesController@categories_edit')->name('admin.categories.edit');
    Route::post('/category/create', 'backend\AdminCategoriesController@category_store')->name('admin.category.store');
    Route::post('/category/update/{id}',
        'backend\AdminCategoriesController@category_update')->name('admin.category.update');
    Route::post('/category/delete/{id}',
        'backend\AdminCategoriesController@category_delete')->name('admin.category.delete');

    //Brands route
    Route::get('/brands/create', 'backend\AdminBrandsController@brand_create')->name('admin.brands.create');
    Route::get('/brands', 'backend\AdminBrandsController@manage_brands')->name('admin.brands');
    Route::get('/brands/edit/{id}', 'backend\AdminBrandsController@brands_edit')->name('admin.brands.edit');
    Route::post('/brand/create', 'backend\AdminBrandsController@brand_store')->name('admin.brand.store');
    Route::post('/brand/update/{id}', 'backend\AdminBrandsController@brand_update')->name('admin.brand.update');
    Route::post('/brand/delete/{id}', 'backend\AdminBrandsController@brand_delete')->name('admin.brand.delete');

    //Division route
    Route::get('/divisions/create', 'backend\DivisionController@division_create')->name('admin.divisions.create');
    Route::get('/divisions', 'backend\DivisionController@manage_division')->name('admin.divisions');
    Route::get('/divisions/edit/{id}', 'backend\DivisionController@division_edit')->name('admin.divisions.edit');
    Route::post('/division/create', 'backend\DivisionController@division_store')->name('admin.division.store');
    Route::post('/division/update/{id}', 'backend\DivisionController@division_update')->name('admin.division.update');
    Route::post('/division/delete/{id}', 'backend\DivisionController@division_delete')->name('admin.division.delete');
    //Sliders route
    Route::get('/sliders', 'backend\SlidersController@index')->name('admin.sliders');
    Route::post('/sliders/store', 'backend\SlidersController@store')->name('admin.slider.store');
    Route::post('/sliders/edit/{id}', 'backend\SlidersController@update')->name('admin.slider.update');
    Route::post('/sliders/delete/{id}', 'backend\SlidersController@delete')->name('admin.slider.delete');

    //District route
    Route::get('/districts/create', 'backend\DistrictController@district_create')->name('admin.districts.create');
    Route::get('/districts', 'backend\DistrictController@manage_district')->name('admin.districts');
    Route::get('/districts/edit/{id}', 'backend\DistrictController@district_edit')->name('admin.districts.edit');
    Route::post('/district/create', 'backend\DistrictController@district_store')->name('admin.district.store');
    Route::post('/district/update/{id}', 'backend\DistrictController@district_update')->name('admin.district.update');
    Route::post('/district/delete/{id}', 'backend\DistrictController@district_delete')->name('admin.district.delete');
});

//Api Routes
Route::get('get-districts/{id}',function ($id){
        return json_encode( App\Models\District::where('division_id',$id)->get());
});