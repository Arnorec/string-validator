<?php

namespace Brightgrove\Validator\Validator;

use Brightgrove\Validator\Error\Error;
use Brightgrove\Validator\Exception\ValidationException;
use Brightgrove\Validator\Result\Result;
use Brightgrove\Validator\ValidationRule\AbstractValidationRule;

abstract class AbstractValidator
{
    const IS_ONE_VALIDATION_RULE_IS_REQUIRED_ERROR = 'At lease one validation rule is required';
    const INVALID_VALIDATION_RULE_ERROR            = 'Validation rule must be implements ValidationRuleInterface';

    /** @var AbstractValidationRule[] */
    protected $validationRules;

    public function __construct(array $validationRules)
    {
        if (empty($validationRules)) {
            throw new \Exception(self::IS_ONE_VALIDATION_RULE_IS_REQUIRED_ERROR);
        }

        foreach ($validationRules as $validationRule) {
            if (!$validationRule instanceof AbstractValidationRule) {
                throw new \Exception(self::INVALID_VALIDATION_RULE_ERROR);
            }

            $this->validationRules[] = $validationRule;
        }
    }

    public function validate($value): Result
    {
        $result = new Result();

        foreach ($this->validationRules as $validationRule) {
            try {
                $validationRule->validate($value);
            } catch (ValidationException $e) {
                $result->addError(new Error($e->getMessage()));
            }
        }

        return $result;
    }
}