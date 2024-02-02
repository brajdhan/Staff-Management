<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CommandController;

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class)->middleware('role:admin|user|staff');
    Route::resource('roles', RoleController::class)->middleware('role:admin');
    Route::resource('permissions', PermissionController::class)->middleware('role:admin');
});

Route::get('/commands', [CommandController::class, 'index']);
Route::get('/command/run-migration', [CommandController::class, 'runMigration'])->name('runMigration');
Route::get('/command/run-migrate-rollback', [CommandController::class, 'runMigrationRollback'])->name('runMigrationRollback');
Route::get('/command/run-fresh-migrate', [CommandController::class, 'runMigrationFresh'])->name('runMigrationFresh');
Route::get('/command/run-optimize-clear', [CommandController::class, 'runOptimizeClear'])->name('runOptimizeClear');
Route::get('/command/run-config-cache', [CommandController::class, 'runConfigCache'])->name('runConfigCache');
Route::get('/command/run-db-seed', [CommandController::class, 'runDBSeed'])->name('runDBSeed');

require __DIR__ . '/auth.php';
