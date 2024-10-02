<?php

declare(strict_types=1);

namespace Vship\Actions;

use GuzzleHttp\Exception\GuzzleException;
use Vship\Exceptions\FailedActionException;
use Vship\Exceptions\NotFoundException;
use Vship\Exceptions\RateLimitExceededException;
use Vship\Exceptions\ValidationException;
use Vship\Models\Carrier\Carrier;
use Vship\Util\Util;

trait ManageCarriers
{
    /**
     * Get All Carriers.
     *
     * @return Carrier[]
     *
     * @throws FailedActionException
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function getCarriers(array $queryParams = []): array
    {
        $parameters = $this->prepareRequestParameters($queryParams);
        $response = $this->get("v1/carrier?{$parameters}")['data'];

        return Util::convertToVshipObjectCollection(Carrier::class, $response);
    }

    /**
     * Get Single Carrier by ID.
     *
     * @throws FailedActionException
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function getCarrier(string $carrierId): Carrier
    {
        $response = $this->get("v1/carrier/{$carrierId}")['data'];

        return Util::convertToVshipObject(Carrier::class, $response);
    }

    /**
     * Create new Carrier.
     *
     * @throws FailedActionException
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function createCarrier(array $payload): Carrier
    {
        $response = $this->post('v1/carrier', $payload)['data'];

        return Util::convertToVshipObject(Carrier::class, $response);
    }

    /**
     * Update Carrier by ID.
     *
     * @throws FailedActionException
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function updateCarrier(string $carrierId, array $payload): Carrier
    {
        $response = $this->patch("v1/carrier/{$carrierId}", $payload)['data'];

        return Util::convertToVshipObject(Carrier::class, $response);
    }

    /**
     * Delete Carrier by ID.
     *
     * @throws FailedActionException
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function deleteCarrier(string $carrierId): Carrier
    {
        $response = $this->delete("v1/carrier/{$carrierId}")['data'];

        return Util::convertToVshipObject(Carrier::class, $response);
    }
}
