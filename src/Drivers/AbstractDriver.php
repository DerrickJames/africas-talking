<?php

namespace DerrickJames\AfricasTalking\Drivers;

use GuzzleHttp\Client;

abstract class AbstractDriver
{
    /**
     * Get package configuration.
     *
     * @var array
     **/
    protected $config;

    /**
     * Fetch starting from the 0 index.
     *
     * @var mixed
     */
    protected $fetchStartIndex = 0;

    /**
     * API login Key
     *
     * @var string
     */
    protected $apiKey;

    /**
     * API login username.
     *
     * @var string
     */
    protected $username;

    /**
     * HTTP Client.
     *
     * @var GuzzleHttp\Client
     */
    protected $httpClient;

    /**
     * Sender phone number.
     *
     * @var string
     */ 
    protected $from;

    /**
     * Voice and SMS recipients phone numbers.
     *
     * @var array
     */
    protected $to;

    /**
     * Phone number.
     *
     * @var string
     */
    protected $phoneNumber;

    /**
     * Queue name.
     *
     * @var string
     */
    protected $queueName;

    /**
     * Airtime recipients.
     *
     * @var array
     */
    protected $recipients;

    /**
     * Create a new driver instance.
     *
     * @param array $config
     * @return void
     */
    public function __construct($config)
    {
        $this->setConfig($config);
    }

    /**
     * Specify sender phone number.
     *
     * @param string $from
     * @return $this
     */
    public function from($from = null)
    {
        if (func_num_args() != 0) {
            $this->from = $from;
        }

        return $this;
    }

    /**
     * Specify recipient phone numbers.
     *
     * @param array $to
     * @return $this
     */
    public function to($to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Specify the phoneNumber.
     *
     * @param array $phoneNumber
     * @return $this
     */
    public function phoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Specify recipients.
     *
     * @param array $recipients
     * @return $this
     */
    public function recipients($recipients)
    {
        $this->recipients = $recipients;

        return $this;
    }

    /**
     * Specify a queue name.
     *
     * @param string $queueName
     * @return $this
     */
    public function queueName($queueName)
    {
        $this->queueName = $queueName;

        return $this;
    }

    /**
     * Get a comma separated list of phone numbers.
     *
     * @param array $numberList
     * @return string
     */
    protected function commaSeparate($numberList)
    {
        return implode(',', $numberList);
    }

    /**
     * Set config to properties.
     *
     * @param array $config
     */
    protected function setConfig($config)
    {
        $this->config = $config;
        $this->from = $config['from'];
        $this->apiKey = $config['api_key'];
        $this->username = $config['username'];
    }

    /**
     * Build request parameters.
     *
     * @param array $parameters
     * @return array
     */
    protected function buildParameters(array $parameters = [])
    {
        return array_merge($parameters, ['username' => $this->username]);
    }

    /**
     * Build request url.
     *
     * @param string $url
     * @param array $parameters
     * @return string
     */
    protected function buildUrl($url, $parameters)
    {
        return $url . '?' . http_build_query($parameters);
    }

    /**
     * Create new HTTP Client instance.
     *
     * @return GuzzleHttp\Client
     */
    protected function getHttpClient()
    {
        if (is_null($this->httpClient)) {
            $this->httpClient = new Client([
                'timeout' => 60,
                'verify' => false,
                'expect' => false,
                'allow_redirects' => false
            ]);
        }

        return $this->httpClient;
    }

    /**
     * Invoke a http post request.
     *
     * @param string $url
     * @param array $parameters
     * @return
     */
    protected function postRequest($url, $parameters)
    {
        return $this->getHttpClient()->request('POST', $url, [
            'headers' => [
                'Accept' => 'application/json',
                'apikey' => $this->apiKey
            ],
            'form_params' => $parameters
        ]);
    }

    /**
     * Initiate a http get request.
     *
     * @param string $url
     * @return
     */
    protected function getRequest($url)
    {
        return $this->getHttpClient()->request('GET', $url, [
            'headers' => [
                'Accept' => 'application/json',
                'apikey' => $this->apiKey
            ]
        ]);
    }
}
