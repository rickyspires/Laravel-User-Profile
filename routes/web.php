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

//TRAITS
// Route::get('/test', function () {
//     return Auth::user()->test();
// });


Auth::routes();

/* ADMIN */
Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
});


/*
	'middleware'=>'auth' = loggin in users only
*/
// Route::group(['middleware'=>'auth:admin'],function(){

// 	/* admin dashboard */
// 	Route::get('/', 'AdminController@index')->name('admin.dashboard');

// 	/* PROFILES */
// 	Route::get('/profile', 'HomeController@index')->name('admin.dashboard');  //needed for register
// 	Route::get('/profile/{slug}', 'AdminController@index')->name('profile.index');
	
// 	/* CHANGE PROFILE PICTURE */
// 	Route::get('/changeProfilePhoto', function(){
// 		return view('profile.profile_pic');
// 	});
	
// 	/* UPLOAD PROFILE PICTURE */
// 	Route::post('/uploadProfilePhoto', 'AdminController@uploadProfilePhoto')->name('profile.uploadProfilePhoto');
	
// 	/* EDIT PROFILES */
// 	Route::get('editProfile', 'AdminController@editProfileForm'); 

// 	/* SEARCH MEMBERS - Get all users except for logged in user and admin */
// 	Route::get('/searchMembers', 'AdminController@searchMembers');

// });





/*
	'middleware'=>'auth' = loggin in USERS only
*/
Route::group(['middleware'=>'auth'],function(){

	/* user dashboard */
	Route::get('/home', 'HomeController@index');

	/* PROFILES */
	Route::get('/profile', 'HomeController@index')->name('user.dashboard');  //needed for register
	Route::get('/profile/{slug}', 'ProfileController@index')->name('profile.index');
	
	/* CHANGE PROFILE PICTURE */
	Route::get('/changeProfilePhoto', function(){
		return view('profile.profile_pic');
	});
	
	/* UPLOAD PROFILE PICTURE */
	Route::post('/uploadProfilePhoto', 'ProfileController@uploadProfilePhoto')->name('profile.uploadProfilePhoto');
	
	/* EDIT PROFILES */
	Route::get('editProfile', 'profileController@editProfileForm'); 

	/* SEARCH MEMBERS - Get all users except for logged in user and admin */
	Route::get('/searchMembers', 'ProfileController@searchMembers');

	/* ADD A FRIEND */
	Route::get('/addFriend/{id}', 'ProfileController@sendFriendRequest');

	/* FRIEND REQUESTS LIST */
	Route::get('/friendRequests', 'ProfileController@friendRequests');

	/* ACCEPT FRIEND REQUESTS */
	Route::get('/acceptFriend/{id}', 'ProfileController@acceptFriend');
});

Route::get('/logout', 'Auth\LoginController@logout');
