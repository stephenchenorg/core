<?php

namespace Stephenchen\Core\Traits\Criteria;

use Illuminate\Database\Eloquent\Builder;

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


