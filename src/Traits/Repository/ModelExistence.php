<?php

namespace Stephenchen\Core\Traits\Repository;

trait ModelExistence
{
    /**
     * Check current model is exists
     */
    public function exists(): bool
    {
        return $this->model->exists();
    }
}
