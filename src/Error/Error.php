<?php

namespace Brightgrove\Validator\Error;

class Error implements ErrorInterface
{
    /**
     * @var string
     */
    protected $message;

    /**
     * Error constructor.
     * @param string $message
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}