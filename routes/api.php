<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\StatsController;
use App\Http\Controllers\PageController;

Route::prefix('v1')->name('api.v1.')->group(function () {
    Route::get('/stats', [StatsController::class, 'index'])->name('stats.index');
    Route::get('/stats/dev', [StatsController::class, 'admin'])->name('stats.admin');

    Route::get('/status', [PageController::class, 'apiStatus'])->name('status');
});

Route::get('/status', function () {
    return redirect()->route('api.v1.status');
})->name('api.status');