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

Route::get('/', 'HomeController@index');
Route::redirect('/home','/quiz')->name('home');

Route::resources([
    '/quiz' => 'Maker\QuizController',
    '/information' => 'Maker\InformationController'
]);

Route::get('/start/{quiz:slug}','QuizController@start')
    ->name('quiz.start');

Route::post('/next','QuizController@next')
    ->name('quiz.next');

Auth::routes();

