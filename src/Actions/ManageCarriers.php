<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Util\Util;
use Shippii\Models\Carrier\Carrier;

trait ManageCarriers
{
    /**
     * Get All Carriers
     *
     * @param array $queryParams
     * @return mixed
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getCarriers(array $queryParams = []): mixed
    {
        $parameters = $this->prepareRequestParameters($queryParams);
        $response = $this->get("v1/carrier?{$parameters}")['data'];
        return Util::convertToShippiObjectCollection(Carrier::class, $response);
    }

    /**
     * Get Single Carrier by ID
     *
     * @param string $carrierId
     * @return mixed
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getCarrier(string $carrierId): mixed
    {
        $response = $this->get("v1/carrier/{$carrierId}")['data'];
        return Util::convertToShippiObject(Carrier::class, $response);
    }

    /**
     * Create new Carrier
     *
     * @param array $payload
     * @return mixed
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function createCarrier(array $payload): mixed
    {
        $response = $this->post("v1/carrier", $payload)['data'];
        return Util::convertToShippiObject(Carrier::class, $response);
    }

    /**
     * Update Carrier by ID
     *
     * @param string $carrierId
     * @param array $payload
     * @return mixed
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function updateCarrier(string $carrierId, array $payload): mixed
    {
        $response = $this->patch("v1/carrier/{$carrierId}", $payload)['data'];
        return Util::convertToShippiObject(Carrier::class, $response);
    }

    /**
     * Delete Carrier by ID
     *
     * @param string $carrierId
     * @return mixed
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function deleteCarrier(string $carrierId): mixed
    {
        $response = $this->delete("v1/carrier/{$carrierId}")['data'];

        return Util::convertToShippiObject(Carrier::class, $response);
    }
}