<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public $table = 'units';

    protected $fillable = [
        'title',
        'description',
        'symbol',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function quantity_items()
    {
        return $this->hasMany(QuantityItem::class, 'unit_id', 'id');
    }
}
