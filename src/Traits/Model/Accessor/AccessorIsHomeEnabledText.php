<?php

namespace Stephenchen\Core\Traits\Model\Accessor;

trait AccessorIsHomeEnabledText
{
    /**
     * 拿到 is_home_enabled 的對應文字
     *
     * @return string
     */
    public function getIsHomeEnabledTextAttribute(): string
    {
        return match ((integer)$this->is_home_enabled) {
            0 => trans('core::message.false'),
            1 => trans('core::message.true'),
            default => '未知',
        };
    }
}
