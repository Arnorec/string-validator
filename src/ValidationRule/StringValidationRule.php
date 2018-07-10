<?php

namespace Brightgrove\Validator\ValidationRule;

use Brightgrove\Validator\Exception\ValidationException;

class StringValidationRule extends AbstractValidationRule
{
    const IS_NOT_STRING_ERROR = 'This value should be string.';

    /**
     * @param mixed $value
     * @throws ValidationException
     */
    public function validate($value)
    {
        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value)) {
            throw new ValidationException(self::IS_NOT_STRING_ERROR);
        }
    }
}