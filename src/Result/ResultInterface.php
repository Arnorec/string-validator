<?php

namespace Brightgrove\Validator\Result;

interface ResultInterface
{
    public function isValid(): bool;

    public function getMessages(): array;
}