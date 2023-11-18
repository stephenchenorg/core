<?php

namespace Stephenchen\Core\Traits\Request;

trait RequestPageTrait
{
    /**
     * Get request validation rules
     *
     * @return array
     */
    public function getPageRules(): array
    {
        return [
            'per_page' => [
                'numeric',
                'min:1',
                'max:300',
            ],
            'page'     => [
                'numeric',
                'min:1',
                // Overflow, should be less than id in database
                'max:2147483647',
            ],
        ];
    }

    /**
     * Get request validation error message
     *
     * @return array
     */
    public function getPageMessages(): array
    {
        $page    = ['key' => __('core::message.page')];
        $perPage = ['key' => __('core::message.per_page')];
        
        return [
            'page.numeric' => __('core::message.validation.numeric', $page),
            'page.min'     => __('core::message.validation.min', [
                'key' => $page,
                'key2' => '1',
            ]),
            'page.max'     => __('core::message.validation.max', [
                'key' => 'page',
                'key2' => '300',
            ]),

            'per_page.numeric' => __('core::message.validation.numeric', $perPage),
            'per_page.min'     => __('core::message.validation.min', [
                'key' => 'per_page',
                'key2' => '1',
            ]),
            'per_page.max'     => __('core::message.validation.max', [
                'key' => 'per_page',
                'key2' => '2147483647',
            ]),
        ];
    }
}
