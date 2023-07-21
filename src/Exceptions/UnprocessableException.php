<?php

namespace Stephenchen\Core\Exceptions;

/**
 * Ref. https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/422
 */
final class UnprocessableException extends BaseExceptions
{
    /**
     * @inheritDoc
     */
    public function localization(): string
    {
        return __('error.422');
    }

    /**
     * @inheritDoc
     */
    public function statusCode(): int
    {
        return 422;
    }

    /**
     * @inheritDoc
     */
    public function description(): string
    {
        return '無法解析';
    }

    /**
     * @inheritDoc
     */
    public function messageCode(): int
    {
        return 422;
    }
}
