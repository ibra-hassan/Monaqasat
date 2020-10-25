<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancialYear extends Model
{
    use SoftDeletes;

    public $table = 'financial_years';

    public static $searchable = [
        'year',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'year',
        'budget',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function budgets()
    {
        return $this->hasMany(Budget::class, 'financial_year_id', 'id');
    }

    public function getBudgetAttribute($value)
    {
        $result = 0;
        foreach ($this->budgets as $money) {
            $result += $money->budget;
        }
        return $result . ' ' . (app()->getLocale() == 'en' ? '$' : 'دولار');
    }
}
