<?php

namespace Stephenchen\Core\Service\Cryptographic;

use Stephenchen\Core\Utilities\Utility;

/**
 * Class OpenSSL
 *
 * @package App\Service\Cryptographic
 */
final class OpenSSL
{
    /**
     * @var mixed
     */
    private $iv;

    /**
     * @var mixed
     */
    private $key;

    /**
     * @var string
     */
    private string $method = 'AES-256-CBC';

    /**
     * OpenSSL constructor.
     *
     * @param string|null $iv
     * @param string|null $key
     */
    public function __construct(?string $iv = NULL, ?string $key = NULL)
    {
        $this->iv  = $iv ?? env('APP_IV');
        $this->key = $key ?? env('APP_KEY');

        if (Utility::isStringEmptyOrNull($this->iv) || Utility::isStringEmptyOrNull($this->key)) {
            throw new \InvalidArgumentException('APP_IV or APP_KEY not defined in .env file');
        }
    }

    /**
     * Generate encrypted string using open ssl
     *
     * @param $attributes
     *
     * @return string
     */
    function getEncryptString($attributes): string
    {
        $plaintext = is_array($attributes) ? implode('-', $attributes) : $attributes;
        return openssl_encrypt($plaintext, $this->method, $this->key, OPENSSL_RAW_DATA, $this->iv);
    }

    /**
     * Get encrypted string back using open ssl
     *
     * @param string $ciphertext
     *
     * @return string
     */
    function getDecryptString(string $ciphertext): string
    {
        return openssl_decrypt($ciphertext, $this->method, $this->key, OPENSSL_RAW_DATA, $this->iv);
    }
}
