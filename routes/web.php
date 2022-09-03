<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GroupController;
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
/*
Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
require __DIR__.'/auth.php';

Route::group(['prefix'=>'employees'], function(){
    Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/store', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('/destroy/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
});

Route::group(['prefix'=>'groups'], function(){
    Route::get('/', [GroupController::class, 'index'])->name('group.index');
    Route::get('/show/{id}', [GroupController::class, 'show'])->name('group.show');
    Route::get('/create', [GroupController::class, 'create'])->name('group.create');
    Route::post('/store', [GroupController::class, 'store'])->name('group.store');
    Route::get('/edit/{id}', [GroupController::class, 'edit'])->name('group.edit');
    Route::put('/update/{id}', [GroupController::class, 'update'])->name('group.update');
    Route::delete('/destroy/{id}', [GroupController::class, 'destroy'])->name('group.destroy');
});
