<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::prefix('portfolio')->group(function () {
    Route::get('/nav', [PortfolioController::class, 'getNav']);
    Route::get('/hero', [PortfolioController::class, 'getHero']);
    Route::get('/about', [PortfolioController::class, 'getAbout']);
    Route::get('/skills', [PortfolioController::class, 'getSkills']);
    Route::get('/education', [PortfolioController::class, 'getEducation']);
    Route::get('/experience', [PortfolioController::class, 'getExperience']);
    Route::get('/projects', [PortfolioController::class, 'getProjects']);
    Route::get('/contact', [PortfolioController::class, 'getContact']);
    Route::get('/footer', [PortfolioController::class, 'getFooter']);
});