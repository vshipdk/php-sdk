<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Util\Util;
use Shippii\Models\Country\Country;

trait ManageCountries
{
    /**
     * Get Countries
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getCountries(): mixed
    {
        $response = $this->get('v1/country')['data'];
        return Util::convertToShippiObjectCollection(Country::class, $response);
    }
}