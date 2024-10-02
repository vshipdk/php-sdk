<?php

declare(strict_types=1);

namespace Vship\Actions;

use GuzzleHttp\Exception\GuzzleException;
use Vship\Exceptions\FailedActionException;
use Vship\Exceptions\NotFoundException;
use Vship\Exceptions\RateLimitExceededException;
use Vship\Exceptions\ValidationException;
use Vship\Models\Country\Country;
use Vship\Util\Util;

trait ManageCountries
{
    /**
     * Get Countries.
     *
     * @return Country[]
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function getCountries(): array
    {
        $response = $this->get('v1/country')['data'];

        return Util::convertToVshipObjectCollection(Country::class, $response);
    }
}
