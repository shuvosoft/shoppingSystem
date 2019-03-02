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

Route::get('/', function () {

    $sliders = \App\Slider::latest()->get();
    $products = \App\Product::latest()->paginate(3);
    return view('layouts.frontend.pages.index',compact('products','sliders'));
})->name('home');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix' => 'products'], function(){


    Route::get('/', 'PagesController@products')->name('products');
    Route::get('/{slug}', 'PagesController@show')->name('products.show');
    Route::get('/search','PagesController@search')->name('search');

    //Category Routes
    Route::get('/categories', 'CategoriesController@index')->name('categories.index');
    Route::get('/category/{id}', 'CategoriesController@show')->name('categories.show');
});


Route::group(['prefix' => 'admin'], function(){

    Route::get('/', 'AdminPagesController@index')->name('admin.index');

    // Admin Login Routes
    Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout/submit', 'Auth\Admin\LoginController@logout')->name('admin.logout');


    Route::get('/products', 'AdminPagesController@manage_product')->name('admin.products');
    Route::get('/product/create', 'AdminPagesController@product_create')->name('admin.product.create');
    Route::post('/product/create', 'AdminPagesController@product_store')->name('admin.product.store');
    Route::get('/product/edit/{id}', 'AdminPagesController@product_edit')->name('admin.product.edit');
    Route::post('/product/edit/{id}', 'AdminPagesController@product_update')->name('admin.product.update');
////    Route::post('/product/destroy/{id}', 'AdminPagesController@product_destroy')->name('admin.product.destroy');
    Route::post('/product/delete/{id}','AdminPagesController@delete')->name('admin.product.delete');


});

// category route

Route::group(['prefix'=>'product_order'], function (){


    Route::get('/', 'Admin\OrderController@index')->name('order.index');
    Route::get('view/{id}', 'Admin\OrderController@show')->name('order.show');
    Route::post('delete/{id}', 'Admin\OrderController@delete')->name('order.delete');

    Route::post('completed/{id}', 'Admin\OrderController@completed')->name('order.completed');
    Route::post('paid/{id}', 'Admin\OrderController@paid')->name('order.paid');





});

// Slider route

Route::group(['prefix'=>'/slider'], function (){




    Route::resource('slider', 'SliderController');


});

// category route

Route::group(['prefix'=>'category', 'namespace'=>'admin'], function (){


    Route::resource('category', 'CategoryController');



});

// brands route

Route::group(['prefix'=>'brand', 'namespace'=>'admin'], function (){


    Route::resource('brand', 'BrandController');



});

// division route

Route::group(['prefix'=>'division', 'namespace'=>'admin'], function (){


    Route::resource('division', 'DivisionsController');



});

// district route

Route::group(['prefix'=>'district', 'namespace'=>'admin'], function (){


    Route::resource('district', 'DistrictController');



});

// User

Route::group(['prefix'=>'user'], function (){


    // User Routes
    Route::get('/token/{token}', 'Admin\VerificationController@verify')->name('user.verification');

    Route::get('/dashboard', 'UserController@dashboard')->name('user.dashboard');
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::post('/profile/update', 'UserController@profileUpdate')->name('user.profile.update');


});

// Cart Routes
Route::group(['prefix' => 'carts'], function(){

    Route::get('/', 'CartsController@index')->name('carts');
    Route::post('/store', 'CartsController@store')->name('carts.store');

    Route::post('/update/{id}', 'CartsController@update')->name('carts.update');
    Route::post('/delete/{id}', 'CartsController@destroy')->name('carts.delete');
});

// Checkout Routes
Route::group(['prefix' => 'checkout'], function(){
    Route::get('/', 'CheckoutsController@index')->name('checkouts');
    Route::post('/store', 'CheckoutsController@store')->name('checkouts.store');
});


