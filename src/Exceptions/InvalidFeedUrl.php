<?php

namespace LamaLama\EyeMove\Exceptions;

use Exception;
use Log;

class InvalidFeedUrl extends Exception
{
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
        Log::error('The feed url is not set');
    }
}
