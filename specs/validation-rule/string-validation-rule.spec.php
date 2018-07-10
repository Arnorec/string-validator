<?php

use Brightgrove\Validator\ValidationRule\StringValidationRule;

describe('StringValidationRule', function () {
    describe('->validate()', function () {
        it('Should return an error if received number', function () {
            expect(function ($values) {
                (new StringValidationRule())->validate($values[0]);
            })->with([1000])->to->throw(
                'Brightgrove\Validator\Exception\ValidationException',
                StringValidationRule::IS_NOT_STRING_ERROR
            );
        });

        it('Should return an error if received boolean', function () {
            expect(function ($values) {
                (new StringValidationRule())->validate($values[0]);
            })->with([true])->to->throw(
                'Brightgrove\Validator\Exception\ValidationException',
                StringValidationRule::IS_NOT_STRING_ERROR
            );
        });

        it('Should return an error if received object', function () {
            expect(function ($values) {
                (new StringValidationRule())->validate($values[0]);
            })->with([new stdClass()])->to->throw(
                'Brightgrove\Validator\Exception\ValidationException',
                StringValidationRule::IS_NOT_STRING_ERROR
            );
        });

        it('Should return an error if received array', function () {
            expect(function ($values) {
                (new StringValidationRule())->validate($values[0]);
            })->with([[]])->to->throw(
                'Brightgrove\Validator\Exception\ValidationException',
                StringValidationRule::IS_NOT_STRING_ERROR
            );
        });

        it('Should return a valid response if received string', function () {
            expect(function ($values) {
                (new StringValidationRule())->validate($values[0]);
            })->with(['test string'])->to->not->throw(
                'Brightgrove\Validator\Exception\ValidationException'
            );
        });
    });
});
