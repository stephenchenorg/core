<?php

namespace Stephenchen\Core\Traits;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

trait HelperPaginateTrait
{
    /**
     * @param array $source
     * @param string $page
     * @param string $perPage
     * @return array
     */
    protected function getPaginateValues(array $source,
                                         string $page = 'page',
                                         string $perPage = 'per_page'): array
    {
        $from    = $this->getPage($page);
        $perPage = $this->getPerPage($perPage);
        return collect($source)
            ->forPage($from, $perPage)
            ->values()
            ->all();
    }
    /**
     * Get page number, return `page 1` if NonExist
     *
     * @param string $key
     *
     * @return int
     */
    protected function getPage(string $key = 'page'): int
    {
        try {
            return request()->get($key) ?? 1;
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            return 1;
        }
    }

    /**
     * Get Per Page number, return `20` if NonExist
     *
     * @param string $key
     *
     * @return int
     */
    protected function getPerPage(string $key = 'per_page'): int
    {
        try {
            return request()->get($key) ?? 20;
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            return 20;
        }
    }

    /**
     * Get skip by calculate value from `page` and `per_page`
     *
     * @param string $page
     * @param string $perPage
     *
     * @return int
     */
    protected function getSkip(string $page = 'page', string $perPage = 'per_page'): int
    {
        $perPage = $this->getPerPage($perPage);
        $page    = $this->getPage($page) - 1;
        return $page * $perPage;
    }

    /**
     * @return bool
     */
    public function hasPerPage(): bool
    {
        return request()->has('per_page') ?? FALSE;
    }
}
