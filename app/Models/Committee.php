<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    public    $table    = 'committees';
    protected $dates    = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'name',
        'project_id',
        'president_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function president()
    {
        return $this->belongsTo(CommitteeMember::class, 'president_id');
    }

    public function members()
    {
        return $this->hasMany(CommitteeMember::class, 'committee_id', 'id');
    }
}
