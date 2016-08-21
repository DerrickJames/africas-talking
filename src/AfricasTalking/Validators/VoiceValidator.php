<?php

namespace DerrickJames\AfricasTalking\Validators;

class VoiceValidator extends AbstractValidator
{
    /**
     * Validate file object.
     *
     * @param string $file
     * @return boolean
     **/
    public function validateFile($fileUrl)
    {
        if (! is_file($fileUrl)) {
            throw new \InvalidArgumentException('Please upload a valid file.');
        }

        return true;
    }
}
