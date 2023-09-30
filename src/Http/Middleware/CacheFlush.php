<?php

namespace Stephenchen\Core\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Stephenchen\Core\Service\Cache\CacheService;

final class CacheFlush
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param null $tags
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $tags = NULL): mixed
    {
        // Flush cache is method is not cacheable
        if (!$request->isMethodCacheable()) {
            CacheService::flush($tags);
        }

        return $next($request);
    }
}
