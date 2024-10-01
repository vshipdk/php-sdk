<?php

declare(strict_types=1);

namespace Shippii\Actions;

use GuzzleHttp\Exception\GuzzleException;
use Shippii\Exceptions\FailedActionException;
use Shippii\Exceptions\NotFoundException;
use Shippii\Exceptions\RateLimitExceededException;
use Shippii\Exceptions\ValidationException;
use Shippii\Models\Shipment\Shipment;
use Shippii\Util\Util;

trait ManageShipments
{
    /**
     * Get Shipments.
     *
     * @return Shipment[]
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function getShipments(array $queryParams = []): array
    {
        $parameters = $this->prepareRequestParameters($queryParams);
        $response = $this->get("v1/shipment?{$parameters}")['data'];

        return Util::convertToShippiiObjectCollection(Shipment::class, $response);
    }

    /**
     * Get Shipments.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function getShipment(string $shipmentId): Shipment
    {
        $response = $this->get("v1/shipment/{$shipmentId}")['data'];

        return Util::convertToShippiiObject(Shipment::class, $response);
    }

    /**
     * Create shipment.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function createShipment(array $payload): Shipment
    {
        $response = $this->post('v1/shipment', $payload)['data'];

        return Util::convertToShippiiObject(Shipment::class, $response);
    }

    /**
     * Update shipment.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function updateShipment(string $shipmentId, array $payload): Shipment
    {
        $response = $this->patch("v1/shipment/{$shipmentId}", $payload)['data'];

        return Util::convertToShippiiObject(Shipment::class, $response);
    }

    /**
     * Update the state of a shipment.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function updateShipmentState(string $shipmentId, string $shipmentState): Shipment
    {
        $response = $this->post("v1/shipment/{$shipmentId}/update-state/{$shipmentState}")['data'];

        return Util::convertToShippiiObject(Shipment::class, $response);
    }

    /**
     * Archive shipment.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function archiveShipment(string $shipmentId): void
    {
        $this->patch("v1/shipment/archive/{$shipmentId}");
    }
}
