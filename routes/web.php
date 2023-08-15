<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\EventsController;

use App\Http\Controllers\RoutesController;
use App\Http\Middleware\Authenticate;


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


Route::get("/", [RoutesController::class, "index"])->name('welcome');
Route::post("/view-events{id}", [RoutesController::class, "show"])->name('show.events');






Route::group(['middleware' => 'auth'], function() {

    Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"]);

/*------------------------------------------
--------------------------------------------
All SuperAdmin Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['middleware' => 'checkRole:superadmin'], function() {

});


/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
    Route::group(['middleware' => 'checkRole:admin'], function() {
        Route::get("/adminhome", [EventsController::class, "index"])->name('admin.home');
        Route::post("/admin/store-events", [EventsController::class, "store"])->name('admin.events.store');
        Route::get("/admin/add-events", [EventsController::class, "create"])->name('admin.add-events');
        Route::get("/admin/delete-events/{id}", [EventsController::class, "destroy"])->name('admin.delete-events');
 
    
    });


/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/

    Route::group(['middleware' => 'checkRole:user'], function() {


    

    });


});

require __DIR__.'/auth.php';
