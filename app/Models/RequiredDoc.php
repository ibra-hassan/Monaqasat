<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequiredDoc extends Model
{
    use SoftDeletes;

    public    $table    = 'required_docs';
    protected $dates    = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'title',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function tenders()
    {
        return $this->belongsToMany(Tender::class, 'tender_required_doc', 'required_doc_id');
    }
}
