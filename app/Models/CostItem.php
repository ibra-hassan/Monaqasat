<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CostItem extends Model
{
    use SoftDeletes;

    public $table = 'cost_items';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'item',
        'statement',
        'price',
        'estimated_cost_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function estimated_cost()
    {
        return $this->belongsTo(EstimatedCost::class, 'estimated_cost_id');
    }
}
