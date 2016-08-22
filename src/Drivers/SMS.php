<?php

namespace DerrickJames\AfricasTalking\Drivers;

use SMSNotifier\Validators\SMSValidator;

class SMS extends AbstractDriver
{
    /**
     * SMS message.
     *
     * @var string
     */
    protected $message;

    /**
     * Specify the SMS message.
     *
     * @pram string $message
     * @return $this
     */
    public function message($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Send an SMS message.
     */
    public function send()
    {
        $params = $this->buildSendMessageParams();

        return $this->postRequest($this->getSMSUrl(), $params);
    }

    /**
     * Fetch messages.
     *
     * @return
     */
    public function fetch($fetchStartIndex = null)
    {
        if (func_num_args() != 0) {
            $this->fetchStartIndex = $fetchStartIndex;
        }

        return $this->fetchMessages();
    }

    /**
     * Get SMS URL for the service.
     *
     * @return string
     */
    protected function getSMSUrl()
    {
        return $this->config['sms_url'];
    }

    /**
     * Invoke fetch messages request.
     *
     * @return
     */
    protected function fetchMessages()
    {
        $fields = ['lastReceivedId' => $this->fetchStartIndex];

        $url = $this->buildUrl($this->getSMSUrl(), $this->buildParameters($fields));
    
        return $this->getRequest($url);
    }

    /**
     * Build send message parameters.
     *
     * @return array
     */
    protected function buildSendMessageParams()
    {
        with(new SMSValidator)->validate([$this->to, $this->message]);

        $fields = [
            'to' => $this->commaSeparate($this->to),
            'message' => $this->message
        ];

        if (strlen($this->from) != 0) {
            $fields['from'] = $this->from;
        }

        $options = $this->checkOptions($this->config['options']['sms']);

        return array_merge($this->buildParameters($fields), $options);
    }

    /**
     * Check set options
     *
     * @param array $options
     * @return array
     */
    protected function checkOptions($options)
    {
        if (strlen($options['retryDurationInHours']) == 0) {
            $options = array_except($options, 'retryDurationInHours');
        }

        return $options;
    }
}
