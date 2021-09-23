<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\DriversController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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


Route::middleware(['auth', 'admin'])->group(function () {
    


    Route::get('/dashboard', function() {
        return view('dashboard');
    });

});

Route::group(['middleware' => ['role:admin|mod']], function () {

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
    
});



require __DIR__.'/auth.php';