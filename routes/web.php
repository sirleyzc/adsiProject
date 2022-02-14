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
Route::middleware(['auth:sanctum', 'verified'])->get('/api/employee', [EmployeeController::class, 'index'])->name('employee');
Route::middleware(['auth:sanctum', 'verified'])->get('/api/employee/data', [EmployeeController::class, 'indexData']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/employee/register', [EmployeeController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->put('/api/employee/update', [EmployeeController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/employee/delete', [EmployeeController::class, 'destroy']);

// Customer Routes
Route::middleware(['auth:sanctum', 'verified'])->get('/api/customer', [CustomerController::class, 'index'])->name('customer');
Route::middleware(['auth:sanctum', 'verified'])->post('/api/customer/register', [CustomerController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->put('/api/customer/update', [CustomerController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->delete('/api/customer/delete', [CustomerController::class, 'destroy']);

// Payment Routes
Route::middleware(['auth:sanctum', 'verified'])->get('/api/payment', [PaymentController::class, 'index'])->name('payment');
Route::middleware(['auth:sanctum', 'verified'])->post('/api/payment/register', [PaymentController::class, 'store']);

// Harvest Routes
Route::middleware(['auth:sanctum', 'verified'])->post('/api/harvest/register', [HarvestController::class, 'store']);

// Order Routes
Route::middleware(['auth:sanctum', 'verified'])->post('/api/order/register', [OrderController::class, 'store']);
