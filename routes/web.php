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

Route::get('/contact', 'ContactsController@index')->name('contact');
Route::get('/add', 'contact_groupController@index')->name('add');
Route::get('/group', 'GroupsController@index')->name('group');
Route::get('/send', 'ContactsController@opensend')->name('send');
Route::post('/api/sms', 'BulkSmsController@sendSms');
Route::post('/api/contacts', 'ContactsController@store');
Route::post('/api/groups', 'GroupsController@store');
Route::get('/api/getusers', 'GroupsController@getusers');
Route::get('/api/getgroups', 'GroupsController@getgroups')->name('getgroups');
Route::post('/api/addsub', 'contact_groupController@store')->name('addsub');
// Route::get('/api/addsub', function () {
//     return 'hello world';
// });
// Route::get('/getusers', 'GroupsController@getusers')->name('getusers');
