<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['verify' => true]);

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

Route::get('/', [App\Http\Controllers\HomepageController::class, 'index'])->name('search-list');

Route::get('/list', [App\Http\Controllers\HomepageController::class, 'list'])->name('project-list');

Route::get('/list/details/{id}', [App\Http\Controllers\HomepageController::class, 'show'])->name('project-details');

Route::get('/download/{file_name}', [App\Http\Controllers\HomepageController::class, 'download']);

// Route::get('/list/details/{id}', [App\Http\Controllers\HomepageController::class, 'show']);

Route::get('/mail', [App\Http\Controllers\MailNotificationController::class, 'sendDownloadNotification']);

Route::group(['prefix' => 'back', 'middleware' => ['auth', 'verified']], function(){
	Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

	Route::get('/register/security', [App\Http\Controllers\Admin\DashboardController::class, 'security_question'])->name('sec_question');

	Route::get('/register/enc_key', [App\Http\Controllers\Admin\DashboardController::class, 'enc_key'])->name('enc_form');

	//login routes
	Route::get('/login/security_question', [App\Http\Controllers\Admin\UserLoginController::class, 'home']);

	Route::get('/login/security', [App\Http\Controllers\Admin\UserLoginController::class, 'sec_question'])->name('security_question');

	Route::get('/login/otp', [App\Http\Controllers\Admin\UserLoginController::class, 'otp'])->name('otp');

	Route::get('/login/otp/check', [App\Http\Controllers\Admin\UserLoginController::class, 'otp_check'])->name('otp');

	Route::get('/login/encryption_key', [App\Http\Controllers\Admin\UserLoginController::class, 'enc_key'])->name('enc_key');

	Route::get('/login/remote_access', [App\Http\Controllers\Admin\UserLoginController::class, 'remote_access']);

	Route::get('/login/remote_access/check', [App\Http\Controllers\Admin\UserLoginController::class, 'remote_check'])->name('remote_token');

	Route::put('/decrypt', [App\Http\Controllers\Admin\UserLoginController::class, 'dcrypt'])->name('user-decrypt');

	// Route::put('/update', [App\Http\Controllers\Admin\UserLoginController::class, 'update'])->name('user-update');

	Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index']);

	Route::get('/users/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);

	Route::put('/users/update/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user-update');

	Route::put('/users/approval_status/{id}', [App\Http\Controllers\Admin\UserController::class, 'approval_status'])->middleware('permission:All');

	Route::delete('/users/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user-delete')->middleware('permission:user_permission|All');

	Route::get('/permission/create', [App\Http\Controllers\Admin\PermissionController::class, 'create'])->middleware('permission:All');

	Route::post('/permission/store', [App\Http\Controllers\Admin\PermissionController::class, 'store'])->middleware('permission:All');

	Route::get('/permission/list', [App\Http\Controllers\Admin\PermissionController::class, 'index'])->middleware('permission:All');

	Route::get('/permission/edit/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'edit'])->name('permission-edit')->middleware('permission:All');

	Route::put('/permission/update/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'update'])->name('permission-update')->middleware('permission:All');

	Route::delete('/permission/delete/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'destroy'])->name('permission-delete')->middleware('permission:All');

	Route::get('/roles/create', [App\Http\Controllers\Admin\RoleController::class, 'create'])->middleware('permission:All');

	Route::post('/roles/store', [App\Http\Controllers\Admin\RoleController::class, 'store'])->middleware('permission:All');

	Route::get('/roles/list', [App\Http\Controllers\Admin\RoleController::class, 'index'])->middleware('permission:All');

	Route::get('/roles/edit/{id}', [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('role-edit')->middleware('permission:All');

	Route::put('/roles/edit/{id}', [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('role-update')->middleware('permission:All');

	Route::delete('/roles/delete/{id}', [App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('role-delete')->middleware('permission:All');

	Route::get('/project/create', [App\Http\Controllers\Admin\ProjectController::class, 'create'])->middleware('permission:user_permission|All');

	Route::post('/project/store', [App\Http\Controllers\Admin\ProjectController::class, 'store'])->middleware('permission:user_permission|All');

	Route::get('/project/list', [App\Http\Controllers\Admin\ProjectController::class, 'index'])->middleware('permission:user_permission|All');

	Route::get('/project/edit/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'edit'])->name('project-edit')->middleware('permission:user_permission|All');

	Route::put('/project/edit/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'update'])->name('project-update')->middleware('permission:user_permission|All');

	Route::delete('/project/delete/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'destroy'])->name('project-delete')->middleware('permission:user_permission|All');

	Route::put('/project/approval_status/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'approval_status'])->middleware('permission:All');

	Route::get('/project/approved', [App\Http\Controllers\Admin\ProjectController::class, 'approved_project'])->middleware('permission:user_permission|All');

	Route::get('/generate_otp', [App\Http\Controllers\Admin\OtpController::class, 'create'])->middleware('permission:All');

	Route::post('/generate_otp/store', [App\Http\Controllers\Admin\OtpController::class, 'store'])->middleware('permission:All');

	Route::get('/logout', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('logout');
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
