<?php

namespace App\Observers;

use App\Models\Quota;
use App\Models\Registrar;
use Illuminate\Support\Facades\Storage;

class RegistrarObserver
{
    public function saving(Registrar $registrar)
    {
        //
    }

    /**
     * Handle the Registrar "created" event.
     *
     * @param  \App\Models\Registrar  $registrar
     * @return void
     */
    public function created(Registrar $registrar)
    {
    }

    /**
     * Handle the Registrar "updated" event.
     *
     * @param  \App\Models\Registrar  $registrar
     * @return void
     */
    public function updated(Registrar $registrar)
    {
        $registrar->check();
    }

    /**
     * Handle the Registrar "deleted" event.
     *
     * @param  \App\Models\Registrar  $registrar
     * @return void
     */
    public function deleted(Registrar $registrar)
    {
        $this->delete_file($registrar);
    }

    /**
     * Handle the Registrar "restored" event.
     *
     * @param  \App\Models\Registrar  $registrar
     * @return void
     */
    public function restored(Registrar $registrar)
    {
        //
    }

    /**
     * Handle the Registrar "force deleted" event.
     *
     * @param  \App\Models\Registrar  $registrar
     * @return void
     */
    public function forceDeleted(Registrar $registrar)
    {
        $this->delete_file($registrar);
    }

    public function validate(Registrar $registrar)
    {
        if ($registrar->status == 'validated') {
            $registrar->quota()->first()->quota_increment($registrar);
        }
        $registrar->saveQuietly();
    }

    protected function delete_file(Registrar $registrar)
    {
        if ($registrar->photo) {
            Storage::delete($registrar->photo);
        }
        if ($registrar->munaqasyah) {
            Storage::delete($registrar->munaqasyah);
        }
        if ($registrar->school_certificate) {
            Storage::delete($registrar->school_certificate);
        }
        if ($registrar->ktp) {
            Storage::delete($registrar->ktp);
        }
        if ($registrar->kk) {
            Storage::delete($registrar->kk);
        }
        if ($registrar->spukt) {
            Storage::delete($registrar->spukt);
        }
        Storage::deleteDirectory("registrar/$registrar->nim");
    }
}
