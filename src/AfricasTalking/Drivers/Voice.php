<?php

namespace DerrickJames\AfricasTalking\Drivers;

use DerrickJames\AfricasTalking\Validators\VoiceValidator;

class Voice extends AbstractDriver
{
    /**
     * Validator.
     *
     * @var \DerrickJames\AfricasTalking\Validators\VoiceValidator
     */
    protected $validator;

    /**
     * Upload file URL.
     *
     * @var string
     */
    protected $fileUrl;

    /**
     * Specify file url.
     *
     * @param string $fileUrl
     * @return $this
     */
    public function file($fileUrl)
    {
        $this->fileUrl = $fileUrl;

        return $this;
    }

    /**
     * Initiate a voice call.
     *
     * @return
     */
    public function call()
    {
        $this->getValidator()->validatePhoneNumber($this->to);

        $url  = $this->getVoiceUrl() . '/call';
        $to = $this->commaSeparate($this->to);

        $fields = ['from' => $this->from, 'to' => $to];

        return $this->postRequest($url, $this->buildParameters($fields));
    }

    /**
     * Fetch the number of queued calls.
     *
     * @return array
     */
    public function queued()
    {
        $this->getValidator()->validatePhoneNumber($this->phoneNumber);

        $phoneNumbers = $this->commaSeparate($this->phoneNumber);

        $fields = ['phoneNumbers' => $phoneNumber];

        if (! is_null($this->queueName)) $fields['queueName'] = $this->queueName;

        $parameters = $this->buildParameters($fields);

        $url = $this->getVoiceUrl() . '/queueStatus';

  	    return $this->postRequest($url, $parameters);
    }

    /**
     * Upload a media file.
     *
     * @return
     */
    public function upload()
    {
        $this->getValidator()->validateFile($this->fileUrl);

        $fields = ['url' => $this->fileUrl];

        $parameters = $this->buildParameters($fields);

        $url = $this->getVoiceUrl() . '/mediaUpload';  
  	
  	    return $this->postRequest($url, $parameters);
    }

    /**
     * Get Voice URL for the service.
     *
     * @return string
     **/
    protected function getVoiceUrl()
    {
        return $this->config['voice_url'];
    }

    /**
     * Get an instance of the validator.
     *
     * @return DerrickJames\AfricasTalking\Validators\VoiceValidator
     **/
    protected function getValidator()
    {
        if (is_null($this->validator)) {
            $this->validator = new VoiceValidator();
        }

        return $this->validator;
    }
}
