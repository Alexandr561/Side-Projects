<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        код из урока
    if (auth()->user()->role !== User::ROLE_ADMIN){
//        разные варианты:
//        return redirect()->back();
//        return redirect('/');
        abort(403, 'Доступ запрещен. Только для администраторов.');
    }
        return $next($request);
    }
}
