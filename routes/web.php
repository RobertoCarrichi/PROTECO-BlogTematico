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
   	$articulos_recientes = Articulo::latest()
	 ->take(3)
	 ->get();
	return view('welcome',['recientes' => $articulos_recientes]);
})->name('main');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['AdminAccess'])->group(function() {
	Route::resource('AdminArticulos','ArticleController');
});

Route::resource('show','showController');

Route::resource('comment','CommentController');

Route::get('/profile/{id}', function($id){
	$user = User::findOrFail($id);
	return view('profile',['user' => $user]);
});

Route::get('varonil', function(){
	$articulos = Articulo::all();
	return view('categoria1',['articulos'=>$articulos]);
})->name('index.varonil');

Route::get('femenil', function(){
	$articulos = Articulo::all();
	return view('categoria2',['articulos'=>$articulos]);
})->name('index.femenil');

Auth::routes();