<?php

if (! function_exists('africasTalking')) {
    /**
     * Factory or driver instance.
     *
     * @param string $driver
     * @return mixed
     */
    function africasTalking($driver = null) {
        $provider = app('SMSNotifier\Contracts\Factory');

        if (func_num_args() == 0) {
            return $provider;
        }

        return $provider->driver($driver);
    }

}
