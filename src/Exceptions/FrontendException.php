<?php

namespace Stephenchen\Core\Exceptions;

use Throwable;

/**
 * Ref. https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/400
 */
final class FrontendException extends BaseExceptions
{
    /**
     * @var string
     */
    private string $messageCode;

    /**
     * @var string
     */
    private string $statusCode;

    /**
     * FrontendException constructor.
     *
     * @param string $message
     * @param string $messageCode
     * @param string $statusCode
     * @param Throwable|null $previous
     */
    public function __construct(string $message, string $messageCode, string $statusCode = '400', Throwable $previous = NULL)
    {
        $this->messageCode = $messageCode;
        $this->statusCode  = $statusCode;
        parent::__construct($message, $messageCode, $previous);
    }

    /**
     * @inheritDoc
     */
    public function messageCode(): int
    {
        return $this->messageCode;
    }

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
        return $this->statusCode;
    }

    /**
     * @inheritDoc
     */
    public function description(): string
    {
        return '給前端開發者';
    }
}


