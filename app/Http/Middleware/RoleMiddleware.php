<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $userRole = auth()->user()->role;

        if (!in_array($userRole, $roles, true)) {
            abort(403, 'Accès interdit.');
        }

        return $next($request);
    }
}

// 🧠 Rôle global de ce middleware

// 👉 Contrôler l’accès aux routes selon le rôle de l’utilisateur
// 👉 Rediriger vers le login si l’utilisateur n’est pas connecté
// 👉 Bloquer avec une erreur 403 si le rôle n’est pas autorisé