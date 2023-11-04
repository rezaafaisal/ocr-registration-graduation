<?php

namespace App\Observers;

use App\Exceptions\StatusQuotaException;
use App\Models\Quota;

class QuotaObserver
{
    /**
     * Handle the Quota "created" event.
     *
     * @param  \App\Models\Quota  $quota
     * @return void
     */
    public function created(Quota $quota)
    {
        if (Quota::all_open()->count() > 1 && $quota->status == 'open') {
            $quota->deleteQuietly();
            throw new StatusQuotaException();
        }
    }

    /**
     * Handle the Quota "updated" event.
     *
     * @param  \App\Models\Quota  $quota
     * @return void
     */
    public function updated(Quota $quota)
    {
        if (Quota::all_open()->count() > 1 && $quota->status == 'open') {
            throw new StatusQuotaException();
        }
    }

    /**
     * Handle the Quota "deleted" event.
     *
     * @param  \App\Models\Quota  $quota
     * @return void
     */
    public function deleted(Quota $quota)
    {
        //
    }

    /**
     * Handle the Quota "restored" event.
     *
     * @param  \App\Models\Quota  $quota
     * @return void
     */
    public function restored(Quota $quota)
    {
        //
    }

    /**
     * Handle the Quota "force deleted" event.
     *
     * @param  \App\Models\Quota  $quota
     * @return void
     */
    public function forceDeleted(Quota $quota)
    {
        //
    }

    public function increment(Quota $quota)
    {

    }
}
