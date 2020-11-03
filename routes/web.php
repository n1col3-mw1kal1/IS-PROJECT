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
/**/

use Illuminate\Support\Facades\Auth;
use App\User;

Route::group(['middleware' => ['auth']], function(){

Route::get('/', function(){
	$user = User::where('id', Auth()->user()->id)->first();

	if($user->role == 'admin'){
		return redirect('admin');
	}
	elseif($user->role == 'vet'){
		return redirect('vet');
	}
	elseif($user->role == 'farmer'){
		return redirect('farmer');
	}
});
	

Auth::routes();



Route::group(['middleware' => ['App\Http\Middleware\AdminMiddleware']], function(){
	Route::get('admin', 'FarmerController@index');
	Route::get('create/farmer', 'FarmerController@create');
	Route::post('create/farmer','FarmerController@save');
	Route::get('farmers','FarmerController@show');
	Route::get('edit/farmer/{id}', 'FarmerController@edit');
	Route::post('edit/farmer/{id}', 'FarmerController@update');
	Route::post('delete/farmer/{id}', 'FarmerController@do_delete');
	Route::get('vets', 'VetController@vets');
	Route::get('update/vet/{id}', 'VetController@edit');
	Route::post('update/vet/{id}', 'VetController@update');
	Route::get('delete/vet/{id}', 'VetController@delete');
	Route::get('transaction/farmer/{id}', 'FarmerController@transaction');
	Route::post('transaction/farmer/{id}', 'FarmerController@save');

});


Route::group(['middleware' => ['App\Http\Middleware\VetMiddleware']], function(){
	Route::get('vet', 'VetController@index');
	Route::get('vet/profile', 'VetController@profile');
	Route::post('answer/{id}', 'VetController@answer');

});


Route::group(['middleware' => ['App\Http\Middleware\FarmerMiddleware']], function(){
	Route::get('farmer', 'FarmerController@farmer');
	Route::get('question', 'FarmerController@question');
	Route::post('question/{id}', 'FarmerController@do_question');
	Route::get('farmer/profile', 'FarmerController@profile');
});

});
//Route::Resource('farmer','FarmerController');



Route::get('delete/farm', function(Request $request){
	$farmer = App\Farmer::where('id', $request->input('id'))->first();
	return $farmer;
});


/*Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('multiple-image', 'ImageController@index');
 Route::post('multiple-save', 'ImageController@save');
 Route::get('profile','UserController@profile');