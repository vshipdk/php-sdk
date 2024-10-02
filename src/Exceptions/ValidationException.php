<?php

declare(strict_types=1);

namespace Vship\Exceptions;

use Exception;

class ValidationException extends \Exception
{
    /**
     * The array of errors.
     *
     * @var array
     */
    public $errors;

    /**
     * Create a new exception instance.
     */
    public function __construct(array $errors, string $body)
    {
        parent::__construct("The given data failed to pass validation. Response body: {$body}");

        $this->errors = $errors;
    }

    /**
     * The array of errors.
     *
     * @return array
     */
    public function errors()
    {
        return $this->errors;
    }
}
