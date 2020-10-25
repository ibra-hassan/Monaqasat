<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class GeneralManager extends Model
{
    use SoftDeletes;

    public $table = 'general_managers';

    public static $searchable = [
        'name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'phone',
        'created_at',
        'updated_at',
        'deleted_at',
        # Relationship
        'manageable_id',
        'manageable_type',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function manageable()
    {
        return $this->morphTo();
    }
}
