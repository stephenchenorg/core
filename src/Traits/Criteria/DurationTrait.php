<?php

namespace Stephenchen\Core\Traits\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

/**
 * Trait DurationTrait
 * @package Stephenchen\Core\Traits\Criteria
 * @method Builder whereDuration(Builder $query)
 */
trait DurationTrait
{
    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param Builder $query
     * @return Builder
     */
    protected function scopeWhereDuration(Builder $query): Builder
    {
        $table = $query->getModel()
            ->getTable();

        if (!Schema::hasColumn($table, 'started_at') && !Schema::hasColumn($table, 'ended_at')) {
            return $query;
        }

        return $query
            ->where(function ($query) {
                $query->whereDate('started_at', '<=', now())
                    ->orWhereNull('started_at');
            })
            ->where(function ($query) {
                $query->whereDate('ended_at', '>=', now())
                    ->orWhereNull('ended_at');
            });
    }
}


