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
            0 => '停用 ❌',
            1 => '啟用 ✅',
            default => '未知',
        };
    }
}


