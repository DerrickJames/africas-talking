<?php

namespace DerrickJames\AfricasTalking\Drivers;

use DerrickJames\AfricasTalking\Validators\SubscriptionValidator;

class Subscription extends AbstractDriver
{
    /**
     * Validator.
     *
     * @var \DerrickJames\AfricasTalking\Validators\SubscriptionValidator
     */
    protected $validator;

    /**
     * Fetch a subscription.
     *
     * @param mixed $fetchStartIndex
     */
    public function fetch($fetchStartIndex = null)
    {
        if (func_num_args != 0) {
            $this->fetchStartIndex = $fetchStartIndex;
        }

        return $this->fetchPremiumSubscriptions();
    }

    /**
     * Create a new subscription.
     *
     * @return
     */
    public function create()
    {
        $url = $this->getSubscriptionUrl() . '/create';

        return $this->postRequest($url, $this->buildSubscriptionParameters());
    }

    /**
     * Delete a subscription.
     *
     * @return
     */
    public function delete()
    {
        $url = $this->getSubscriptionUrl() . '/delete';

        return $this->postRequest($url, $this->buildSubscriptionParameters());
    }

    /**
     * Send airtime subscription.
     *
     * @return
     */
    public function sendAirtime()
    {
        // change this implementation
        //$this->getValidator()->validate($this->recipients);

        $url = $this->getAirtimeUrl() . '/send';
  	    $fields = ['recipients'  => $this->recipients];
  	
  	    return $this->postRequest($url, $this->buildParameters($fields));
    }

    /**
     * Fetch a user.
     *
     * @return
     */
    public function user()
    {
        $parameters = $this->buildParameters();

        $url = $this->buildUrl($this->getUserUrl(), $parameters);

        return $this->getRequest($url);
    }

    /**
     * Fetch premium subscriptions.
     *
     * @return
     */
    protected function fetchPremiumSubscriptions()
    {
        $fields = array_merge(
            $this->getOptions(),
            ['lastReceivedId' => $this->fetchStartIndex]
        );

        $parameters = $this->buildParameters($fields);

        $url = $this->buildUrl($this->getSubscriptionUrl(), $parameters);

        return $this->getRequest($url);
    }

    /**
     * Build subscription parameters.
     *
     * @return array
     */
    protected function buildSubscriptionParameters()
    {
        $this->getValidator()->validate($this->phoneNumber);

        $fields = array_merge(
            $this->getOptions(),
            ['phoneNumber' => $this->phoneNumber]
        );

        return $this->buildParameters($fields);
    }

    /**
     * Get subscription options.
     *
     * @return array
     */
    protected function getOptions()
    {
        $options = $this->config['options'];

        return [
            'keyword' => $options['subscrption']['keyword'],
            'shortCode' => $options['subscription']['shortCode']
        ];
    }

    /**
     * Get subscription URL for the service.
     *
     * @return string
     **/
    protected function getSubscriptionUrl()
    {
        return $this->config['subscription_url'];
    }

    /**
     * Get user URL for the service.
     *
     * @return string
     **/
    protected function getUserUrl()
    {
        return $this->config['user_url'];
    }

    /**
     * Get airtime URL for the service.
     *
     * @return string
     **/
    protected function getAirtimeUrl()
    {
        return $this->config['airtime_url'];
    }

    /**
     * Get an instance of the validator.
     *
     * @return DerrickJames\AfricasTalking\Validators\SubscriptionValidator
     **/
    protected function getValidator()
    {
        if (is_null($this->validator)) {
            $this->validator = new SubscriptionValidator();
        }

        return $this->validator;
    }
}
