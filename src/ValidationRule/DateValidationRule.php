<?php

namespace Brightgrove\Validator\ValidationRule;

use Brightgrove\Validator\Exception\ValidationException;

class DateValidationRule extends AbstractValidationRule
{
    const INVALID_FORMAT_ERROR = 'This value should be in DD\MM\YYYY format.';
    const INVALID_DATE_ERROR   = 'This value should be valid date.';

    /**
     * @param mixed $value
     * @throws ValidationException
     */
    public function validate($value)
    {
        if (null === $value || '' === $value || !is_string($value)) {
            return;
        }

        $matches = [];
        if (!preg_match('/^(\d{2})\\/(\d{2})\\/(\d{4})$/', $value, $matches)) {
            throw new ValidationException(self::INVALID_FORMAT_ERROR);
        }
        if (!checkdate($matches[2], $matches[1], $matches[3])) {
            throw new ValidationException(self::INVALID_DATE_ERROR);
        }
    }
}