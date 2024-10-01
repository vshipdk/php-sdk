<?php

declare(strict_types=1);

namespace Vship\SDK\Actions;

use GuzzleHttp\Exception\GuzzleException;
use Vship\SDK\Exceptions\FailedActionException;
use Vship\SDK\Exceptions\NotFoundException;
use Vship\SDK\Exceptions\RateLimitExceededException;
use Vship\SDK\Exceptions\ValidationException;
use Vship\SDK\Models\Shipment\Shipment;
use Vship\SDK\Util\Util;

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

        return Util::convertToVshipObjectCollection(Shipment::class, $response);
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

        return Util::convertToVshipObject(Shipment::class, $response);
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

        return Util::convertToVshipObject(Shipment::class, $response);
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

        return Util::convertToVshipObject(Shipment::class, $response);
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

        return Util::convertToVshipObject(Shipment::class, $response);
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
