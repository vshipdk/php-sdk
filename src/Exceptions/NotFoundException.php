<?php

declare(strict_types=1);

namespace Vship\Exceptions;

use Exception;

class NotFoundException extends \Exception
{
    /**
     * Create a new exception instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('The resource you are looking for could not be found.');
    }
}
