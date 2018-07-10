<?php

use Brightgrove\Validator\ValidationRule\DateValidationRule;

describe('DateValidationRule', function () {
    describe('->validate()', function () {
        it('Should return an error if received date with the number of days is more than 31', function () {
            expect(function ($values) {
                (new DateValidationRule())->validate($values[0]);
            })->with(['32/11/1999'])->to->throw(
                'Brightgrove\Validator\Exception\ValidationException',
                DateValidationRule::INVALID_DATE_ERROR
            );
        });

        it('Should return an error if received date with the number of months is more than 12', function () {
            expect(function ($values) {
                (new DateValidationRule())->validate($values[0]);
            })->with(['29/13/1999'])->to->throw(
                'Brightgrove\Validator\Exception\ValidationException',
                DateValidationRule::INVALID_DATE_ERROR
            );
        });

        it('Should return an error if received date in an invalid format', function () {
            expect(function ($values) {
                (new DateValidationRule())->validate($values[0]);
            })->with(['/11/11/1999'])->to->throw(
                'Brightgrove\Validator\Exception\ValidationException',
                DateValidationRule::INVALID_FORMAT_ERROR
            );

            expect(function ($values) {
                (new DateValidationRule())->validate($values[0]);
            })->with(['test'])->to->throw(
                'Brightgrove\Validator\Exception\ValidationException',
                DateValidationRule::INVALID_FORMAT_ERROR
            );

            expect(function ($values) {
                (new DateValidationRule())->validate($values[0]);
            })->with(['1/1/1999'])->to->throw(
                'Brightgrove\Validator\Exception\ValidationException',
                DateValidationRule::INVALID_FORMAT_ERROR
            );
        });

        it('Should return an error if received date with the number of days in February is more than 29', function () {
            expect(function ($values) {
                (new DateValidationRule())->validate($values[0]);
            })->with(['30/02/1999'])->to->throw(
                'Brightgrove\Validator\Exception\ValidationException',
                DateValidationRule::INVALID_DATE_ERROR
            );
        });

        it('Should return an error if received date with the number of days in February is more than 28 in not a high year', function () {
            expect(function ($values) {
                (new DateValidationRule())->validate($values[0]);
            })->with(['29/02/2018'])->to->throw(
                'Brightgrove\Validator\Exception\ValidationException',
                DateValidationRule::INVALID_DATE_ERROR
            );
        });

        it('Should return a valid response if received date in a valid format', function () {
            expect(function ($values) {
                (new DateValidationRule())->validate($values[0]);
            })->with(['20/12/1999'])->to->not->throw(
                'Brightgrove\Validator\Exception\ValidationException'
            );
        });
    });
});
