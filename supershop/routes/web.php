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
Auth::routes();

Route::get('', 'ShopPagesController@index')->name('shop.index');

Route::get('search', 'ShopPagesController@getSearchResults')->name('search')->middleware('remove.token');

Route::get('brands', 'ShopPagesController@getAllBrands')->name('shop.brands');
Route::get('brand/{brand}', 'ShopPagesController@getBrand')->name('brand');

Route::get('cart', 'CartController@indexCart')->name('cart.index');
Route::get('cart/{product}', 'CartController@addProductToCart')->name('cart.add');
Route::match(['put', 'patch'],'cart/{cart}', 'CartController@updateProductInCart')->name('cart.update');
Route::delete('cart/{product}', 'CartController@deleteProductFromCart')->name('cart.destroy');

Route::get('wishlist', 'CartController@indexWishlist')->name('wishlist.index');
Route::get('wishlist/{product}', 'CartController@addProductToWishlist')->name('wishlist.add');
Route::delete('wishlist/{product}', 'CartController@deleteProductFromWishlist')->name('wishlist.destroy');

Route::get('checkout', 'CheckoutController@index')->name('checkout.index')->middleware('checkout');

Route::post('order', 'OrderController@store')->name('orders.store')->middleware('checkout');

Route::post('comments', 'CommentController@store')->name('comments.store');

//Route::get('posts', 'BlogController@index')->name('blog.index');
//Route::get('posts/create', 'BlogController@create')->name('blog.create');
//Route::get('posts/{post}', 'BlogController@show')->name('blog.show');
Route::resource('posts', 'PostController');

Route::get('votes', 'ShopPagesController@getVotes')->name('votes.index');
Route::get('rules', 'ShopPagesController@getRules')->name('rules.index');
Route::get('delivery-and-payment', 'ShopPagesController@getDeliveryAndPayment')->name('dap.index');
Route::get('contacts', 'ShopPagesController@getContacts')->name('contacts.index');
Route::post('contacts', 'ShopPagesController@storeContacts')->name('contacts.store');

Route::prefix('home')->group(function () {
    Route::get('', 'HomeController@index')->name('home.index');
    Route::match(['put', 'patch'],'', 'HomeController@updatePersonalInfo')->name('personalInfo.update');
    Route::get('orders', 'HomeController@getOrders')->name('home.orders');
    Route::get('reviews', 'HomeController@getReviews')->name('home.reviews');
    Route::get('notifications', 'HomeController@getNotifications')->name('home.notifications');
    Route::get('votes', 'HomeController@getVotes')->name('home.votes');
});

Route::get('{main_category}', 'ShopPagesController@getMainCategory')->name('shop.main_category');
Route::get('{main_category}/{category}', 'ShopPagesController@getCategory')->name('shop.category');
Route::get('{main_category}/{category}/{product}', 'ShopPagesController@getProduct')->name('shop.product');




Route::prefix('admin')->group(function () {

    Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('', 'AdminController@index')->name('admin.dashboard');
    Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});