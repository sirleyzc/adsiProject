<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HarvestController;
use App\Http\Controllers\OrderController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

// Employee Routes
Route::get('/api/employee', [EmployeeController::class, 'index']);
Route::post('/api/employee/register', [EmployeeController::class, 'store']);
Route::put('/api/employee/update', [EmployeeController::class, 'update']);
Route::post('/api/employee/delete', [EmployeeController::class, 'destroy']);

// Customer Routes
Route::get('/api/customer', [CustomerController::class, 'index']);
Route::post('/api/customer/register', [CustomerController::class, 'store']);
Route::put('/api/customer/update', [CustomerController::class, 'update']);
Route::delete('/api/customer/delete', [CustomerController::class, 'destroy']);

// Payment Routes
Route::get('/api/payment', [PaymentController::class, 'index']);
Route::post('/api/payment/register', [PaymentController::class, 'store']);

// Harvest Routes
Route::post('/api/harvest/register', [HarvestController::class, 'store']);

// Order Routes
Route::post('/api/order/register', [OrderController::class, 'store']);
