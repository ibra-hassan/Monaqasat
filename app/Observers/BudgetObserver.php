<?php

namespace App\Observers;

use App\Models\Budget;

class BudgetObserver
{
    public function created(Budget $budget)
    {
        $direc = $budget->directorate;
        if (str_split($budget->year->year, 4)[0] == now()->year) {
            $direc->total_budget = $budget->budget;
            $direc->save();
        }
    }

    public function updated(Budget $budget)
    {
        $direc = $budget->directorate;
        if (str_split($budget->year->year, 4)[0] == now()->year) {
            $direc->total_budget = $budget->budget;
            $direc->save();
        }
    }

    public function deleted(Budget $budget)
    {
        //
    }

    public function restored(Budget $budget)
    {
        //
    }

    public function forceDeleted(Budget $budget)
    {
        //
    }
}
