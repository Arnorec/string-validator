<?php

namespace Brightgrove\Validator\ValidationRule;

abstract class AbstractValidationRule
{
    abstract public function validate($value);
}