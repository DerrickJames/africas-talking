<?php

namespace DerrickJames\AfricasTalking\Validators;

abstract class AbstractValidator
{
    /**
     * Validate phone numbers.
     *
     * @param mixed $phoneNumber
     * @return boolean
     */
    public function validatePhoneNumber($phoneNumber)
    {
        if (is_array($phoneNumber)) {
            $this->validatePhoneNumberArray($phoneNumber);

            foreach($phoneNumber as $number) {
                $this->validateNumber($number);
            }

            return true;
        }

        $this->validateNumber($phoneNumber);

        return true;
    }

    /**
     * Validate phone number array.
     *
     * @param array $phoneNumber
     * @return void
     * @throws \InvalidArgumentException
     */
    protected function validatePhoneNumberArray($phoneNumber)
    {
        if (count($phoneNumber) === 0) {
            throw new \InvalidArgumentException(
                'Recipient property is required and must be an array'
            );
        }
    }

    /**
     * Validate phone number.
     *
     * @param string $number
     * @return boolean
     */
    protected function validateNumber($number)
    {
        if (preg_match('/^\+[0-9]{13}/', $number) == 0) {
            throw new \InvalidArgumentException(
                'Please include the country code in the format +254712345678'
            );
        }

        return true;
    }
}
