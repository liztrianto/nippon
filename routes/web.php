<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


Route::get('/',  'App\Http\Controllers\DashboardController@index')->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

Route::get('/dashboard',  'App\Http\Controllers\DashboardController@index' )->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    // Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');   



    Route::group(['middleware' => ['permission:signboard']], function(){
        // Master Signboard
        Route::resource('/toko', 'App\Http\Controllers\Master\TokoController', ['except' => ['edit','show','create','destroy']]);

        // PENGAJUAN SIGNBOARD
        Route::get('/signboard/json', 'App\Http\Controllers\Signboard\SignboardController@json')->name('signboard.json');
        Route::get('/signboard', 'App\Http\Controllers\Signboard\SignboardController@index')->name('signboard.index');
        Route::get('/signboard/create', 'App\Http\Controllers\Signboard\SignboardController@create')->name('signboard.create');
        Route::post('/signboard', 'App\Http\Controllers\Signboard\SignboardController@store')->name('signboard.store');
        Route::post('/signboard/create', 'App\Http\Controllers\Signboard\SignboardController@simpanSales')->name('signboard.addsales');
        Route::post('/signboard/add', 'App\Http\Controllers\Signboard\SignboardController@simpanExpedisi')->name('signboard.addexpedisi');
        
        Route::post('/signboard/selecttoko', 'App\Http\Controllers\Signboard\SignboardController@selectToko')->name('signboard.selecttoko');
        Route::get('/signboard/gettoko', 'App\Http\Controllers\Signboard\SignboardController@getToko')->name('signboard.gettoko');
        Route::get('/signboard/getsales', 'App\Http\Controllers\Signboard\SignboardController@getSales')->name('signboard.getsales');
        Route::get('/signboard/getexpedisi', 'App\Http\Controllers\Signboard\SignboardController@getExpedisi')->name('signboard.getexpedisi');
        // Route::post('/pengadaan/selectpemohon','Permintaan\PengadaanController@selectpemohon')->name('pengadaan.selectpemohon');
    });
    
    // APPROVAL SIGNBOARD 
    Route::group(['middleware' => ['permission:approval-signboard']], function(){
        // Route::get('/signboard/show', 'App\Http\Controllers\Signboard\SignboardController@show')->name('signboard.show');
        Route::get('/approval/{id}/showphoto', 'App\Http\Controllers\Signboard\ApprovalController@showPhoto')->name('approval.showphoto');
        Route::get('/approval/{id}/showfile', 'App\Http\Controllers\Signboard\ApprovalController@showFile')->name('approval.showfile');
        Route::get('/approval/json', 'App\Http\Controllers\Signboard\ApprovalController@json')->name('approval.json');
        Route::get('/approval/jsonall', 'App\Http\Controllers\Signboard\ApprovalController@jsonall')->name('approval.jsonall');
        // Route::get('/approval', 'App\Http\Controllers\Signboard\ApprovalController@index')->name('approval.index');
        Route::resource('/approval', 'App\Http\Controllers\Signboard\ApprovalController')->except([
            'destroy'
        ]);
        // Route::patch('/approval', 'App\Http\Controllers\Signboard\ApprovalController@approve')->name('approval.approve');
        Route::patch('/approval/{id}/approve', 'App\Http\Controllers\Signboard\ApprovalController@approve')->name('approval.approve');
        Route::patch('/approval/{id}/reject', 'App\Http\Controllers\Signboard\ApprovalController@reject')->name('approval.reject');      
        Route::get('/getdepoall', 'App\Http\Controllers\Master\DepoController@getdepoall')->name('getdepoall');
        Route::get('/getdepot/{idmanager}', 'App\Http\Controllers\Master\DepoController@getdepot')->name('getdepot');

    });

    // CONTROLLER SIGNBOARD 
    Route::group(['middleware' => ['permission:controller-signboard']], function(){
        Route::get('/controller/export', 'App\Http\Controllers\Signboard\ControllerController@exportExcel')->name('controller.export');
        Route::get('/controller/json', 'App\Http\Controllers\Signboard\ControllerController@json')->name('controller.json');
        Route::get('/controller/jsonall', 'App\Http\Controllers\Signboard\ControllerController@jsonall')->name('controller.jsonall');    
        Route::get('/getdepoall', 'App\Http\Controllers\Master\DepoController@getdepoall')->name('getdepoall');
        Route::get('/getdepot/{idmanager}', 'App\Http\Controllers\Master\DepoController@getdepot')->name('getdepot');

        // Route::get('/controller', 'App\Http\Controllers\Signboard\ControllerController@index')->name('controller.index');
        Route::resource('/controller', 'App\Http\Controllers\Signboard\ControllerController')->except([
            'destroy'
        ]);

    });
    Route::get('/controller/{id}/showphoto', 'App\Http\Controllers\Signboard\ControllerController@showPhoto')->name('controller.showphoto');
        Route::get('/controller/{id}/showfile', 'App\Http\Controllers\Signboard\ControllerController@showFile')->name('controller.showfile');
        

     // VENDOR SIGNBOARD 
     Route::group(['middleware' => ['permission:controller-signboard']], function(){
        Route::get('/signboard/vendor/json', 'App\Http\Controllers\Signboard\VendorController@json')->name('signboard.vendor.json');
        Route::get('/signboard/vendor/jsonall', 'App\Http\Controllers\Signboard\VendorController@jsonall')->name('signboard.vendor.jsonall');    
        Route::get('/getdepoall', 'App\Http\Controllers\Master\DepoController@getdepoall')->name('getdepoall');
        Route::get('/getdepot/{idmanager}', 'App\Http\Controllers\Master\DepoController@getdepot')->name('getdepot');
        
        // Route::get('/signboard/vendor', 'App\Http\Controllers\Signboard\VendorController@index')->name('signboard.vendor.index');
        Route::resource('/signboard/vendor', 'App\Http\Controllers\Signboard\VendorController')->except([
            'destroy'
        ]);

    });

    
    Route::group(['middleware' => ['permission:master-data']], function(){
        //Master
        Route::resource('/depo', 'App\Http\Controllers\Master\DepoController', ['except' => ['edit','show','create','destroy']]);
        Route::resource('/departemen', 'App\Http\Controllers\Master\DepartemenController', ['except' => ['edit','show','create','destroy']]);

        //jabatan
        Route::get('/jabatan', 'App\Http\Controllers\Master\JabatanController@index')->name('jabatan.index');
        Route::post('/jabatan', 'App\Http\Controllers\Master\JabatanController@store')->name('jabatan.store');
        Route::patch('/jabatan/{id}', 'App\Http\Controllers\Master\JabatanController@update')->name('jabatan.update');
        Route::delete('/jabatan/{id}', 'App\Http\Controllers\Master\JabatanController@destroy')->name('jabatan.destroy');
        
        Route::get('/getdept', 'App\Http\Controllers\Master\DepartemenController@getdept')->name('getdept');
        
        // USER
        Route::resource('/users', 'App\Http\Controllers\UserController')->except([
            'show'
        ]);
        // Route::get('/users', 'UserController@index')->name('users.index');
        // Route::get('/users/create', 'UserController@create')->name('users.create'); 
        Route::get('/users/json', 'App\Http\Controllers\UserController@json')->name('users.json');


        //Role
        Route::resource('/role', 'App\Http\Controllers\RoleController')->except([
            'create', 'show', 'edit'
        ]);

        //Role-Permission
        Route::get('/role/permission/{id}', 'App\Http\Controllers\RoleController@rolePermissionList')->name('role.permission.list');
        Route::post('/role/permission/{id}', 'App\Http\Controllers\RoleController@rolePermissionAdd')->name('role.permission.add');
        Route::delete('/role/permission/{id}', 'App\Http\Controllers\RoleController@rolePermissionDelete')->name('role.permission.delete');
        //Role-User
        Route::get('/role/user/{id}', 'App\Http\Controllers\RoleController@roleUserList')->name('role.user.list');
        Route::post('/role/user/{id}', 'App\Http\Controllers\RoleController@roleUserAdd')->name('role.user.add');
        Route::delete('/role/user/{id}', 'App\Http\Controllers\RoleController@roleUserDelete')->name('role.user.delete');
        
        //Permission
        Route::resource('/permission', 'App\Http\Controllers\PermissionController')->except([
            'create', 'show', 'edit'
        ]);
        //Permission-Role
        Route::get('/permission/user/{id}', 'App\Http\Controllers\PermissionController@permissionUserList')->name('permission.user.list');
        Route::post('/permission/user/{id}', 'App\Http\Controllers\PermissionController@permissionUserAdd')->name('permission.user.add');
        Route::delete('/permission/user/{id}', 'App\Http\Controllers\PermissionController@permissionUserDelete')->name('permission.user.delete');
        //Permission-Role
        Route::get('/permission/role/{id}', 'App\Http\Controllers\PermissionController@permissionRoleList')->name('permission.role.list');
        Route::post('/permission/role/{id}', 'App\Http\Controllers\PermissionController@permissionRoleAdd')->name('permission.role.add');
        Route::delete('/permission/role/{id}', 'App\Http\Controllers\PermissionController@permissionRoleDelete')->name('permission.role.delete');

    });

});

require __DIR__.'/auth.php';
