<?php

namespace Stephenchen\Core\Exceptions;

/**
 * Ref. https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/404
 */
final class NotFoundException extends BaseExceptions
{
    /**
     * @inheritDoc
     */
    public function localization(): string
    {
        return __('error.404');
    }

    /**
     * @inheritDoc
     */
    public function statusCode(): int
    {
        return 404;
    }

    /**
     * @inheritDoc
     */
    public function description(): string
    {
        return '找不到資源';
    }

    /**
     * @inheritDoc
     */
    public function messageCode(): int
    {
        return 404;
    }
}
