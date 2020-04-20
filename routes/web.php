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

// Route::get('/', function () {
//     return view('pages.index');
// })->name('home');
Route::get('/', 'myController@show_post');
Route::get('/about', function() {
	return view('pages.about');
})->name('about');

Route::get('/contact', function() {
	return view('pages.contact');
});

Route::get('/blog', function() {
	return view ('pages.blog');
})->name('myBlog');

/*
Route::get('/create', function() {
	return view('pages.create');
});
*/
// ----catagory controllres---

Route::get('/addCatagory', 'insert_table@catagory_page');
Route::post('/insertCatagory', 'insert_table@insert_catagory')->name('insert_c');
Route::get('/allCatagory', 'insert_table@show_catagory')->name('allCatagory');
Route::get('/viewCatagory{id}', 'insert_table@view_catagory');
Route::get('/deleteCatagory{id}', 'insert_table@delete_catagory');
Route::get('/editCatagory{id}', 'insert_table@edit_catagory');
Route::post('/updateCatagory{id}', 'insert_table@update_catagory');

// ----catagory controllres---
Route::get('/create', 'postController@get_catagory');
Route::post('/insertPost', 'postController@insert_post')->name('insert_post');
Route::get('/allPost', 'postController@all_post')->name('allPost');
Route::get('/viewPost{id}', 'postController@view_post');
Route::get('/editPost{id}', 'postController@edit_post');
Route::post('/updatePost{id}', 'postController@update_post');
Route::get('/deletePost{id}', 'postController@delete_post');
//Route::get('/contact', 'myController@My')->middleware('age');

//-------student controller----

Route::resource('student', 'studentController');