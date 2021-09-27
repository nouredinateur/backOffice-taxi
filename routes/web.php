<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use PHPUnit\TextUI\XmlConfiguration\Group;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\dashboardController;

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

// Route::get('/', [dashboardController::class, 'index']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


Route::get('/', [dashboardController::class, 'index']);


Route::get('/permission', function() {
    return view('crud.permission');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function() {
        return view('board');
    });
});
// Route::get('/drivers', [DriversController::class, 'index']);

Route::group(['middleware' => ['role:Super-Admin|admin|mod']], function () {

    Route::get('/drivers', [DriversController::class, 'index']);

    Route::get('/customers', function (){
        return view('customers');
    });
    
    Route::get('/routes', function (){
        return view('routes');
    });
    
    Route::get('/profiles', function (){
        return view('profiles');
    });
    
    Route::resources([
        'drivers' => DriversController::class,
    ]);
    
    Route::get('/roles', [RoleController::class, 'index']);

});



require __DIR__.'/auth.php';