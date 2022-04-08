<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\SuggestionController;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/customers', [CustomerController::class, 'index'])->name('customer.show');
    Route::get('/customers/new', [CustomerController::class, 'new'])->name('customer.new');
    Route::get('/customer/{id}', [CustomerController::class, 'show'])->name('customer.detail');
    Route::get('/customer/{id}/complaints', [CustomerController::class, 'complaints'])->name('customer.complaints');
    Route::get('/customer/{id}/complaints/new', [CustomerController::class, 'newComplaint'])->name('customer.complaints.new');
    Route::get('/customer/{id}/suggestions', [CustomerController::class, 'suggestions'])->name('customer.suggestions');
    Route::get('/customer/{id}/suggestions/new', [CustomerController::class, 'newSuggestion'])->name('customer.suggestions.new');

    Route::get('/complaints', [ComplaintController::class, 'index'])->name('complaint.show');
    Route::get('/complaints/new', [ComplaintController::class, 'new'])->name('complaint.new');
    Route::get('/complaint/{id}', [ComplaintController::class, 'show'])->name('complaint.detail');
    Route::get('/complaint/{id}/update', [ComplaintController::class, 'update'])->name('complaint.update');

    Route::get('/suggestions', [SuggestionController::class, 'index'])->name('suggestion.show');
    Route::get('/suggestion/{id}', [SuggestionController::class, 'show'])->name('suggestion.detail');
    Route::get('/suggestion/{id}/update', [SuggestionController::class, 'update'])->name('suggestion.update');

    Route::post('/customers/new/save', [CustomerController::class, 'create'])->name('customer.save');
    Route::post('/complaint/{id}/update', [ComplaintController::class, 'saveUpdate'])->name('complaint.update.save');
    Route::post('/suggestion/{id}/update', [SuggestionController::class, 'saveUpdate'])->name('suggestion.update.save');
    Route::post('/customer/{id}/complaints/save', [ComplaintController::class, 'save'])->name('customer.complaints.save');
    Route::post('/customer/{id}/suggestions/save', [SuggestionController::class, 'save'])->name('customer.suggestions.save');
});


Route::get('/', [AuthController::class, 'dashboard']);
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/registration', [AuthController::class, 'registration'])->name('register');
Route::post('/post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::post('/post-registration', [AuthController::class, 'postRegistration'])->name('register.post');