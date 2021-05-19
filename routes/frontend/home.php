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

Route::get('terms', [TermsController::class, 'index'])
    ->name('pages.terms')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Terms & Conditions'), route('frontend.pages.terms'));
    });

Route::get('covid19-case-investigation-form', [CovidCIFController::class, 'index'])
    ->name('pages.covid-cif')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Covid-19 Case Investigation Form'), route('frontend.pages.covid-cif'));
    });

Route::post('covid19-case-investigation-form/store', [CovidCIFController::class, 'store']);
Route::get('/our-doctors', [PagesController::class, 'our_doctors'])
    ->name('pages.our-doctors')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Our Doctors'), route('frontend.pages.our-doctors'));
    });
