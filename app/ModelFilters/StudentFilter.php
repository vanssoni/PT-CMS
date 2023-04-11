<?php 

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class StudentFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];
    public function startDate($date)
    {
        $startDate = \Carbon\Carbon::parse($date);
        return $this->whereDate('created_at', '>=', $startDate->format('Y-m-d'));
    }
    public function endDate($date)
    {
        $endDate = \Carbon\Carbon::parse($date);
        return $this->whereDate('created_at', '<=', $endDate->format('Y-m-d'));
    }
    public function createdAt($date)
    {
        $date = \Carbon\Carbon::parse($date);
        return $this->whereDate('created_at', '=', $date->format('Y-m-d'));
    }
    public function createdAtMonth($data)
    {
        return $this->whereYear('created_at', '=', $data['year'])->whereMonth('created_at', '=', $data['month']);
    }
}
