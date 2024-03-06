<?php

namespace Stephenchen\Core\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Stephenchen\Core\Traits\ResponseJsonTrait;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class AuthenticateJwtVerify extends BaseMiddleware
{
    use ResponseJsonTrait;

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->checkOrFail();
        } catch (Exception $exception) {
            if ($exception instanceof TokenInvalidException) {
                return $this->jsonFail(__('core::message.unauthorized'), 401, 401);
            }
            if ($exception instanceof TokenExpiredException) {
                return $this->jsonFail(__('core::message.unauthorized'), 401, 401);
            }
            return $this->jsonFail($exception->getMessage(), 401, 401);
        }
        return $next($request);
    }
}
