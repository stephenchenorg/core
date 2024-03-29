<?php

namespace Stephenchen\Core\Traits\Model\Accessor;

trait AccessorIsHottestText
{
    /**
     * 拿到 is_hottest 的對應文字
     *
     * @return string
     */
    public function getIsHottestTextAttribute(): string
    {
        return match ((integer)$this->is_hottest) {
            0 => trans('core::message.false'),
            1 => trans('core::message.true'),
            default => '未知',
        };
    }
}
