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
            $numbers = explode(',', $phoneNumber);

            foreach($numbers as $number) {
                $this->validateNumber($number);
            }

            return true;
        }

        $this->validateNumber($phoneNumber);

        return true;
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
