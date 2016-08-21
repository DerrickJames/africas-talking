<?php

namespace DerrickJames\AfricasTalking\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see DerrickJames\AfricasTalking\AfricasTalkingManager
 */
class AfricasTalking extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'DerrickJames\AfricasTalking\Contracts\Factory';
    }
}
