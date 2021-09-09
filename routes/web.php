<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'home'])
    ->name('home');

Route::group([
    'as' => 'employees.',
    'prefix' => 'employees',
], function () {
    Route::get('/', [HomeController::class, 'employees'])
        ->name('index');

    Route::get('edit/{employee:id}', [HomeController::class, 'editEmployee'])
        ->name('edit');

    Route::get('add', function () {
        return view('employees.add');
    })->name('add');
});

Route::group([
    'as' => 'departments.',
    'prefix' => 'departments',
], function () {
    Route::get('/', [HomeController::class, 'departments'])
        ->name('index');

    Route::get('edit/{department:id}', [HomeController::class, 'editDepartment'])
        ->name('edit');

    Route::get('add', function () {
        return view('departments.add');
    })->name('add');
});
