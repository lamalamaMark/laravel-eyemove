<?php

namespace LamaLama\EyeMove;

use Illuminate\Support\Facades\Facade;

class EyeMoveFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'eyemove';
    }
}
