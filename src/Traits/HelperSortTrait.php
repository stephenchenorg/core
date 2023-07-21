<?php

namespace Stephenchen\Core\Traits;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Stephenchen\Core\Constant\Constant;

trait HelperSortTrait
{
    /**
     * Get sort target, EX: `sort` `date` `title`
     *
     * @return string
     */
    private function getSortTarget(): string
    {
        try {
            return request()->get('sort_target') ?? Constant::DATABASE_SORT;
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            return Constant::DATABASE_SORT;
        }
    }

    /**
     * Get sort order methods, EX: `desc` or `asc`
     *
     * @return string
     */
    private function getSortOrderMethods(): string
    {
        try {
            return request()->get('sort_order_methods') ?? Constant::DATABASE_DESC;
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            return Constant::DATABASE_DESC;
        }
    }
}
