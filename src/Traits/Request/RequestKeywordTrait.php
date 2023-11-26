<?php

namespace Stephenchen\Core\Traits\Request;

use Illuminate\Validation\Rule;
use Stephenchen\Core\Constant\Constant;

trait RequestKeywordTrait
{
    /**
     * Get request validation rules
     *
     * @return array
     */
    public function getSortRules(): array
    {
        return [
            'keyword' => [
                'nullable',
                'max:100',
            ],
        ];
    }

    /**
     * Get request validation error message
     *
     * @return array
     */
    public function getSortMessages(): array
    {
        return [
            'keyword.max' => __('core::message.validation.max', [
                'key' => '關鍵字',
                'max' => 100,
            ]),
        ];
    }
}
