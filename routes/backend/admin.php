<?php

use App\Http\Controllers\Backend\{DashboardController, EntriesController};
use Tabuna\Breadcrumbs\Trail;

use App\Models\Entry;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });

Route::group(['prefix' => 'entries'], function () {
	Route::get('get', [EntriesController::class, 'getEntries']);

	Route::get('/', [EntriesController::class, 'index'])
	    ->name('entries')
	    ->breadcrumbs(function (Trail $trail) {
	        $trail->push(__('Entries'), route('admin.entries'));
	    });

	Route::get('/{id}/edit', [EntriesController::class, 'edit'])
	    ->name('entries.edit')
	    ->breadcrumbs(function (Trail $trail) {
	        $trail->parent('admin.entries')
	            ->push('Edit Entry', url('admin/entries/' . '{id}' . '/edit'  ));
	    });
});
