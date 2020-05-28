<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Home\IndexController@index');

Route::resource('users', 'User\UserController');
Route::resource('addresses', 'Address\AddressController');
Route::resource('articles', 'Article\ArticleController');
Route::resource('brands', 'Brand\BrandController');
Route::resource('carts', 'Cart\CartController');
Route::resource('categories', 'Category\CategoryController');
Route::resource('cities', 'City\CityController');
Route::resource('coupons', 'Coupon\CouponController');
Route::resource('deliveries', 'Delivery\DeliveryController');
Route::resource('discounts', 'Discount\DiscountController');
Route::resource('features', 'Feature\FeatureController');
Route::resource('feature-groups', 'FeatureGroup\FeatureGroupController');
Route::resource('messages', 'Message\MessageController');
Route::resource('orders', 'Order\OrderController');
Route::resource('products', 'Product\ProductController');
Route::resource('provinces', 'Province\ProvinceController');
Route::resource('reviews', 'Review\ReviewController');
Route::resource('roles', 'Role\RoleController');
Route::resource('tags', 'Tag\TagController');
Route::resource('transactions', 'Transaction\TransactionController');
