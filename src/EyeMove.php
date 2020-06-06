<?php

namespace LamaLama\EyeMove;

use LamaLama\EyeMove\Leads;
use LamaLama\EyeMove\Projects;

class EyeMove
{
    /**
     * Leads.
     *
     * @return void
     */
    public function leads()
    {
        return new Leads();
    }

    /**
     * Projects.
     *
     * @return void
     */
    public function projects()
    {
        return new Projects();
    }
}
