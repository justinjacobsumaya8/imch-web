<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TermsController;
use App\Http\Controllers\Frontend\CovidCIFController;
use App\Http\Controllers\Frontend\PagesController;
use Tabuna\Breadcrumbs\Trail;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });

Route::get('covid19-case-investigation-form', [CovidCIFController::class, 'index'])->name('pages.covid-cif');
Route::get('covid19-case-investigation-form/schedules', [CovidCIFController::class, 'schedules']);
Route::post('covid19-case-investigation-form/store', [CovidCIFController::class, 'store']);

Route::get('/about', [PagesController::class, 'about'])->name('pages.about');
Route::get('/blogs', [PagesController::class, 'blogs'])->name('pages.blogs');

Route::get('/our-doctors', [PagesController::class, 'our_doctors'])->name('pages.our-doctors');

Route::get('/our-services', [PagesController::class, 'our_services'])
    ->name('pages.our-services')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Our Services'), route('frontend.pages.our-services'));
});
