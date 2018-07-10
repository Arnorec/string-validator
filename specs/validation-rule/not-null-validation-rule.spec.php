<?php

use Brightgrove\Validator\ValidationRule\NotNullValidationRule;

describe('NotNullValidationRule', function () {
    describe('->validate()', function () {
        it('Should return an error if received empty value', function () {
            expect(function ($values) {
                (new NotNullValidationRule())->validate($values[0]);
            })->with([''])->to->throw(
                'Brightgrove\Validator\Exception\ValidationException',
                NotNullValidationRule::IS_NULL_ERROR
            );
        });

        it('Should return a valid response if received non empty value', function () {
            expect(function ($values) {
                (new NotNullValidationRule())->validate($values[0]);
            })->with(['20/12/1999'])->to->not->throw(
                'Brightgrove\Validator\Exception\ValidationException'
            );
        });
    });
});
