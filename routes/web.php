<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\App;
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

Route::get('/form', [FormController::class, 'showForm'])->name('form')->defaults('locale', 'en');
Route::get('/set-language/{locale}', [FormController::class, 'setLanguage'])->name('set-language');
Route::get('/get-translations/{locale}', [FormController::class, 'getTranslations']);