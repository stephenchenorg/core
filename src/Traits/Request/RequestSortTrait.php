<?php

namespace Stephenchen\Core\Traits\Request;

use Illuminate\Validation\Rule;
use Stephenchen\Core\Constant\Constant;

trait RequestSortTrait
{
    /**
     * @var array
     */
    protected array $targets = [
        Constant::DATABASE_ID,
        Constant::DATABASE_SORT,
        Constant::DATABASE_CREATED_AT,
        Constant::DATABASE_UPDATED_AT,
        Constant::COUNT,
    ];

    /**
     * @var array
     */
    protected array $methods = [
        Constant::DATABASE_DESC,
        Constant::DATABASE_ASC,
    ];

    /**
     * Get request validation rules
     *
     * @return array
     */
    public function getSortRules(): array
    {
        return [
            'sort_target' => [
                Rule::in($this->targets),
            ],
            'sort_method' => [
                Rule::in($this->methods),
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
        $targets = implode(',', $this->targets);
        $methods = implode(',', $this->methods);

        return [
            'sort_target.in' => __('core::message.validation.in', [
                'key' => $targets,
            ]),
            'sort_method.in' => __('core::message.validation.min', [
                'key' => $methods,
            ]),
        ];
    }
}
