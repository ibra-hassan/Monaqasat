<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Directorate extends Model
{
    use SoftDeletes;

    public $table = 'directorates';

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
        'province_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function directorateOffices()
    {
        return $this->hasMany(Office::class, 'directorate_id', 'id');
    }

    public function budgets()
    {
        return $this->hasMany(Budget::class, 'directorate_id', 'id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'directorate_id', 'id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function manager()
    {
        return $this->morphOne(GeneralManager::class, 'manageable');
    }
}
