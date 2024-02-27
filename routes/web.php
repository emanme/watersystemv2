<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BillingController;
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
*/

Route::get('/', function () {
    // Check if the user is authenticated
    if (auth()->check()) {
        // User is logged in, redirect to the dashboard
        return redirect('/dashboard');
    } else {
        // User is not logged in, redirect to the login page
        return redirect('/login');
    }
});

Route::get('/QWE', function () {
    return view('welcome');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PageController::class, 'index'])->name('dashboard');

    // customers
    Route::get('/customers', [CustomerController::class, 'costumersNotCut'])->name('customers');
    Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit'])->name('editCustomer');
    Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('updateCustomer');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('createCustomer'); //display all customers
    Route::post('/customers', [CustomerController::class, 'store'])->name('storeCustomer'); //save new customers

    Route::get('/forgot', [PageController::class, 'index'])->name('forgot');

    //billings
    Route::get('/billings', [BillingController::class, 'index'])->name('billings');
    Route::get('/billings/{customer}/bill', [BillingController::class, 'index'])->name('billCustomer');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);
});






//[a,b] a=name of the controller class and b=the name of the function
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/logout', [LoginController::class, 'logout']);
//Auth::routes();

//Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
