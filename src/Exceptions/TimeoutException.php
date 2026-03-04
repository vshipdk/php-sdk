<?php

declare(strict_types=1);

namespace Vship\Exceptions;

use Exception;

class TimeoutException extends \Exception
{
    /**
     * The output returned from the operation.
     *
     * @var mixed[]
     */
    public $output;

    /**
     * Create a new exception instance.
     *
     * @param mixed[] $output
     */
    public function __construct(array $output)
    {
        parent::__construct('Script timed out while waiting for the process to complete.');

        $this->output = $output;
    }

    /**
     * The output returned from the operation.
     *
     * @return mixed[]
     */
    public function output()
    {
        return $this->output;
    }
}
