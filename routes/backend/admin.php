<?php

use App\Http\Controllers\Backend\{DashboardController, EntriesController};
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });

Route::get('entries', [EntriesController::class, 'index'])
    ->name('entries')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Entries'), route('admin.entries'));
    });
