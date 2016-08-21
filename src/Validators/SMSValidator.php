<?php

namespace DerrickJames\AfricasTalking\Validators;

class SMSValidator extends AbstractValidator
{
    /**
     * Message minimum length.
     *
     * @var int
     **/
    protected $messageMinLength = 3;

    /*
     * Validate SMS send message data.
     *
     * @param array $data
     */
    public function validate($data)
    {
        list($phoneNumber, $message) = $data;

        $this->validatePhoneNumber($phoneNumber);
        $this->validateMessage($message);
    }

    /**
     * Validate SMS message.
     *
     * @param string $message
     * @return boolean
     */
    protected function validateMessage($message)
    {
        if (strlen($message) < $this->messageMinLength) {
            throw new \InvalidArgumentException(
                'Message cannot be less than ' . $this->messageMinLength
            );
        }

        return true;
    }
}
