<?php

namespace Stephenchen\Core\Traits\Cryptographic;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Stephenchen\Core\Service\Cryptographic\Signature;

trait SignatureTrait
{
    /**
     * Merge signature $attributes with given $key
     *
     * @param $attributes
     * @param string|null $key
     *
     * @return array
     */
    public function mergeSignature($attributes, ?string $key = NULL): array
    {
        return $attributes + [
                'signature' => $this->signature($attributes, $key),
            ];
    }

    /**
     * Encode given data with given key
     *
     * @param $data
     * @param string|null $key
     *
     * @return string
     */
    private function signature($data, ?string $key = NULL): string
    {
        $key = $key ?? env('APP_KEY');
        return ( new Signature($data, $key) )
            ->hash()
            ->getSignatureValue();
    }

    /**
     * Verify signature
     *
     * @param $attributes
     * @param string|null $key
     *
     * @return bool
     */
    public function verifySignature($attributes, ?string $key = NULL): bool
    {
        if (!$sign = Arr::get($attributes, 'signature')) {
            return FALSE;
        }

        $attributes = Arr::except($attributes, ['signature']);
        $values     = $this->signature($attributes, $key);

        return $values === $sign;
    }

    /**
     * @param $value
     * @return string
     */
    public static function hash($value): string
    {
        $value = is_array($value) ? implode('-', $value) : $value;
        return base64_encode(Hash::make($value));
    }

    /**
     * @param $value
     * @param $hashedValue
     * @return bool
     */
    public static function checkHashIsIdentical($value, $hashedValue): bool
    {
        $value = is_array($value) ? implode('-', $value) : $value;
        return Hash::check($value, base64_decode($hashedValue));
    }
}
