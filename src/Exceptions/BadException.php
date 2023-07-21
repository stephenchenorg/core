<?php

namespace Stephenchen\Core\Exceptions;

/**
 * Ref. https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/400
 */
final class BadException extends BaseExceptions
{
    /**
     * @inheritDoc
     */
    public function localization(): string
    {
        return __('error.400');
    }

    /**
     * @inheritDoc
     */
    public function statusCode(): int
    {
        return 400;
    }

    /**
     * @inheritDoc
     */
    public function description(): string
    {
        return 'Bad request';
    }

    /**
     * @inheritDoc
     */
    public function messageCode(): int
    {
        return 400;
    }
}
