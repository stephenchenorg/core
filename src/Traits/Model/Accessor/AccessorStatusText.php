<?php

namespace Stephenchen\Core\Traits\Model\Accessor;

trait AccessorStatusText
{

    /**
     * 拿到 status 的對應文字
     *
     * @return string
     */
    public function getStatusTextAttribute(): string
    {
        return match ((integer)$this->status) {
            0 => trans('core::message.disable_status'),
            1 => trans('core::message.enabled_status'),
            default => '未知',
        };
    }
}


