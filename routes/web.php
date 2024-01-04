<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Roles_Permissions\RoleSetup;
use App\Http\Controllers\Roles_Permissions\RoleController;
use App\Http\Controllers\Roles_Permissions\RoleSetupController;
use App\Http\Controllers\Roles_Permissions\PermissionController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::middleware('auth', 'role:superadmin')->group(function () {

    Route::get('/show-super-admin', function (){
        return "Super Admin";
    })->name('super.admin');

     // All Roles Routes;
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
    Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('/role/update/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('/role/delete/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
     //All Permission routes
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('/permission/store', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('/permission/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::put('/permission/update/{id}', [PermissionController::class, 'update'])->name('permission.update');
    Route::delete('/permission/delete/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
    // Role in permission routes;
    Route::get('/all/roles/permissions', [RoleSetupController::class, 'AllRolePermission'])->name('all.roles.permissions');
    Route::get('/add/role/permission', [RoleSetupController::class, 'AddRolePermission'])->name('add.role.permission');
    Route::post('/store/role/permission', [RoleSetupController::class, 'StoreRolePermission'])->name('store.role.permission');
    Route::get('/edit/role/permission/{id}', [RoleSetupController::class, 'EditRolePermission'])->name('edit.role.permission');
    Route::post('/update/role/permission/{id}', [RoleSetupController::class, 'UpdateRolePermission'])->name('update.role.permission');
    Route::get('/delete/role/permission/{id}', [RoleSetupController::class, 'DeleteRolePermission'])->name('delete.role.permission');




   
    
});

Route::middleware('auth', 'role:admin')->group(function () {
    
    Route::get('/show-admin', function (){
        return "Admin";
    })->name('admin');
    

});

Route::middleware('auth', 'role:editor')->group(function () {
    
    Route::get('/show-editor', function (){
        return "editor";
    })->name('editor');
    
});

Route::middleware('auth', 'role:user')->group(function () {
    
    Route::get('/show-user', function (){
        return "user";
    })->name('user');
    
});

Route::middleware(['auth', 'role:superAdmin|admin'])->group(function () {
    Route::get('/show', [IndexController::class, 'index']);
    Route::post('/assign/permission', [IndexController::class, 'givePermissionRole'])->name('assign.permission');
});

