<?php

namespace Stephenchen\Core\Rules;

use Illuminate\Support\Str;
use InvalidArgumentException;
use Stephenchen\Core\Exceptions\FrontendException;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * 透過 function chain 可自由來組成判斷邏輯
 */
final class RulesAlphaDash implements Rule
{
    /**
     * Determine if the plus sign validation rule passes.
     *
     * @var boolean
     */
    private bool $validatePlusSign = TRUE;

    /**
     * Determine if the dot sign validation rule passes.
     *
     * @var boolean
     */
    private bool $validateDotSign = TRUE;

    /**
     * Determine if the alpha should at position beginning.
     *
     * @var bool
     */
    private bool $validateAlphaAtBeginning = TRUE;

    /**
     * Determine if the underline validation rule passes.
     *
     * @var bool
     */
    private bool $validateUnderline = TRUE;

    /**
     * Determine if the dash validation rule passes.
     *
     * @var bool
     */
    private bool $validateDash = TRUE;

    /**
     * Determine if the at-sign ( @ ) validation rule passes.
     *
     * @var bool
     */
    private bool $validateAtSign = TRUE;

    /**
     * min string length
     *
     * @var string
     */
    private ?string $min = NULL;

    /**
     * max string length
     *
     * @var string
     */
    private ?string $max = NULL;

    /**
     * Error message prefix
     *
     * @var string
     */
    private ?string $errorMessagePrefix = NULL;

    /**
     * @var bool
     */
    private bool $isThrowable = FALSE;

    /**
     * Validate construct
     *
     * @param bool $isThrowable
     */
    public function __construct(bool $isThrowable = FALSE)
    {
        $this->setIsThrowable($isThrowable);
    }

    /**
     * @return bool
     */
    public function isThrowable(): bool
    {
        return $this->isThrowable;
    }

    /**
     * @param bool $isThrowable
     */
    public function setIsThrowable(bool $isThrowable): void
    {
        $this->isThrowable = $isThrowable;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $rules = [
            '!', '"', '#', '$',
            '%', '&', '\'', '(',
            ')', '{', '}', '[',
            ']', '*', '`', '~',
            '/', '\\', ';', ':',
            '<', '>', '?', '=',
            '|', '^',
        ];

        if ($this->isValidatePlusSign()) {
            array_push($rules, ' + ');
        }

        if ($this->isValidateDash()) {
            array_push($rules, ' - ');
        }

        if ($this->isValidateAtSign()) {
            array_push($rules, '@');
        }

        if ($this->isValidateUnderline()) {
            array_push($rules, '_');
        }

        if ($this->isValidateDotSign()) {
            array_push($rules, '.');
        }

        $isContains = Str::contains($value, $rules);
        if ($isContains) {
            return FALSE;
        }

        // If given value is not alpha start, then return FALSE
        if ($this->isValidateAlphaAtBeginning()) {
            $first              = substr($value, 0, 1);
            $isAlphaAtBeginning = ctype_alpha($first);
            if (!$isAlphaAtBeginning) {
                return FALSE;
            }
        }

        $min = $this->getMin();
        $max = $this->getMax();
        // If given value not in the range min & max
        if ($min && $max) {
            $length = Str::length($value);
            if ($length < $min || $length > $max) {
                return FALSE;
            }
        }

        return TRUE;
    }

    /**
     * @param int $min
     * @param int $max
     *
     * @return RulesAlphaDash
     * @throws InvalidArgumentException
     */
    public function setValidateLengthBetween(int $min, int $max): self
    {
        if ($min <= 0) {
            throw new InvalidArgumentException('min 必須大於等於 1');
        }

        $this->setMin($min);
        $this->setMax($max);

        return $this;
    }

    /**
     * @return bool
     */
    public function isValidatePlusSign(): bool
    {
        return $this->validatePlusSign;
    }

    /**
     * @param bool $validatePlusSign
     *
     * @return RulesAlphaDash
     */
    public function setValidatePlusSign(bool $validatePlusSign): self
    {
        $this->validatePlusSign = $validatePlusSign;
        return $this;
    }

    /**
     * @return bool
     */
    public function isValidateDash(): bool
    {
        return $this->validateDash;
    }

    /**
     * @param bool $validateDash
     *
     * @return RulesAlphaDash
     */
    public function setValidateDash(bool $validateDash): self
    {
        $this->validateDash = $validateDash;
        return $this;
    }

    /**
     * @return bool
     */
    public function isValidateAtSign(): bool
    {
        return $this->validateAtSign;
    }

    /**
     * @param bool $validateAtSign
     *
     * @return RulesAlphaDash
     */
    public function setValidateAtSign(bool $validateAtSign): self
    {
        $this->validateAtSign = $validateAtSign;
        return $this;
    }

    /**
     * @return bool
     */
    public function isValidateUnderline(): bool
    {
        return $this->validateUnderline;
    }

    /**
     * @param bool $validateUnderline
     *
     * @return RulesAlphaDash
     */
    public function setValidateUnderline(bool $validateUnderline): self
    {
        $this->validateUnderline = $validateUnderline;
        return $this;
    }

    /**
     * @return bool
     */
    public function isValidateDotSign(): bool
    {
        return $this->validateDotSign;
    }

    /**
     * @param bool $validateDotSign
     *
     * @return RulesAlphaDash
     */
    public function setValidateDotSign(bool $validateDotSign): self
    {
        $this->validateDotSign = $validateDotSign;
        return $this;
    }

    /**
     * @return bool
     */
    public function isValidateAlphaAtBeginning(): bool
    {
        return $this->validateAlphaAtBeginning;
    }

    /**
     * @param bool $validateAlphaAtBeginning
     *
     * @return RulesAlphaDash
     */
    public function setValidateAlphaAtBeginning(bool $validateAlphaAtBeginning): self
    {
        $this->validateAlphaAtBeginning = $validateAlphaAtBeginning;
        return $this;
    }

    /**
     * @return string
     */
    public function getMin(): ?string
    {
        return $this->min;
    }

    /**
     * @param string $min
     */
    public function setMin(string $min): void
    {
        $this->min = $min;
    }

    /**
     * @return string
     */
    public function getMax(): ?string
    {
        return $this->max;
    }

    /**
     * @param string $max
     */
    public function setMax(string $max): void
    {
        $this->max = $max;
    }

    /**
     * @return string
     */
    public function getErrorMessagePrefix(): ?string
    {
        return $this->errorMessagePrefix;
    }

    /**
     * @param string $errorMessagePrefix
     *
     * @return RulesAlphaDash
     */
    public function setErrorMessagePrefix(string $errorMessagePrefix): self
    {
        $this->errorMessagePrefix = $errorMessagePrefix;
        return $this;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     * @throws HttpResponseException
     * @throws FrontendException
     */
    public function message()
    {
        $message = trans('core::message.only_allow');

        // sign ( - ) 中線
        if (!$this->isValidateDash()) {
            $string  = trans('core::message.dash');
            $message = "{$message} {$string}";
        }

        // sign ( _ ) 下底線
        if (!$this->isValidateUnderline()) {
            $string  = trans('core::message.underline');
            $message = "{$message} {$string}";
        }

        // sign ( @ )
        if (!$this->isValidateAtSign()) {
            $string  = trans('core::message.sign_at');
            $message = "{$message} {$string}";
        }

        // sign ( + )
        if (!$this->isValidatePlusSign()) {
            $string  = trans('core::message.sign_plus');
            $message = "{$message} {$string}";
        }

        // sign ( . )
        if ($this->isValidateDotSign()) {
            $string  = trans('core::message.sign_dot');
            $message = "{$message} {$string}";
        }

        if ($this->isValidateAlphaAtBeginning()) {
            $string  = trans('core::message.alpha_at_beginnind');
            $message = "{$message} {$string}";
        }

        if ($this->getMax() && $this->getMin()) {
            $min     = $this->getMin();
            $max     = $this->getMax();
            $data    = [
                'key1' => $min,
                'key2' => $max,
            ];
            $string  = trans('core::message.validation.length', $data);
            $message = "{$message} {$string}";
        }

        $message = "{$this->errorMessagePrefix} {$message}";

        if ($this->isThrowable()) {
            throw new FrontendException(4465, '您的密碼不符合以下條件限制');
        }

        return $message;
    }
}
