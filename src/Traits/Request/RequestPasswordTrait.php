<?php

namespace Stephenchen\Core\Traits\Request;

use InvalidArgumentException;
use Stephenchen\Core\Rules\RulesAlphaDash;

trait RequestPasswordTrait
{
    /**
     * 如果有需要驗證 `密碼` 的話就用 array_merge
     *
     * @param bool $isRequired
     * @param bool $isThrowable 有可能使用者是前端使用者
     * @return array
     */
    private function getPasswordRules(bool $isRequired, bool $isThrowable = FALSE): array
    {
        return [
            'password' => [
                // In creation process which is method Post.
                // User may not update password if they don't want
                $isRequired ? 'required' : 'nullable',
                ( new RulesAlphaDash($isThrowable) )
                    ->setErrorMessagePrefix('密碼')
                    ->setValidateLengthBetween(6, 12)
                    ->setValidateUnderline(FALSE)
                    ->setValidateDash(FALSE),
            ],
        ];
    }

    /**
     * 如果有需要驗證 `密碼` 的話就用 array_merge, 專門給前端會員使用的，比入登入，註冊，重置密碼....等
     *
     * @return array
     */
    private function getPasswordRulesForFrontend(): array
    {
        return [
            'password' => [
                'required',
                ( new RulesAlphaDash(TRUE) )
                    ->setErrorMessagePrefix(__('core::message.password'))
                    ->setValidateLengthBetween(6, 12)
                    ->setValidateAlphaAtBeginning(FALSE)
                    ->setValidateUnderline(FALSE)
                    ->setValidateDash(FALSE)
                    ->setValidateAtSign(FALSE)
                    ->setValidateDotSign(FALSE)
                    ->setValidatePlusSign(FALSE),
            ],
        ];
    }

    /**
     * 如果有需要驗證 `確認密碼` 的話就用 array_merge
     *
     * @return array
     */
    private function getPasswordConfirmationRules(): array
    {
        return [
            'password_confirmation' => [
                'required_with_all:password',
                'same:password',
            ],
        ];
    }

    /**
     * 統一 `密碼` 驗證格式的錯誤訊息
     *
     * @return array
     */
    private function getPasswordValidationFailMessage(): array
    {
        return [
            'password.required' => '未輸入密碼欄位',
        ];
    }

    /**
     * 統一 `確認密碼` 驗證格式的錯誤訊息
     *
     * @return array
     * @throws InvalidArgumentException
     */
    private function getPasswordConfirmationValidationFailMessage(): array
    {
        return [
            'password_confirmation.same'              => '密碼與確認密碼欄位輸入不一致',
            'password_confirmation.required_with_all' => '未輸入確認密碼欄位',
        ];

//        return [
//            'password_confirmation.same'              => new ErrorMessageObject('4370', '密碼與確認密碼欄位輸入不一致'),
//            'password_confirmation.required_with_all' => new ErrorMessageObject('4330', '未輸入確認密碼欄位'),
//        ];
    }
}
