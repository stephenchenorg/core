<?php

namespace Stephenchen\Core\Service;

use Illuminate\Contracts\Support\Arrayable;

final class ErrorMessageObject implements Arrayable
{
    /**
     * @var string
     */
    private string $code;

    /**
     * @var string
     */
    private string $description;

    /**
     * Signature constructor.
     *
     * @param string $code
     * @param string $description
     */
    public function __construct(string $code, string $description)
    {
        $this->code        = $code;
        $this->description = $description;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'code'    => $this->code,
            'message' => $this->description,
        ];
    }

    /**
     * @return string
     */
    public function getLocalMessage(): string
    {
        $code = $this->code;
        return trans("core::error.$code");
    }

    public function __toString()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
