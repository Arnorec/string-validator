<?php

use Brightgrove\Validator\ValidationRule\{
    DateValidationRule,
    NotNullValidationRule,
    StringValidationRule
};
use Brightgrove\Validator\Validator\{
    AbstractValidator,
    StringValidator
};

describe('StringValidator', function () {
    describe('->validate()', function () {
        it('Should return an error if not received validation rules', function () {
            expect(function ($values) {
                new StringValidator($values[0]);
            })->with([[]])->to->throw(
                '\Exception',
                AbstractValidator::IS_ONE_VALIDATION_RULE_IS_REQUIRED_ERROR
            );
        });

        it('Should return an error if received invalid objects instead validation rules', function () {
            expect(function ($values) {
                new StringValidator($values[0]);
            })->with([[new \DateTime('now')]])->to->throw(
                '\Exception',
                AbstractValidator::INVALID_VALIDATION_RULE_ERROR
            );
        });

        it('Should return an error if the value is required and received empty value', function () {
            $stringValidator = new StringValidator([
                new NotNullValidationRule(),
                new DateValidationRule(),
            ]);

            $result = $stringValidator->validate('');

            expect($result->isValid())->is->false();
            expect($result->getMessages()[0])->is->equal(NotNullValidationRule::IS_NULL_ERROR);
        });

        it('Should return a valid response if value is not required and received empty value', function () {
            $stringValidator = new StringValidator([
                new DateValidationRule(),
            ]);

            $result = $stringValidator->validate('');

            expect($result->isValid())->is->true();
            expect($result->getMessages())->is->empty();
        });

        it('Should return an error if received invalid date value', function () {
            $stringValidator = new StringValidator([
                new NotNullValidationRule(),
                new DateValidationRule(),
            ]);

            $result = $stringValidator->validate('11/13/1999');

            expect($result->isValid())->is->false();
            expect($result->getMessages()[0])->is->equal(DateValidationRule::INVALID_DATE_ERROR);
        });

        it('Should return a valid response if received valid value', function () {
            $stringValidator = new StringValidator([
                new NotNullValidationRule(),
                new DateValidationRule(),
            ]);

            $result = $stringValidator->validate('11/11/1999');

            expect($result->isValid())->is->true();
            expect($result->getMessages())->is->empty();
        });

        it('Should return an error if received object instead string', function () {
            $stringValidator = new StringValidator([
                new NotNullValidationRule(),
                new DateValidationRule(),
            ]);

            $result = $stringValidator->validate(new stdClass());

            expect($result->isValid())->is->false();
            expect($result->getMessages()[0])->is->equal(StringValidationRule::IS_NOT_STRING_ERROR);
        });
    });
});
