<?php

declare(strict_types=1);

namespace Vship\Exceptions;

class SignatureVerificationException extends \Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
