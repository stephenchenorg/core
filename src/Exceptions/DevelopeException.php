<?php

namespace Stephenchen\Core\Exceptions;

/**
 * Ref. https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/400
 */
final class DevelopeException extends BaseExceptions
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
        return '給開發階段錯誤訊息';
    }

    /**
     * @inheritDoc
     */
    public function messageCode(): int
    {
        return 400;
    }
}
