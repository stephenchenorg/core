<?php

namespace Stephenchen\Core\Pagination;

use ArrayAccess;
use Countable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Collection;
use IteratorAggregate;
use JsonSerializable;

class CustomLengthAwarePaginator extends AbstractPaginator implements Arrayable, ArrayAccess, Countable, IteratorAggregate, Jsonable, JsonSerializable
{
    /**
     * The total number of items before slicing.
     *
     * @var int
     */
    protected $total;

    /**
     * The last available page.
     *
     * @var int
     */
    protected $lastPage;

    /**
     * Create a new paginator instance.
     *
     * @param  mixed  $items
     * @param  int  $total
     * @param  int  $perPage
     * @param  int|null  $currentPage
     * @param  array  $options  (path, query, fragment, pageName)
     * @return void
     */
    public function __construct($items, $total, $perPage, $currentPage = null, array $options = [])
    {
        $this->options = $options;

        foreach ($options as $key => $value) {
            $this->{$key} = $value;
        }

        $this->total = $total;
        $this->perPage = $perPage;
        $this->lastPage = max((int) ceil($total / $perPage), 1);
        $this->path = $this->path !== '/' ? rtrim($this->path, '/') : $this->path;
        $this->currentPage = $this->setCurrentPage($currentPage, $this->pageName);
        $this->items = $items instanceof Collection ? $items : Collection::make($items);
    }

    /**
     * Get the current page for the request.
     *
     * @param  int  $currentPage
     * @param  string  $pageName
     * @return int
     */
    protected function setCurrentPage($currentPage, $pageName)
    {
        $currentPage = $currentPage ?: static::resolveCurrentPage($pageName);

        return $this->isValidPageNumber($currentPage) ? (int) $currentPage : 1;
    }

    /**
     * Get the total number of items being paginated.
     *
     * @return int
     */
    public function total(): int
    {
        return $this->total;
    }

    /**
     * Get the last page.
     *
     * @return int
     */
    public function lastPage(): int
    {
        return $this->lastPage;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'total' => $this->total(),
            'data' => $this->items->toArray(),
            'page' => $this->currentPage(),
            'per_page' => $this->perPage(),
            'last_page' => $this->lastPage(),
//            'from' => $this->firstItem(),
//            'to' => $this->lastItem(),
        ];
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->jsonSerialize(), $options);
    }
}
