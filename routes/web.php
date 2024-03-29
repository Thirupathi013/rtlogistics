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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes(['verify'=>true]);


Route::group(['middleware' => ['auth','verified']], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/components', function(){
        return view('components');
    })->name('components');


    Route::resource('users', 'UserController');

    Route::get('/profile/{user}', 'UserController@profile')->name('profile.edit');

    Route::post('/profile/{user}', 'UserController@profileUpdate')->name('profile.update');

    Route::resource('roles', 'RoleController')->except('show');

    Route::resource('permissions', 'PermissionController')->except(['show','destroy','update']);

    Route::resource('category', 'CategoryController')->except('show');

    Route::resource('post', 'PostController');

    Route::get('cashbill/fetchlrdata', 'CashbillController@fetchlrdata');
    Route::get('cashbill/updatelrdata', 'CashbillController@updatelrdata');
    Route::get('cashbill/generatepdf/{cashbill}', 'CashbillController@generatePDF')->name('cashbill.generatepdf');


    Route::resource('party', 'PartyController');
    Route::resource('bookingstation', 'BookingstationController');
    Route::resource('destination', 'DestinationController');
    Route::resource('description', 'DescriptionController');
    Route::resource('motordetail', 'MotordetailController');
    Route::resource('driverdetail', 'DriverdetailController');
    Route::resource('hamaliname', 'HamalinameController');
    Route::resource('partydetail', 'PartydetailController');
    Route::resource('marketingexecutive', 'MarketingexecutiveController');
    Route::resource('lrdetail', 'LrdetailController');
    Route::resource('cashbill', 'CashbillController');



    Route::get('/activity-log', 'SettingController@activity')->name('activity-log.index');

    Route::get('/settings', 'SettingController@index')->name('settings.index');

    Route::post('/settings', 'SettingController@update')->name('settings.update');


    Route::get('media', function (){
        return view('media.index');
    })->name('media.index');
});
