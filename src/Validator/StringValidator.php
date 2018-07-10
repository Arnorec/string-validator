<?php

namespace Brightgrove\Validator\Validator;

use Brightgrove\Validator\ValidationRule\StringValidationRule;

class StringValidator extends AbstractValidator
{
    public function __construct(array $validationRules)
    {
        $this->validationRules[] = new StringValidationRule();

        parent::__construct($validationRules);
    }
}