<?php

declare(strict_types=1);

namespace Vship\Exceptions;

class ValidationException extends ResponseMessagesException
{
    /**
     * @param string[] $messages
     * @param string $body
     */
    public function __construct(array $messages, string $body)
    {
        parent::__construct($messages, "The given data failed to pass validation. Response body: {$body}");
    }
}
