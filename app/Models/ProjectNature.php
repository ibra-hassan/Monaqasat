<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectNature extends Model
{
    use SoftDeletes;

    public        $table      = 'project_natures';
    public static $searchable = [
        'title',
    ];
    protected     $dates      = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected     $fillable   = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function natureprojects()
    {
        return $this->hasMany(Project::class, 'nature_id', 'id');
    }
}
