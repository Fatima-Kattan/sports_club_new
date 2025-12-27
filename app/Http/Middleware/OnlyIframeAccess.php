<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlyIframeAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // dd([
        //     'session' => session('iframe_access'),
        //     'route' => $request->path(),
        // ]);
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        // إذا ما دخل من الداشبورد (ما في session)
        if (session('iframe_access') !== true || !str_contains($request->headers->get('referer'), '/dashboard')) {
            abort(403, 'Access denied');
        }
    
    
        return $next($request);
    
    }




}
