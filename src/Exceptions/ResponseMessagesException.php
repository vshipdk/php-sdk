<?php

declare(strict_types=1);

namespace Vship\Exceptions;

abstract class ResponseMessagesException extends \Exception
{
    /**
     * @param string[] $messages
     * @param string $body
     */
    public function __construct(public readonly array $messages, string $body)
    {
        parent::__construct($body);
    }
}
