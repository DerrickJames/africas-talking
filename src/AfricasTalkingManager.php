<?php

namespace DerrickJames\AfricasTalking;

use InvalidArgumentException;
use Illuminate\Support\Manager;
use DerrickJames\AfricasTalking\Contracts\Factory;

class AfricasTalkingManager extends Manager implements Factory
{
    /**
     * Create an instance of the specified driver.
     *
     * @return \DerrickJames\AfricasTalking\Drivers\AbstractDriver
     */
    protected function createSMSDriver()
    {
        $config = $this->app['config']['africas-talking'];

        return $this->buildProvider('DerrickJames\AfricasTalking\Drivers\SMS', $config);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \DerrickJames\AfricasTalking\Drivers\AbstractDriver
     */
    protected function createVoiceDriver()
    {
        $config = $this->app['config']['africas-talking'];

        return $this->buildProvider('DerrickJames\AfricasTalking\Drivers\Voice', $config);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \DerrickJames\AfricasTalking\Drivers\AbstractDriver
     */
    protected function createSubscriptionDriver()
    {
        $config = $this->app['config']['africas-talking'];

        return $this->buildProvider('DerrickJames\AfricasTalking\Drivers\Subscription', $config);
    }

    /**
     * Build the driver instance.
     *
     * @return \DerrickJames\AfricasTalking\Drivers\AbstractDriver
     */
    protected function buildProvider($provider, $config)
    {
        return new $provider($config);
    }

    /**
     * Get the default driver name.
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        throw new InvalidArgumentException('No driver was specified.');
    }
}
