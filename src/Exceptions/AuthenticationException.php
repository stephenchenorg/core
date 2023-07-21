<?php

namespace Stephenchen\Core\Exceptions;

final class AuthenticationException extends BaseExceptions
{
    /**
     * @inheritDoc
     */
    public function localization(): string
    {
        return __('core::error.401');
    }

    /**
     * @inheritDoc
     */
    public function statusCode(): int
    {
        return 401;
    }

    /**
     * @inheritDoc
     */
    public function description(): string
    {
        return 'Token 無效或過期';
    }

    /**
     * @inheritDoc
     */
    public function messageCode(): int
    {
        return 401;
    }
}
