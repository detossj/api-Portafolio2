<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::prefix('portfolio')->group(function () {
    // En este grupo de rutas, aplicamos el middleware 'api.key' para validar la clave de API
    // y el middleware 'throttle:portfolio_api' para limitar las peticiones a 60 por minuto por
    // IP que se definió en AppServiceProvider.
    Route::middleware(['api.key', 'throttle:portfolio_api'])->group(function () { 
        Route::get('/all', [PortfolioController::class, 'getAllData']);
        Route::get('/download-cv', [PortfolioController::class, 'downloadCv']);
    });
   
});