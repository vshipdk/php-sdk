<?php

declare(strict_types=1);

namespace Vship\Exceptions;

use Exception;

class RateLimitExceededException extends \Exception
{
    /**
     * Create a new exception instance.
     *
     * @param int|null $rateLimitResetsAt
     * @return void
     */
    public function __construct(/**
     * The timestamp that the rate limit will be reset.
     */
        public $rateLimitResetsAt,
    ) {
        parent::__construct('Too Many Requests.');
    }
}
