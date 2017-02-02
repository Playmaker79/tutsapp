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

Auth::routes();

Route::get('/home', 'HomeController@index');

/*route for handling user block*/
Route::get('user/{id}/block','admin\adminController@blockUser')
    ->name('blockUser');

/*route for handling user unblock*/
Route::get('user/{id}/unblock','admin\adminController@unblockUser')
    ->name('unblockUser');

/*serve a course's cover image */
Route::get('cover/{id}','mentor\mentorController@coverImage')
    ->name('coverImage');


/*serve a course's video lesson */
Route::get('videos/{id}','mentor\mentorController@serveVideo')
    ->name('serveVideo');

/*serve a course's Ebook */
Route::get('ebooks/{id}','mentor\mentorController@serveEbook')
    ->name('serveEbook');




