<?php
use App\Http\Controllers\CustomerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

40

*/


// Route::view('contact', 'contact');
Route::get('/contact', 'ContactFormController@create')->name('contact.create');
Route::post('/contact', 'ContactFormController@store')->name('contact.store');

Route::view('/', 'welcome');
Route::view('about', 'about');


// Route::get('customers', 'CustomerController@index');
// Route::get('/customers/create', 'CustomerController@create');
// Route::post('/customers', 'CustomerController@store');
// Route::get('/customers/{customer}', 'CustomerController@show')->middleware('can:view,customer');
// Route::get('/customers/{customer}/edit', 'CustomerController@edit')->name('customers.edit');
// Route::patch('/customers/{customer}', 'CustomerController@update')->name('customers.update');
// Route::delete('/customers/{customer}', 'CustomerController@destroy')->name('customers.destroy');

// Route::resource('/customers', 'CustomerController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Route::get('/phone', function () {

//     $user = factory(\App\User::class)->create();

//     $user->phone()->create([
//         'phone' => '11111'
//     ]);
// });


Route::group(['prefix' => 'customers', 'as' => 'customers.'], function () {
	Route::get('/', [CustomerController::class, 'index'])->name('index');
	Route::post
	('/', [CustomerController::class, 'store'])->name('store');
	Route::get('/create', [CustomerController::class, 'create'])->name('create');
	Route::get('/{customer}', [CustomerController::class, 'show'])->name('show')->middleware('can:view,customer');;
	Route::get('/{customer}/edit', [CustomerController::class, 'edit'])->name('edit');
	Route::patch('/customers{customer}', [CustomerController::class, 'update'])->name('update');
	Route::delete('/{customer}', [CustomerController::class, 'destroy'])->name('destroy');
});