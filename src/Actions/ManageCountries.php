<?php

declare(strict_types=1);

namespace Shippii\Actions;

use GuzzleHttp\Exception\GuzzleException;
use Shippii\Exceptions\FailedActionException;
use Shippii\Exceptions\NotFoundException;
use Shippii\Exceptions\RateLimitExceededException;
use Shippii\Exceptions\ValidationException;
use Shippii\Models\Country\Country;
use Shippii\Util\Util;

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

        return Util::convertToShippiiObjectCollection(Country::class, $response);
    }
}
