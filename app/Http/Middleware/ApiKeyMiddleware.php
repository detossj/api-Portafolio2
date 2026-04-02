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
        // Revisa si la persona envió la llave en la petición
        $llaveEnviada = $request->header('x-api-key');

        // Revisa si la llave que envió coincide con la de tu .env
        $llaveCorrecta = env('APP_API_KEY');

        // Si no son iguales (o no envió nada), le negamos el acceso
        if ($llaveEnviada !== $llaveCorrecta) {
            return response()->json([
                'mensaje' => 'Acceso denegado. No tienes la llave para ver esto.'
            ], 401);
        }

        // Si la llave es correcta, lo dejamos pasar
        return $next($request);
    }
}
