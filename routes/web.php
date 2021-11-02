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
    return view('home');
});

Route::get('/horizontal', function () {
    return view('horizontal');
});

Route::get('/vertical', function () {
    return view('vertical');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/label', function () {
    return view('label');
});

Route::get('/sitemap.xml', [SitemapXmlController::class, 'index']);

Auth::routes();

//Route::post('/converter', 'ConverterController@store');

//Route::get('/', 'HomeController@index')->name('home');
//Route::post('/', 'HomeController@store');

/*Route::post('/', function(){
//    $img = Image::make('foo.jpg')->resize(300, 200);

//    return $img->response('jpg');
});*/




