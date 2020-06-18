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

Auth::routes();

Route::get('/', 'Front\Home\IndexController@index')->name('index');

//// TODO: MUST CHANGE ROUTE TO RANDOM STRING -----
//
Route::prefix('admins/')->as('admins.')->middleware('operator')->group(function () {
    Route::get('', 'Admin\Home\IndexController@index')->name('index');
    Route::resource('articles', 'Admin\Article\ArticleController');
    Route::resource('attribute-groups', 'Admin\AttributeGroup\AttributeGroupController');
    Route::resource('attributes', 'Admin\Attribute\AttributeController');
    Route::resource('products', 'Admin\Product\ProductController');
    Route::resource('brands', 'Admin\Brand\BrandController');
    Route::resource('discounts', 'Admin\Discount\DiscountController');
    Route::resource('features', 'Admin\Feature\FeatureController');
    Route::resource('feature-groups', 'Admin\FeatureGroup\FeatureGroupController');
    Route::resource('roles', 'Admin\Role\RoleController');
    Route::resource('tags', 'Admin\Tag\TagController');
    Route::resource('transactions', 'Admin\Transaction\TransactionController');
    Route::resource('images', 'Admin\Image\ImageController');
    Route::resource('addresses', 'Admin\Address\AddressController');
    Route::resource('users', 'Admin\User\UserController');
    Route::resource('messages', 'Admin\Message\MessageController');
    Route::resource('orders', 'Admin\Order\OrderController');
    Route::resource('categories', 'Admin\Category\CategoryController');

    Route::get('attribute-groups/{attributeGroup}/add-attribute', 'Admin\AttributeGroup\AttributeGroupController@addAttribute')->name('attribute-groups.add_attribute');
    Route::post('attribute-groups/{attributeGroup}/store-attribute', 'Admin\AttributeGroup\AttributeGroupController@storeAttribute')->name('attribute-groups.store_attribute');

    Route::get('products/{product}/change-status', 'Admin\Product\ProductController@changeStatus')->name('products.change_status');
});

Route::resource('brands', 'Front\Brand\BrandController');
Route::resource('articles', 'Front\Article\ArticleController');
Route::resource('carts', 'Front\Cart\CartController');
Route::resource('cities', 'Front\City\CityController');
Route::resource('coupons', 'Front\Coupon\CouponController');
Route::resource('deliveries', 'Front\Delivery\DeliveryController');
Route::resource('products', 'Front\Product\ProductController');
Route::resource('provinces', 'Front\Province\ProvinceController');
Route::resource('reviews', 'Front\Review\ReviewController');

Auth::routes();
