<?php
namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\Filter;

trait Filterable
{
    /**
     * @param Builder $builder
     * @param Filter $filter
     */
    public function scopeFilter(Builder $builder, Filter $filter)
    {
        $filter->apply($builder);
    }
}
