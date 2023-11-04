<?php

namespace App\Exceptions;

use Exception;

class StatusQuotaException extends Exception
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
        return back()->withInput()->withErrors(['status' => 'cannot open more than 1']);
    }
}
