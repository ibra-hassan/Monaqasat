<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    public        $table      = 'projects';
    public static $searchable = [
        'name',
        'location',
    ];
    protected     $dates      = [
        'start_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected     $fillable   = [
        'name',
        'target_number',
        'description',
        'start_date',
        'estimated_year',
        'cost_primary',
        'type_id',
        'nature_id',
        'directorate_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('tender.date_format')) : null;
    }

    public function getLocationAttribute($value)
    {
        return 'حضرموت' . ' - ' . $this->directorate->name;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] =
            $value ? Carbon::createFromFormat(config('tender.date_format'), $value)->format('Y-m-d') : null;
    }

    public function type()
    {
        return $this->belongsTo(ProjectType::class, 'type_id');
    }

    public function nature()
    {
        return $this->belongsTo(ProjectNature::class, 'nature_id');
    }

    public function directorate()
    {
        return $this->belongsTo(Directorate::class, 'directorate_id');
    }

    public function accepted_by()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function committee()
    {
        return $this->hasOne(Committee::class, 'project_id', 'id');
    }

}
