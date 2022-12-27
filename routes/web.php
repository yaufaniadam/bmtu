<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChangeUserCredentialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\FinancingPartnerController;
use App\Http\Controllers\PlacementController;
use App\Http\Controllers\UserController;
use App\Jobs\SendMailJob;
use App\Mail\ResetPassword;
use App\Models\Placement;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
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


        // dispatch(new SendMailJob('waskitodamar51@gmail.com', url('')));

        // $mail = new ResetPassword(url(''));
        // return $mail->render();
        Mail::to('waskitodamar51@gmail.com')->send(new ResetPassword(url('')));
        dd('authorized as admin');
    });
    // Route::get('dummy_penempatan', function () {
    //     return Placement::factory();
    // });

    Route::resource('financing', FinancingPartnerController::class);

    Route::resource('user', UserController::class);

    Route::resource('placement', PlacementController::class);

    Route::resource('user/{id}/family-member', FamilyController::class);
    Route::resource('user/{id}/education', EducationController::class);
    Route::resource('user/{id}/achievement', AchievementController::class);

    // Route::get('profile', [UserController::class, 'show']);

    // update user email route
    Route::get('user/{id}/change-email-address', [ChangeUserCredentialController::class, 'EditEmail'])->where('id', '[0-9]+')->name('edit-email');
    Route::put('user/{id}/change-email-address', [ChangeUserCredentialController::class, 'UpdateEmail'])->where('id', '[0-9]+')->name('update-email');

    // update user password route
    Route::get('user/{id}/change-password', [ChangeUserCredentialController::class, 'EditPassword'])->where('id', '[0-9]+')->name('edit-password');
    Route::put('user/{id}/change-password', [ChangeUserCredentialController::class, 'UpdatePassword'])->where('id', '[0-9]+')->name('update-password');
});
