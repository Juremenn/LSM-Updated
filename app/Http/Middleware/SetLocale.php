<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedLocales = ['en', 'id'];
        $defaultLocale = config('app.locale', 'en');

        $locale = $request->session()->get('locale', $defaultLocale);

        if (!in_array($locale, $allowedLocales, true)) {
            $locale = $defaultLocale;
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
