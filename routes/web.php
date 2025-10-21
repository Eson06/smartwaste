<?php

use App\Models\User;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\UserManagement;
use App\Http\Controllers\AuthController;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Admin\Driver;
use App\Livewire\Admin\Report as AdminReport;
use App\Livewire\Admin\Schedule;
use App\Livewire\Admin\Setting as AdminSetting;
use App\Livewire\Driver\Collection;
use App\Livewire\Driver\Dashboard as DriverDashboard;
use App\Livewire\Driver\Report as DriverReport;
use App\Livewire\Driver\Schedule as DriverSchedule;
use App\Livewire\Driver\Setting as DriverSetting;
use App\Livewire\Resident\Calendar;
use App\Livewire\Resident\Guideline;
use App\Livewire\Resident\Home;
use App\Livewire\Resident\Message;
use App\Livewire\Resident\Report;
use App\Livewire\Resident\Setting;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware('guest:web')->group(function(){

    // Route::get('/', function () {
    //     return view('back.pages.auth.login');
    // });

    Route::get('/', function () {
        return view('back.pages.auth.login');
    })->name('login');

    Route::get('/resident', function () {
        return view('livewire.register.resident');
    })->name('resident');

    Route::post('/custom-login', [AuthController::class,'customLogin'])->name('custom.login');

    Route::post('/register-resident', [AuthController::class, 'store'])->name('resident.store');
});



Route::middleware(['auth:web'],['revalidate'])->group(function() {


    #admin access only
    Route::prefix('admin-panel')->name('admin.')->group(function(){
        Route::get('/user-management', UserManagement::class)->name('user-management');
        Route::get('/dashboard', AdminDashboard::class)->name('dashboard');
        Route::get('/schedule', Schedule::class)->name('schedule');
        Route::get('/report', AdminReport::class)->name('report');
        Route::get('/setting', AdminSetting::class)->name('setting');
        Route::get('/driver', Driver::class)->name('driver');
    });

    #resident access only
    Route::prefix('resident')->name('resident.')->group(function(){
        Route::get('/home', Home::class)->name('home');
        Route::get('/calendar', Calendar::class)->name('calendar');
        Route::get('/message', Message::class)->name('message');
        Route::get('/guideline', Guideline::class)->name('guideline');
        Route::get('/setting', Setting::class)->name('setting');
        Route::get('/report', Report::class)->name('report');
    });

        #driver access only
        Route::prefix('driver')->name('driver.')->group(function(){
            Route::get('/dashboard', DriverDashboard::class)->name('dashboard');
            Route::get('/schedule', DriverSchedule::class)->name('schedule');
            Route::get('/report', DriverReport::class)->name('report');
            Route::get('/setting', DriverSetting::class)->name('setting');
            Route::get('/collection', Collection::class)->name('collection');
        });


 Route::get('/dashboard', Dashboard::class)->name('dashboard');
});