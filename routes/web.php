<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChangeUserCredentialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FinancingCycleController;
use App\Http\Controllers\FinancingPartnerController;
use App\Http\Controllers\KajianController;
use App\Http\Controllers\MarketingReportController;
use App\Http\Controllers\PlacementController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\UserController;
use App\Jobs\SendMailJob;
use App\Mail\ResetPassword;
use App\Models\Placement;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'AttemptLogin'])->name('attempt-login');

Route::get('/forgot-password', [AuthController::class, 'PasswordResetForm'])->middleware('guest')->name('password.forgot');
Route::post('/forgot-password', [AuthController::class, 'SendPasswordReset'])->middleware('guest')->name('password.request');
Route::get('/reset_password', [AuthController::class, 'ResetPasswordForm'])->middleware('guest')->name('password.reset-form');
Route::put('/reset_password', [AuthController::class, 'ResetUserPassword'])->middleware('guest')->name('password.reset');

Route::middleware('custom_auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('test', function () {
        Gate::authorize('admin');
        if (Storage::disk('local')->exists('users/photo/55/dummy.jpg')) {
            $content = Storage::get('users/photo/55/dummy.jpg');
            $mime = Storage::mimeType('users/photo/55/dummy.jpg');
            $response = Response::make($content, 200);
            $response->header("Content-Type", $mime);
            return $response;
        }
    });

    Route::get('image', [FileController::class, 'displayImage'])->name('image');

    Route::get('kajian', [KajianController::class, 'index'])->name('kajian.index');

    Route::middleware('can:employee,marketing_manager,marketing_employee')->group(function () {
        Route::resource('financing-partner/{partner_id}/financing', MarketingReportController::class);
        Route::post('financing-cycle/{financing_cycle_id}/update', [FinancingCycleController::class, 'update'])->name('financing-cycle.update');
        Route::get('kajian/create', [KajianController::class, 'create'])->name('kajian.create');
        Route::post('kajian/create', [KajianController::class, 'store'])->name('kajian.store');
    });

    Route::middleware('can:admin')->group(function () {
        Route::resource('marketing-reports', MarketingReportController::class);
        Route::get('marketing-report/detail/{marketing_report_id}', [MarketingReportController::class, 'detail'])->name('marketing-report.detail');
        Route::resource('attendance', AttendanceController::class);
        // Route::resource('salary', SalaryController::class);
        Route::group(['prefix' => 'salary'], function () {
            Route::get('month/{month}', [SalaryController::class, 'index'])->name('salary.index');
            Route::get('create', [SalaryController::class, 'create'])->name('salary.create');
            Route::post('create', [SalaryController::class, 'store'])->name('salary.store');
        });
    });

    Route::resource('financing-partner', FinancingPartnerController::class);
    Route::resource('user', UserController::class);
    Route::resource('placement', PlacementController::class);
    Route::resource('user/{id}/family-member', FamilyController::class);
    Route::resource('user/{id}/education', EducationController::class);
    Route::resource('user/{id}/achievement', AchievementController::class);

    // update user email route
    Route::get('user/{id}/change-email-address', [ChangeUserCredentialController::class, 'EditEmail'])->where('id', '[0-9]+')->name('edit-email');
    Route::put('user/{id}/change-email-address', [ChangeUserCredentialController::class, 'UpdateEmail'])->where('id', '[0-9]+')->name('update-email');

    // update user password route
    Route::get('user/{id}/change-password', [ChangeUserCredentialController::class, 'EditPassword'])->where('id', '[0-9]+')->name('edit-password');
    Route::put('user/{id}/change-password', [ChangeUserCredentialController::class, 'UpdatePassword'])->where('id', '[0-9]+')->name('update-password');
});
