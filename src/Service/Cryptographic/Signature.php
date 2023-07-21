<?php

namespace Stephenchen\Core\Service\Cryptographic;

use Stephenchen\Core\Utilities\Utility;

final class Signature
{
    /**
     * @var string
     */
    private string $signatureValue;

    /**
     * @var mixed
     */
    private $attributes;

    /**
     * @var string
     */
    private string $privateKey;

    /**
     * Signature constructor.
     *
     * @param        $attributes
     * @param string $privateKey
     */
    public function __construct($attributes, string $privateKey)
    {
        $this->attributes = $attributes;
        $this->privateKey = $privateKey;
    }

    /**
     * Convert null to empty string
     */
    private function walkArrayRecursiveToEmptyString()
    {
        array_walk_recursive($this->attributes, function (&$item) {
            $item = $item ?? '';
        });
    }

    /**
     * Hash given attributes with given key
     *
     * @return Signature
     */
    public function hash(): self
    {
        $data = $this->attributes;

        if (Utility::isArrayOrObject($this->attributes)) {
            $this->walkArrayRecursiveToEmptyString();
            ksort($data);
            $data = Utility::jsonEncode($data,
                JSON_UNESCAPED_UNICODE |
                JSON_UNESCAPED_SLASHES |
                JSON_NUMERIC_CHECK);
        }

        $hmac = hash_hmac('sha512', $data, $this->privateKey);
        $this->setSignatureValue($hmac);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSignatureValue()
    {
        return $this->signatureValue;
    }

    /**
     * @param mixed $signatureValue
     */
    public function setSignatureValue($signatureValue): void
    {
        $this->signatureValue = $signatureValue;
    }
}
