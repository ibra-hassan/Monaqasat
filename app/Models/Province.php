<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Province extends Model
{
    use SoftDeletes;

    public $table = 'provinces';

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
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function provinceGovernor()
    {
        return $this->hasMany(Governor::class, 'province_id', 'id');
    }

    public function provinceDepartments()
    {
        return $this->hasMany(Department::class, 'province_id', 'id');
    }

    public function provinceDirectorates()
    {
        return $this->hasMany(Directorate::class, 'province_id', 'id');
    }
}
