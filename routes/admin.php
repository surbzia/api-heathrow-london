<?php

use App\Http\Controllers\Admin\{PaymentController, BookingController, CategoryController, CustomerController, DriverController, LocationController, NewsFeedController, NewsLetterController, PermissionController, RoleController, UserController, VehicleController};
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticateAdmin;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/clear', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('route:cache');
    Artisan::call('view:clear');
    return redirect()->back();
});
Route::get('/', function () {
    return redirect()->route('dashboard');
});
Auth::routes();



Route::middleware([AuthenticateAdmin::class])->group(
    function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('permission', PermissionController::class);
        Route::resource('role', RoleController::class);
        Route::post('role/update_permissions', [RoleController::class, 'update_permissions'])->name('role.update_permissions');
        Route::post('role/update_role', [RoleController::class, 'update_role'])->name('role.update_role');
        Route::resource('user', UserController::class);
        Route::resource('category', CategoryController::class);

        Route::post('category/update_category', [CategoryController::class, 'update_category'])->name('category.update_category');
        Route::resource('location', LocationController::class);
        Route::resource('vehicle', VehicleController::class);
        Route::resource('driver', DriverController::class);
        Route::resource('customer', CustomerController::class);
        Route::resource('booking', BookingController::class);
        Route::resource('payment', PaymentController::class);
        Route::resource('newsletter', NewsLetterController::class);






        Route::get('/profile', function () {
            return view('admin.user.profile');
        })->name('user.profile');
        Route::post('user/profile/{id}', [UserController::class, 'update_profile'])->name('update_profile');
    }
);

Route::get('/logout', function () {
    Auth::guard('web')->logout();
    return redirect()->route('login');
})->name('admin.logout');
