<?php

namespace App\Exceptions;

use Exception;

class QuotaReachedException extends Exception
{
    /**
     * Report the exception.
     */
    public function report()
    {
        // ...
    }

    /**
     * Render the exception into an HTTP response.
     */
    public function render()
    {
        return back()->withInput()->withErrors(['status' => 'quota has been reached']);
    }
}
