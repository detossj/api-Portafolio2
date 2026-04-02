<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::prefix('portfolio')->group(function () {
    
    Route::middleware(['api.key'])->group(function () { 
        Route::get('/all', [PortfolioController::class, 'getAllData']);
        Route::get('/download-cv', [PortfolioController::class, 'downloadCv']);
    });
   
});