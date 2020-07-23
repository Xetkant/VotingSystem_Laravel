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

/*Route::get('home', 'PageController@main')->name('main');*///route ko name pay tar name('')

Route::get('index', 'PageController@index')->name('index');
Route::get('/', 'PageController@index')->name('index');


Route::get('about', 'PageController@about')->name('about');

Route::get('package/{cid}', 'PageController@packages')->name('candidate.packages');

Route::get('help', 'PageController@help')->name('help');

Route::resource('candidates', 'CandidateController');

Route::resource('packages', 'PackageController');

Route::get('voters', 'PageController@voters')->name('voters.index');

Route::post('vote', 'PageController@store')->name('vote');

Route::get('votelist', 'PageController@votelist')->name('votelist');

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');*/
