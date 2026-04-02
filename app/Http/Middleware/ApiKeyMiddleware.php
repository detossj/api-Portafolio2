<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $llaveEnviada = $request->header('x-api-key');
        $llaveCorrecta = env('APP_API_KEY');

        if (empty($llaveCorrecta)) {
            return response()->json([
                'mensaje' => 'Error del servidor: La API no está bien configurada.'
            ], 500);
        }

        // Si la llave que envió el usuario está vacía o es incorrecta, lo bloqueamos.
        if (!$llaveEnviada || $llaveEnviada !== $llaveCorrecta) {
            return response()->json([
                'mensaje' => 'Acceso denegado. No tienes la llave para ver esto.'
            ], 401);
        }

        return $next($request);
    }
}
