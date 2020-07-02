<?php

use Illuminate\Support\Facades\Auth;
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
//FrontEnd

Route::get('/', 'FrontEndController@index')->name('index');
Route::get('/products/{slug}' , 'FrontEndController@singleProduct')->name('single.product');
//gategory page
Route::get('/category/{id}' , 'FrontEndController@category')->name('category.page');
//tag page 
Route::get('/tag/{id}' , 'FrontEndController@tag')->name('tag.page');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function(){

    //Routes Categories

    Route::resource('categories' , 'categoryController');

    //Route SubCategory
    
    Route::resource('sub_categories', 'SubCategoryController');

    //Routes Products

    Route::resource('products' , 'ProductController');


    Route::get('/product/getdata', [
        'uses' => 'ProductController@getData',
        'as'   => 'product.gatdata'
    ]);

    Route::get('/product/trash', [
        'uses' => 'ProductController@trash',
        'as'   => 'product.trash'
    ]);

    Route::get('/product/kill/{id}', [
        'uses' => 'ProductController@kill',
        'as'   => 'product.kill'
    ]);
    Route::get('/product/kill_all', [
        'uses' => 'ProductController@killAll',
        'as'   => 'product.killAll'
    ]);

    Route::get('/product/restore/{id}', [
        'uses' => 'ProductController@restore',
        'as'   => 'product.restore'
    ]);
   
    Route::get('/product/restore_all', [
        'uses' => 'ProductController@restoreAll',
        'as'   => 'product.restoreAll'
    ]);
 
    //Fournisseurs

    Route::resource('fournisseurs' , 'FournisseursController');

    //Routes Tag

    Route::resource('tags' , 'TagController');

    //Routes users
    Route::get('/users' , 'UserController@index')->name('users');
    Route::get('/user/create' , 'UserController@create')->name('user.create');
    Route::post('/user/store' , 'UserController@store')->name('user.store');
    Route::get('/user/admin/{id}' , 'UserController@admin')->name('user.admin');
    Route::get('/user/not_admin/{id}' , 'UserController@not_admin')->name('user.not_admin');

    //Routes profiles
    Route::get('user/profile' , 'ProfilesController@index')->name('user.profile');
    Route::post('user/profile/update' , 'ProfilesController@update')->name('user.profile.update');
    Route::get('user/delete/{id}' , 'UserController@destroy')->name('user.destroy');

    //Routes Setting
    Route::get('settings' , 'SettingController@index')->name('settings');
    Route::post('settings/update' , 'SettingController@update')->name('settings.update');

    //Route Search
    Route::get('/products/search' , 'LiveSearch@action')->name('liveSearch.action');
});
 
Route::get('/serialization' , 'serializationController@cast');
Route::get('/serialization/appends', 'serializationController@appends');