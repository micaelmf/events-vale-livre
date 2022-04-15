<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventDetailController;
use App\Http\Controllers\SpeakerController;
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

Route::get('/evento/{slug}', [EventController::class, 'show']);

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/addresses', [AddressController::class, 'index'])->name('addresses');
        Route::get('/spaces', [SpaceController::class, 'index'])->name('spaces');
        Route::get('/events', [EventController::class, 'index'])->name('events');
        Route::get('/speakers', [SpeakerController::class, 'index'])->name('speakers');
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

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin/event')->group(function () {
        Route::name('event.')->group(function () {
            Route::get('/show', [EventController::class, 'show'])->name('show');
            Route::get('/create', [EventController::class, 'create'])->name('create');
            Route::post('/store', [EventController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [EventController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [EventController::class, 'update'])->name('update');
            Route::get('/destroy/{id}', [EventController::class, 'destroy'])->name('destroy');
        });
    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin/event-detail')->group(function () {
        Route::name('event.detail.')->group(function () {
            Route::get('/show', [EventDetailController::class, 'show'])->name('show');
            Route::get('/create', [EventDetailController::class, 'create'])->name('create');
            Route::post('/store', [EventDetailController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [EventDetailController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [EventDetailController::class, 'update'])->name('update');
            Route::get('/destroy/{id}', [EventDetailController::class, 'destroy'])->name('destroy');
        });
    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin/speaker')->group(function () {
        Route::name('speaker.')->group(function () {
            Route::get('/show', [SpeakerController::class, 'show'])->name('show');
            Route::get('/create', [SpeakerController::class, 'create'])->name('create');
            Route::post('/store', [SpeakerController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [SpeakerController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [SpeakerController::class, 'update'])->name('update');
            Route::get('/destroy/{id}', [SpeakerController::class, 'destroy'])->name('destroy');
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
