<?php

namespace App\Observers;

use App\Models\Tender;
use App\Models\TenderStatus;
use Illuminate\Support\Facades\Auth;

class TenderObserve
{
    public function created(Tender $tender)
    {
        if (!$tender->status()->exists()) {
            $tender->status()->associate(TenderStatus::findOrFail(4));
        }
        if (!$tender->created_by()->exists()) {
            $tender->created_by()->associate(Auth::user());
        }
        $tender->save();
    }

    /**
     * Handle the tender "updated" event.
     *
     * @param \App\Models\Tender $tender
     * @return void
     */
    public function updated(Tender $tender)
    {
        //
    }

    /**
     * Handle the tender "deleted" event.
     *
     * @param \App\Models\Tender $tender
     * @return void
     */
    public function deleted(Tender $tender)
    {
        //
    }

    /**
     * Handle the tender "restored" event.
     *
     * @param \App\Models\Tender $tender
     * @return void
     */
    public function restored(Tender $tender)
    {
        //
    }

    /**
     * Handle the tender "force deleted" event.
     *
     * @param \App\Models\Tender $tender
     * @return void
     */
    public function forceDeleted(Tender $tender)
    {
        //
    }
}
