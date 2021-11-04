<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\UserController;
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


Route::middleware(['auth', 'permission:dashboard'])->group(function () {
    Route::get('/', [dashboardController::class, 'index']);
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function() {
        return view('board');
    });
});

Route::get('/notadminplace',function() {
    return view('errors.404');
});

Route::group(['middleware' => ['permission:dashboard']], function () {

    Route::get('/dashboard', function() {
                return view('board');
            });

    // Route::get('/drivers', [DriversController::class, 'index']);

    Route::get('/customers', function (){
        return view('customers');
    });
    Route::get('/drivers', function (){
        return view('drivers');
    });
    
    Route::get('/routes', function (){
        return view('routes');
    });

    Route::get('/reviews', function (){
        return view('profiles');
    });

    

    Route::resources([
        // 'drivers' => DriversController::class,
        'roles' => RoleController::class,
        'permissions' => PermissionController::class,
        'users' => UserController::class
    ]);

    Route::post('/revokepermission', [RoleController::class, 'revokePermissions'])->name('revokePermission');
    Route::post('/assignpermission', [RoleController::class, 'assignPermissions'])->name('assignPermission');
    Route::post('/revokerole', [PermissionController::class, 'revokeRoles'])->name('revokeRole');
    Route::post('/assignrole', [PermissionController::class, 'assignRoles'])->name('assignRole');
    // Route::get('/rolesusers', [UserController::class, 'index']);
    // Route::get('/roles', [RoleController::class, 'rolesIndex']);
    // Route::get('/permission', [RoleController::class, 'permissionIndex']);
});

require __DIR__.'/auth.php';