<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TenderStatus extends Model
{
    public    $table   = 'tender_statuses';
    protected $guarded = [];

    public function tenders()
    {
        return $this->hasMany(Tender::class, 'tender_status_id', 'id');
    }
}
