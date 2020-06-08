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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

$group = [
    'prefix' => 'invoices',
    'middleware' => ['auth'],
];


$methods = ['index', 'edit', 'update', 'create', 'store', 'show', 'destroy'];

Route::resource('invoices', 'InvoiceController')
    ->only($methods)
    ->names('invoices');

Route::resource('account', 'UserController')
    ->only($methods)
    ->names('account');

Route::group($group, static function () {
    $methods = ['index', 'edit', 'update', 'create', 'store', 'show', 'destroy'];
    Route::resource('{invoice}/parcels', 'ParcelController')
        ->only($methods)
        ->names('invoices.parcels');

    Route::resource('{invoice}/senders', 'UserController')
        ->only($methods)
        ->names('invoices.senders');
});

Route::get('/about/departments', 'DepartmentController@index')->name('about.departments.index');

//Route::get('invoice/{invoice}/parcels/{parcel}/edit', 'ParcelController@edit')->name('invoices.parcels.edit');
//Route::get('invoices/{invoice}/parcels')
