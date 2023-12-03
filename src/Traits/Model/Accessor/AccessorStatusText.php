<?php

namespace Stephenchen\Core\Traits\Model\Accessor;

use DateTimeInterface;

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
            0 => '未啟用',
            1 => '啟用',
            default => '未知',
        };
    }
}


