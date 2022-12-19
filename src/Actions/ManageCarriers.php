<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Resources\Carrier;

trait ManageCarriers
{
    /**
     * Get All Carriers
     *
     * @param array $queryParams
     * @return array
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getCarriers(array $queryParams = []): array
    {
        $parameters = $this->prepareRequestParameters($queryParams);
        $response = $this->get("v1/carrier?{$parameters}");

        return $this->transformCollection(
            collection: $response['data'],
            class: Carrier::class,
            meta: $response['meta'],
        );
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
        return new Carrier(
            $this->get("v1/carrier/{$carrierId}")['data'],
            $this
        );
    }

    /**
     * Create new Carrier
     *
     * @param array $payload
     * @return array
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function createCarrier(array $payload): array
    {
        return $this->post("v1/carrier", $payload);
    }

    /**
     * Update Carrier by ID
     *
     * @param string $carrierId
     * @param array $payload
     * @return array
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function updateCarrier(string $carrierId, array $payload): array
    {
        return $this->patch("v1/carrier/{$carrierId}", $payload);
    }

    /**
     * Delete Carrier by ID
     *
     * @param string $carrierId
     * @return array
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function deleteCarrier(string $carrierId): array
    {
        return $this->delete("v1/carrier/{$carrierId}");
    }
}