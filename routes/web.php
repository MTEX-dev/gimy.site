<?php

use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Settings\AvatarController as SettingsAvatarController;
use App\Http\Controllers\Settings\SessionController as SettingsSessionController;
use App\Http\Controllers\Settings\ProfileController as SettingsProfileController;
use App\Http\Controllers\SlugController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'lander'])->name('pages.lander');
Route::get('/legal/{section}', [PageController::class, 'legal'])->name('pages.legal');
Route::get('/error/{code}', [PageController::class, 'error'])->name('pages.error');
Route::get('locale/{locale}', [PageController::class, 'setLocale'])->name('locale.set');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])
        ->middleware('verified')
        ->name('dashboard');
    Route::get('/profile', fn () => redirect()->route('profile.edit'));
    Route::get('/settings/profile', [SettingsProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [SettingsProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [SettingsProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/settings/avatar', [SettingsAvatarController::class, 'edit'])->name('settings.avatar');
    Route::patch('/settings/avatar', [SettingsAvatarController::class, 'update'])->name('settings.avatar.update');
    Route::delete('/settings/avatar', [SettingsAvatarController::class, 'destroy'])->name('settings.avatar.destroy');
    Route::get('/settings/sessions', [SettingsSessionController::class, 'index'])->name('settings.sessions.index');
    Route::delete('/settings/sessions/{session}', [SettingsSessionController::class, 'destroy'])->name('settings.sessions.destroy');
    Route::post('/settings/sessions/logout-others', [SettingsSessionController::class, 'destroyAllOthers'])->name('settings.sessions.destroy-others');
});

Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect'])->name('auth.provider.redirect');
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback'])->name('auth.provider.callback');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
