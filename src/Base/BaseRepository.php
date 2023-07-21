<?php

namespace Stephenchen\Core\Base;

use Prettus\Repository\Eloquent\BaseRepository as PrettusBaseRepository;
use Stephenchen\Core\Traits\Repository\ModelExistence;

abstract class BaseRepository extends PrettusBaseRepository
{
    use ModelExistence;
}
