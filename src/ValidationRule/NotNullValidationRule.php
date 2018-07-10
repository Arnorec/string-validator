<?php

namespace Brightgrove\Validator\ValidationRule;

use Brightgrove\Validator\Exception\ValidationException;

class NotNullValidationRule extends AbstractValidationRule
{
    const IS_NULL_ERROR = 'This value should not be null.';

    /**
     * @param mixed $value
     * @throws ValidationException
     */
    public function validate($value)
    {
        if (false === $value || (empty($value) && '0' != $value)) {
            throw new ValidationException(self::IS_NULL_ERROR);
        }
    }
}