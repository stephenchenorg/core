<?php

namespace Stephenchen\Core\Exceptions;

/**
 * Ref. https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/400
 */
final class DefaultException extends BaseExceptions
{
    /**
     * @inheritDoc
     */
    public function localization(): string
    {
        return __('error.500');
    }

    /**
     * @inheritDoc
     */
    public function statusCode(): int
    {
        return 500;
    }

    /**
     * @inheritDoc
     */
    public function description(): string
    {
        return '默認的錯誤訊息';
    }

    /**
     * @inheritDoc
     */
    public function messageCode(): int
    {
        return 500;
    }
}
