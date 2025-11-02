<?php

use App\Http\Controllers\Auth\ProviderController as AuthProviderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Settings\AvatarController as SettingsAvatarController;
use App\Http\Controllers\Settings\SessionController as SettingsSessionController;
use App\Http\Controllers\Settings\ProfileController as SettingsProfileController;
use App\Http\Controllers\Settings\PasswordController as SettingsPasswordController;
use App\Http\Controllers\SlugController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\OrganisationController as PanelOrganisationController;
use App\Http\Controllers\Panel\SiteController as PanelSiteController;
use App\Http\Controllers\Panel\SiteFileManagerController as PanelSiteFileManagerController;
use App\Http\Controllers\SitePreviewController;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('pages.lander');
})->name('home');

Route::get('/lander', [PageController::class, 'lander'])->name('pages.lander');
Route::get('/legal/{section}', [PageController::class, 'legal'])->name('pages.legal');
Route::get('/error/{code}', [PageController::class, 'error'])->name('pages.error');
Route::get('locale/{locale}', [PageController::class, 'setLocale'])->name('locale.set');
Route::post('locale/dismiss', [PageController::class, 'dismissSuggestion'])->name('locale.dismiss');
Route::get('/sitemap', [PageController::class, 'sitemap'])->name('pages.sitemap');
Route::get('/sitemap.xml', [PageController::class, 'sitemapXml'])->name('pages.sitemap.xml');
Route::get('/sitemap/raw', [PageController::class, 'sitemapXml']);
Route::get('/status', [PageController::class, 'status'])->name('pages.status');
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('pages.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])
        //->middleware('verified')
        ->name('dashboard');
    Route::get('/organisations', function () {
        $userOrganisations = Auth::user()->organisations;

        if ($userOrganisations->count() === 1) {
            return redirect()->route('panel.overview', $userOrganisations->first());
        } elseif ($userOrganisations->count() > 1) {
            return redirect()->route('dashboard')->with('error', 'You belong to multiple organisations. Please select one from the dashboard.');
        }
        return redirect()->route('pages.dashboard');
    })->name('panel.organisations.overview');    Route::get('/settings/profile', [SettingsProfileController::class, 'edit'])->name('settings.profile');
    Route::patch('/settings/profile', [SettingsProfileController::class, 'update'])->name('settings.profile.update');
    Route::delete('/settings/profile', [SettingsProfileController::class, 'destroy'])->name('settings.profile.destroy');

    Route::get('/settings/password', [SettingsPasswordController::class, 'edit'])->name('settings.password');
    Route::put('/settings/password', [SettingsPasswordController::class, 'update'])->name('settings.password.update');
    Route::get('/settings/avatar', [SettingsAvatarController::class, 'edit'])->name('settings.avatar');
    Route::patch('/settings/avatar', [SettingsAvatarController::class, 'update'])->name('settings.avatar.update');
    Route::delete('/settings/avatar', [SettingsAvatarController::class, 'destroy'])->name('settings.avatar.destroy');
    Route::get('/settings/sessions', [SettingsSessionController::class, 'index'])->name('settings.sessions.index');
    Route::delete('/settings/sessions/{session}', [SettingsSessionController::class, 'destroy'])->name('settings.sessions.destroy');
    Route::delete('/settings/sessions/logout-others', [SettingsSessionController::class, 'destroyAllOthers'])->name('settings.sessions.destroy-others');
});

Route::get('/auth/{provider}/redirect', [AuthProviderController::class, 'redirect'])->name('auth.provider.redirect');
Route::get('/auth/{provider}/callback', [AuthProviderController::class, 'callback'])->name('auth.provider.callback');

/*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/
require __DIR__ . '/auth.php';

Route::middleware('auth')->name('panel.')->group(function () {
    Route::post('/org/store', [PanelOrganisationController::class, 'store'])->name('organisations.store');
    Route::redirect('/org/create', '/org/new');
    Route::get('/org/new', [PanelOrganisationController::class, 'create'])->name('organisations.create');

    Route::prefix('/org/{organisation:slug}')->group(function () {
        Route::get('/', [PanelOrganisationController::class, 'overview'])->name('overview');

        Route::get('/settings', [PanelOrganisationController::class, 'settings'])->name('organisations.settings');
        Route::put('/settings', [PanelOrganisationController::class, 'update'])->name('organisations.update');
        Route::delete('/', [PanelOrganisationController::class, 'destroy'])->name('organisations.destroy');

        Route::get('/members', [PanelOrganisationController::class, 'members'])->name('organisations.members');
        Route::post('/members', [PanelOrganisationController::class, 'addMember'])->name('organisations.members.add');
        Route::put('/members/{user}', [PanelOrganisationController::class, 'updateMemberRole'])->name('organisations.members.updateRole');
        Route::delete('/members/{user}', [PanelOrganisationController::class, 'removeMember'])->name('organisations.members.remove');

        Route::get('/sites/new', [PanelSiteController::class, 'create'])->name('organisations.sites.create');
        Route::post('/sites', [PanelSiteController::class, 'store'])->name('organisations.sites.store');

        Route::get('/sites', [PanelOrganisationController::class, 'sites'])->name('organisations.sites');

        Route::prefix('/sites/{site:slug}')->name('sites.')->group(function () {
            Route::get('/', [PanelSiteController::class, 'overview'])->name('overview');
            Route::get('/files', [PanelSiteController::class, 'files'])->name('files');
            Route::post('/files/upload', [PanelSiteFileManagerController::class, 'uploadFile'])->name('files.upload');
            Route::post('/files/create-folder', [PanelSiteFileManagerController::class, 'createFolder'])->name('files.create-folder');
            Route::post('/files/rename', [PanelSiteFileManagerController::class, 'rename'])->name('files.rename');
            Route::post('/files/move', [PanelSiteFileManagerController::class, 'move'])->name('files.move');
            Route::delete('/files/delete', [PanelSiteFileManagerController::class, 'delete'])->name('files.delete');
            Route::get('/files/edit', [PanelSiteFileManagerController::class, 'editFile'])->name('files.edit');
            Route::put('/files/update', [PanelSiteFileManagerController::class, 'updateFile'])->name('files.update');
            Route::get('/backups', [PanelSiteController::class, 'backups'])->name('backups');
            Route::get('/visits', [PanelSiteController::class, 'visits'])->name('visits');
            Route::get('/settings', [PanelSiteController::class, 'settings'])->name('settings');
            Route::put('/settings', [PanelSiteController::class, 'update'])->name('update');
            Route::delete('/', [PanelSiteController::class, 'destroy'])->name('destroy');
        });
    });
});
Route::get('/site-preview/{site:slug}', [PanelSiteController::class, 'sitePreview'])->name('site.preview');
Route::get('/preview-site/{site}/{path}', [SitePreviewController::class, 'show'])->where('path', '.*')->name('site.file.preview');