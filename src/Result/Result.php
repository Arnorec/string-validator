<?php

namespace Brightgrove\Validator\Result;

use Brightgrove\Validator\Error\ErrorInterface;

class Result implements ResultInterface
{
    protected $errors = [];

    public function isValid(): bool
    {
        return empty($this->errors) ? true : false;
    }

    /**
     * @return string[]
     */
    public function getMessages(): array
    {
        $messages = [];

        foreach ($this->errors as $error) {
            $messages[] = $error->getMessage();
        }

        return $messages;
    }

    /**
     * @param ErrorInterface $error
     */
    public function addError(ErrorInterface $error)
    {
        $this->errors[] = $error;
    }
}