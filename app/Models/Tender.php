<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tender extends Model
{
    use SoftDeletes;

    public    $table    = 'tenders';
    protected $fillable = [
        'name',
        'code',
        'envelope_cost',
        'amount_warranty',
        'file_path',
        'ad',
        'tender_status_id',
        'employee_id',
        'project_id',
    ];
    protected $dates    = [
        'last_date',
        'open_date',
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

    public function created_by()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function status()
    {
        return $this->belongsTo(TenderStatus::class, 'tender_status_id');
    }

    public function required_docs()
    {
        return $this->belongsToMany(RequiredDoc::class, 'tender_required_doc', 'tender_id');
    }
}
