<?php

namespace Stephenchen\Core\BuilderMacros;

use Stephenchen\Core\Pagination\CustomLengthAwarePaginator;
use Closure;

class SimpleApiPaginate
{
    public function __invoke(): Closure
    {
        return function ($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): CustomLengthAwarePaginator {
            $page = $page ?: CustomLengthAwarePaginator::resolveCurrentPage($pageName);

            $total = func_num_args() === 5 ? value(func_get_arg(4)) : $this->toBase()->getCountForPagination();

            $perPage = ($perPage instanceof Closure
                ? $perPage($total)
                : $perPage
            ) ?: $this->model->getPerPage();

            $results = $total
                ? $this->forPage($page, $perPage)->get($columns)
                : $this->model->newCollection();

            return new CustomLengthAwarePaginator(
                $results,
                $total,
                $perPage,
                $page,
                []
            );
        };
    }
}