<?php

use App\Http\Controllers\Backend\{DashboardController, EntriesController, SchedulesController};
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

	Route::get('/{id}/show/{entry_schedule_id}', [EntriesController::class, 'show'])
	    ->name('entries.show')
	    ->breadcrumbs(function (Trail $trail) {
	        $trail->parent('admin.entries')
	            ->push('Show Entry', url('admin/entries/' . '{id}' . '/show/' . '{entry_schedule_id}'));
	    });

	Route::patch('{id}/update/{entry_schedule_id}', [EntriesController::class, 'update']);

	Route::get('/{id}/print', [EntriesController::class, 'print'])
	    ->name('entries.print')
	    ->breadcrumbs(function (Trail $trail) {
	        $trail->parent('admin.entries')
	            ->push('Print Entry', url('admin/entries/' . '{id}' . '/print'  ));
	    });
});

Route::group(['prefix' => 'schedules'], function () {
	Route::get('/', [SchedulesController::class, 'index'])
	    ->name('schedules')
	    ->breadcrumbs(function (Trail $trail) {
	        $trail->push(__('Schedules'), route('admin.schedules'));
	    });
});
