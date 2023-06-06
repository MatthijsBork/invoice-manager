<?php

use App\Http\Controllers\DashboardController;
use App\Models\Role;
use App\Models\Invoice;
use App\Http\Controllers\InvoiceController;
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

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'view'])
        ->name('dashboard')->can('viewAny', Invoice::class);
    
    Route::get('/invoices/create', [InvoiceController::class, 'create'])
        ->name('invoices.create')->can('create', Invoice::class);
    
    Route::post('/invoices', [InvoiceController::class, 'store'])
        ->name('invoices.store')->can('create', Invoice::class);

    Route::delete('/invoices/{invoice}',[InvoiceController::class, 'destroy'])
        ->name('invoices.destroy')->can('destroy', 'invoice');

    Route::get('/invoices/{invoice}/edit',[InvoiceController::class, 'edit'])
        ->name('invoices.edit')->can('update', 'invoice');

    Route::put('/invoices/{invoice}', [InvoiceController::class, 'update'])
        ->name('invoices.update')->can('update', 'invoice');


    Route::get('/invoices/{invoice}',[InvoiceController::class, 'show'])->name('invoices.show')->can('view', 'invoice');

    
});



require __DIR__.'/auth.php';
