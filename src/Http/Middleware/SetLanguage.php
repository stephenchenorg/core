<?php

namespace Stephenchen\Core\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

final class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $language = $request->header('Content-Language');

        app()->setLocale($language);

        return $next($request);
    }
}
