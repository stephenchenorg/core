<?php

namespace Stephenchen\Core\Traits\Model\Accessor;

trait AccessorIsNewestText
{
    /**
     * 拿到 is_newest 的對應文字
     *
     * @return string
     */
    public function getIsNewestTextAttribute(): string
    {
        return match ((integer)$this->is_newest) {
            0 => trans('core::message.false'),
            1 => trans('core::message.true'),
            default => '未知',
        };
    }
}
