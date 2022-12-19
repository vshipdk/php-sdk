<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Resources\Shipment;

trait ManageShipments
{
    /**
     * Get Shipments
     *
     * @param array $queryParams
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getShipments(array $queryParams = []): array
    {
        $parameters = $this->prepareRequestParameters($queryParams);
        $response = $this->get("v1/shipment?{$parameters}");

        return $this->transformCollection(
            collection: $response['data'],
            class: Shipment::class,
            meta: $response['meta'],
        );
    }

    /**
     * Create shipment
     *
     * @param array $payload
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function createShipment(array $payload): array
    {
        return $this->post('v1/shipment', $payload);
    }

    /**
     * Update shipment
     *
     * @param string $shipmentId
     * @param array $payload
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function updateShipment(string $shipmentId, array $payload): array
    {
        return $this->patch("v1/shipment/{$shipmentId}", $payload);
    }

    /**
     * Update the state of a shipment.
     *
     * @param string $shipmentId
     * @param string $shipmentState
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function updateShipmentState(string $shipmentId, string $shipmentState): array
    {
        return $this->post("v1/shipment/{$shipmentId}/update-state/{$shipmentState}");
    }

    /**
     * Archive shipment
     *
     * @param string $shipmentId
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function archiveShipment(string $shipmentId): array
    {
        return $this->patch("v1/shipment/archive/{$shipmentId}");
    }
}