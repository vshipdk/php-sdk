<?php

declare(strict_types=1);

namespace Vship\SDK\Actions;

use GuzzleHttp\Exception\GuzzleException;
use Vship\SDK\Exceptions\FailedActionException;
use Vship\SDK\Exceptions\NotFoundException;
use Vship\SDK\Exceptions\RateLimitExceededException;
use Vship\SDK\Exceptions\ValidationException;
use Vship\SDK\Models\Country\Country;
use Vship\SDK\Util\Util;

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
