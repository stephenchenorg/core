<?php

namespace Stephenchen\Core\Service\Auth;

use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Stephenchen\Core\Utilities\Log;
use Stephenchen\Core\Utilities\Utility;

final class AuthenticationService
{
    /**
     * @param        $people
     * @param string $guard
     * @return array|null
     * @throws Exception
     */
    public function authenticate($people, string $guard): ?array
    {
        if (!$token = Auth::guard($guard)->login($people)) {
            return NULL;
        }

        return $this->transformJWTToken($token);
    }

    /**
     * Transform
     *
     * @param string $token
     * @return array
     * @throws Exception
     */
    private function transformJWTToken(string $token): array
    {
        $authorization      = new JwtObject($token);
        $expiredAtTimestamp = $authorization->getExpiredAt();
        $date               = Carbon::createFromTimestamp($expiredAtTimestamp)->toDateTimeString();;

        return [
            'token' => $authorization->getToken(),
            'token_type' => 'Bearer',
            'expired_at' => $date,
            'refresh_expired_at' => $authorization->getRefreshExpiredAt(),
        ];
    }

    /**
     * Attempt to authenticate a user using the given credentials.
     *
     * @param $guard
     * @param array $credentials
     * @return mixed
     * @throws Exception
     */
    public function attempt($guard, array $credentials)
    {
        if (!$result = Auth::guard($guard)->attempt($credentials)) {
            return NULL;
        }

        return $this->transformJWTToken($result);
    }

    /**
     * Set auth user while user success login by socialite ways
     *
     * @param $guard
     * @param $user
     * @return mixed
     * @throws Exception
     */
    public function loginBy($guard, $user)
    {
        $auth = Auth::guard($guard);

        if (!$result = $auth->login($user)) {
            return NULL;
        }

        return $this->transformJWTToken($result);
    }

    /**
     * Refresh
     *
     * @param string $guard
     * @return array|null
     * @throws Exception
     */
    public function refresh(string $guard): ?array
    {
        if ($token = Auth::guard($guard)->refresh(TRUE, TRUE)) {
            return $this->transformJWTToken($token);
        }

        return NULL;
    }

    /**
     * Get Auth user|admin
     *
     * @param string $guard
     * @return Authenticatable
     */
    public function getAuthUser(string $guard)
    {
        return Auth::guard($guard)->user();
    }

    /**
     * Get Auth user|admin
     *
     * @param string $guard
     * @return string|null
     */
    public function getAuthUserID(string $guard): ?string
    {
        return $this->getAuthUser($guard)->id ?? NULL;
    }

    /**
     * Logout user
     *
     * @param string $guard
     * @return bool|null
     * @throws Exception
     */
    public function logout(string $guard): bool
    {
        try {
            Auth::guard($guard)->logout();
            return TRUE;
        } catch (Exception $e) {
            Log::error('Logout fail', $e);
            Utility::maybeDD(__CLASS__, $e);
            throw $e;
        }
    }
}
