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
     * @return Carrier[]
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getCarriers(array $queryParams = []): array
    {
        $parameters = $this->prepareRequestParameters($queryParams);
        $response = $this->get("v1/carrier?{$parameters}")['data'];
        return Util::convertToShippiObjectCollection(Carrier::class, $response);
    }

    /**
     * Get Single Carrier by ID
     *
     * @param string $carrierId
     * @return Carrier
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getCarrier(string $carrierId): Carrier
    {
        $response = $this->get("v1/carrier/{$carrierId}")['data'];
        return Util::convertToShippiObject(Carrier::class, $response);
    }

    /**
     * Create new Carrier
     *
     * @param array $payload
     * @return Carrier
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function createCarrier(array $payload): Carrier
    {
        $response = $this->post("v1/carrier", $payload)['data'];
        return Util::convertToShippiObject(Carrier::class, $response);
    }

    /**
     * Update Carrier by ID
     *
     * @param string $carrierId
     * @param array $payload
     * @return Carrier
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function updateCarrier(string $carrierId, array $payload): Carrier
    {
        $response = $this->patch("v1/carrier/{$carrierId}", $payload)['data'];
        return Util::convertToShippiObject(Carrier::class, $response);
    }

    /**
     * Delete Carrier by ID
     *
     * @param string $carrierId
     * @return Carrier
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function deleteCarrier(string $carrierId): Carrier
    {
        $response = $this->delete("v1/carrier/{$carrierId}")['data'];

        return Util::convertToShippiObject(Carrier::class, $response);
    }
}