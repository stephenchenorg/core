<?php

namespace Stephenchen\Core\Base;

use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Eloquent\BaseRepository as PrettusBaseRepository;
use Stephenchen\Core\Traits\Repository\ModelExistence;

abstract class BaseRepository extends PrettusBaseRepository
{
    use ModelExistence;

    /**
     * Get a new query builder that doesn't have any global scopes or eager loading.
     *
     * @return Builder
     */
    public function newModelQuery(): Builder
    {
        return $this->model->newModelQuery();
    }
}
