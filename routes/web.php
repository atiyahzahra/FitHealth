<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\dashboard\Analytics,
    App\Http\Controllers\BmiController,
    App\Http\Controllers\LoginController,
    App\Http\Controllers\AuthController,
    App\Http\Controllers\UserController,
    App\Http\Controllers\layouts\Obat,
    App\Http\Controllers\layouts\Foodtrack,
    App\Http\Controllers\WaterIntakeController;
use App\Http\Controllers\layouts\WithoutNavbar;

// Main Page Route
Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics');

// sesi
Route::get('/sesi', [LoginController::class, 'index']);
Route::any('/sesi/login', [LoginController::class, 'login']);
Route::get('/sesi', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/sesi', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/register', [UserController::class, 'store'])->name('register');
Route::get('/sesi', [UserController::class, 'index'])->name('sesi.login');

// Body Mass Index
Route::get('/layouts/without-menu', [BmiController::class, 'index'])->name('layouts-without-menu');
Route::post('/bmi/calculate', [BmiController::class, 'calculate'])->name('bmi.calculate');
Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
Route::get('/content/bmi/result', function () {
return view('content.bmi.result');
})->name('content.bmi.result');


// Medication reminder
Route::resource('content/obat', Obat::class, ['as' => 'content']);

// Rute untuk WaterIntake Feature
Route::get('/water-intake-target', [WaterIntakeController::class, 'show'])->name('water_intake_target.show');
Route::post('/water-intake-target', [WaterIntakeController::class, 'store'])->name('water_intake_target.store');
Route::post('/water-intake-consumed', [WaterIntakeController::class, 'updateConsumed'])->name('water_intake_target.updateConsumed');
Route::post('/water-intake-reset', [WaterIntakeController::class, 'resetConsumed'])->name('water_intake_target.resetConsumed');

// Food Track
Route::resource('content/foodtrack', FoodTrack::class, ['as' => 'content']);



use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\tables\Basic as TablesBasic;

// layout
/*Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');

// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');

// form elements
Route::get('/forms/basic-inputs', [BasicInput::class, 'index'])->name('forms-basic-inputs');
Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', [VerticalForm::class, 'index'])->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');*/
