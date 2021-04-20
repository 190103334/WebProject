<?php

use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MailController;
use App\Http\Middleware\Localization;

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

Route::get('services', [MainController::class, 'index']);

Route::get('aesthetic', function(){
    return view('aesthetic');
});

Route::post('/index', [MainController::class, 'save'])->name('save');
Route::get('email/sending', [MailController::class, 'send'])->name('send');

Route::get('{lang}',function ($lang){
	App()->setLocale($lang);
	return view('aesthetic');
});

Route::get('lang/{lang}', [LocalizationController::class, 'index']);

