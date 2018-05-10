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
    return view('welcome');
});

// Admin route
Route::group(['middleware'=>['web','admin']], function(){
    Route::get('/users/data',['as' => 'users.data', 'uses'=>'UsersController@anyData']);
    Route::get('/adminpanel/bu/data',['as' => 'adminpanel.bu.data', 'uses'=>'BuController@anyData']);
    Route::get('/adminpanel/contact/data',['as' => 'adminpanel.contact.data', 'uses'=>'ContactController@anyData']);
    #admin
    Route::get('/adminpanel','AdminController@index');
    #users
    Route::resource('users','UsersController');
    Route::get('/users/{id}/delete','UsersController@destroy');
    Route::post('/user/changepassword','UsersController@UpdatePassword');
#Stie setting
    Route::get('/adminpanel/sitesetting','SiteSettingController@index');
    Route::post('/adminpanel/sitesetting','SiteSettingController@store');


    #contact us
    Route::resource('/adminpanel/contact','ContactController');
    Route::get('/adminpanel/contact/{id}/delete','ContactController@destroy');

    #users
    Route::resource('/adminpanel/bu','BuController',['except'=>['index','show']]);
    Route::get('/adminpanel/bu/{id?}','BuController@index');

    Route::get('/adminpanel/bu/{id}/delete','BuController@destroy');


    // change the state of building
    Route::get('/adminpanel/changestatus/{id}/{status}','UsersController@ChangeStatus');


    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

});


// User route
Route::get('/ShowAllBuildings','BuController@showAllEnable');
Route::get('/ForRent','BuController@ForRent');
Route::get('/ForBuy','BuController@ForBuy');
Route::get('/type/{type}','BuController@ShowByType');
Route::get('/search','BuController@search');
Route::get('/SingleBuilding/{id}','BuController@SingleBuilding');
Route::get('/ajax/bu/information','BuController@getAjaxInfo');
Route::get('/contact','HomeController@contact');
Route::post('/contact','ContactController@store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');


//add property from user
Route::get('/user/create/building','BuController@userAddView');
Route::post('/user/create/building','BuController@userStore');

// show buildings to specific user
Route::get('/user/buldingShow','BuController@showUserBuildings')->middleware('auth');
Route::get('/user/buldingShowWait','BuController@showUserWaitingBuildings')->middleware('auth');

//let user edit his info
Route::get('/user/editinfo','UsersController@userEditinfo')->middleware('auth');
Route::patch('/user/editinfo',['as'=>'user.editinfo','uses'=>'UsersController@userUpdateProfile'])->middleware('auth');
//let user change his password
Route::post('/user/changecurrentpassword','UsersController@userChangePassword')->middleware('auth');
// user can edit un actived proteries
Route::get('/user/editBuilding/{id}','BuController@userEditProperty')->middleware('auth');
Route::post('/user/update/building','BuController@userUpdateProperty')->middleware('auth');


//test multiUpload image

Route::get('/multiuploads', 'BuController@uploadForm');
Route::post('/multiuploads', 'BuController@uploadSubmit');

