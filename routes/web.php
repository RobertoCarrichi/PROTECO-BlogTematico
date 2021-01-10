<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Articulo;

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
})->name('main');


Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['AdminAccess'])->group(function() {
	Route::resource('AdminArticulos','ArticleController');
});

Route::resource('show','showController');

Route::resource('comment','CommentController');

// Route::get('/profile', 'showController@profile')->name('profile');

Route::get('/profile/{id}', function($id){
	// return redirect('profile');
	$user = User::findOrFail($id);
	return $user->name;
})->name('test');




Auth::routes();