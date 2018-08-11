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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::post('laguage-chooser', 'LanguageController@changeLanguage')->name('change.language');

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


Auth::routes();
Route::group(['namespace' => 'Auth'], function () {
    Route::get('logout', 'LogoutController@logout');
    // OAuth Routes
    Route::get('auth/facebook', 'AuthController@redirectToProvider')->name('auth.name');
    Route::get('auth/facebook/callback', 'AuthController@handleProviderCallback');
});


Route::post('add', 'LanguageController@postLang')->name('switchLang');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['localization','auth', 'role:admin']], function () {
//    Route::group(['prefix' => Session::get('locale')], function (){
        Route::get('/', 'AdminController@index')->name('index');

        // Category
        Route::group(['prefix' => 'category'], function () {
            Route::get('index', 'CategoryController@index')->name('category.index');
            Route::get('add', 'CategoryController@form_add')->name('category.add.form');
            Route::post('add', 'CategoryController@add')->name('category.add');
            Route::get('edit/{id}', 'CategoryController@form_edit')->name('category.edit.form');
            Route::put('edit/{id}', 'CategoryController@edit')->name('category.edit');
            Route::delete('delete{id}', 'CategoryController@delete')->name('category.delete');
        });

        // Brands
        Route::group(['prefix' => 'brand'], function () {
            Route::get('index', 'BrandController@index')->name('brand.index');
            Route::get('add', 'BrandController@form_add')->name('brand.add.form');
            Route::post('add', 'BrandController@add')->name('brand.add');
            Route::get('edit/{id}', 'BrandController@form_edit')->name('brand.edit.form');
            Route::put('edit/{id}', 'BrandController@edit')->name('brand.edit');
            Route::delete('delete/{id}', 'BrandController@delete')->name('brand.delete');
//            Route::get('image/{id}', 'BrandController@image')->name('brand.image');
        });

        // product
        Route::group(['prefix' => 'product'], function () {
            Route::get('index', 'ProductController@index')->name('product.index');
            Route::get('add', 'ProductController@form_add')->name('product.add.form');
            Route::post('add', 'ProductController@add')->name('product.add');
            Route::get('edit/{id}', 'ProductController@form_edit')->name('product.edit.form');
            Route::put('edit/{id}', 'ProductController@edit')->name('product.edit');
            Route::delete('delete/{id}', 'ProductController@delete')->name('product.delete');
            Route::get('detail/{id}', 'ProductController@detail')->name('product.detail');
//            Route::get('image/{id}', 'ProductController@image')->name('product.image');
        });

        // user
        Route::group(['prefix' => 'user'], function () {
            Route::get('index', 'UserController@index')->name('user.index');
            Route::get('add', 'UserController@form_add')->name('user.add.form');
            Route::post('add', 'UserController@add')->name('user.add');
            Route::get('edit/{id}', 'UserController@form_edit')->name('user.edit.form');
            Route::put('edit/{id}', 'UserController@edit')->name('user.edit');
            Route::delete('delete/{id}', 'UserController@delete')->name('user.delete');
        });

    // report
    Route::group(['prefix' => 'report'], function () {
        Route::get('index', 'ReportController@index')->name('report.index');
        Route::get('search', 'ReportController@search')->name('report.search');
    });

        // order
        Route::group(['prefix' => 'order'], function () {
            Route::get('index', 'OrderController@index')->name('order.index');
            Route::get('edit/{id}', 'OrderController@form_edit')->name('order.edit.form');
            Route::put('edit/{id}', 'OrderController@edit')->name('order.edit');
        });

//    });


});

Route::group(['middleware' => 'localization'], function () {
    Route::get('/', 'IndexController@index')->name('frontend.index');
    Route::get('detail/{id}', 'IndexController@detail')->name('frontend.detail');
    Route::get('product/{id?}', 'ProductController@index')->name('frontend.product');
    Route::get('product/detail/{id}', 'ProductController@detail')->name('frontend.product.detail');
    Route::get('cart/{id}', 'CartController@cart')->name('cart.product');
    Route::get('all-cart', 'CartController@all_cart')->name('all_cart.product');
    Route::get('delete-cart/{rowId}', 'CartController@delete')->name('cart_delete');
    Route::put('update-cart/{rowId}', 'CartController@update')->name('cart_update');
    Route::post('customer-order', 'CartController@order')->name('cart_order');
    Route::post('paypal-order', 'CartController@paypal')->name('paypal_order');
    Route::get('paypal/status', 'CartController@status')->name('paypal_status');
    Route::get('paypal/details/{id}', 'CartController@paymentDetail')->name('paypal_paymentDetail');
    Route::get('paypal/list', 'CartController@paymentList')->name('paypal_paymentList');

    Route::get('about', 'IndexController@about')->name('frontend_about');
    Route::get('contact', 'IndexController@contact')->name('frontend_contact');


    // promotion
    Route::get('promotion', 'ProductPromotionController@index')->name('frontend_promotion');

    // Brands
    Route::group(['namespace' => 'Admin'], function () {
        Route::group(
            ['prefix' => 'brand'],
            function () {
                Route::get('image/{id}', 'BrandController@image')->name('brand.image');
            }
        );

        // product
        Route::group(
            ['prefix' => 'product'],
            function () {
                Route::get('image/{id}', 'ProductController@image')->name('product.image');
            }
        );
    });
});


Route::get('/home', 'HomeController@index')->name('home');
