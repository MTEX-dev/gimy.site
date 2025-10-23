<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuggestLocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            ! $request->session()->has('locale') &&
            ! $request->session()->has('locale_suggestion_dismissed') &&
            $request->header('Accept-Language')
        ) {
            $browserLocale = substr($request->header('Accept-Language'), 0, 2);
            $supportedLocales = config('app.locales', []);

            if (array_key_exists($browserLocale, $supportedLocales) && app()->getLocale() !== $browserLocale) {
                $request->session()->flash('suggested_locale', $browserLocale);
            }
        }

        return $next($request);
    }
}