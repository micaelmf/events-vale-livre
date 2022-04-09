<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\SpaceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/addresses', [AddressController::class, 'index'])->name('addresses');
        Route::get('/spaces', [SpaceController::class, 'index'])->name('spaces');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin/address')->group(function () {
        Route::name('address.')->group(function () {
            Route::get('/create', [AddressController::class, 'create'])->name('create');
            Route::post('/store', [AddressController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AddressController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [AddressController::class, 'update'])->name('update');
            Route::get('/destroy/{id}', [AddressController::class, 'destroy'])->name('destroy');
        });
    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin/space')->group(function () {
        Route::name('space.')->group(function () {
            Route::get('/create', [SpaceController::class, 'create'])->name('create');
            Route::post('/store', [SpaceController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [SpaceController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [SpaceController::class, 'update'])->name('update');
            Route::get('/destroy/{id}', [SpaceController::class, 'destroy'])->name('destroy');
        });
    });
});

Route::post('/confirm-password', function (Request $request) {
    if (!Hash::check($request->password, $request->user()->password)) {
        return back()->withErrors([
            'password' => ['The provided password does not match our records.']
        ]);
    }

    $request->session()->passwordConfirmed();

    return redirect()->intended();
})->middleware(['auth', 'throttle:6,1']);

require __DIR__ . '/auth.php';
