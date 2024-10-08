<?php

declare(strict_types=1);

namespace Vship\Actions;

use GuzzleHttp\Exception\GuzzleException;
use Vship\Exceptions\FailedActionException;
use Vship\Exceptions\NotFoundException;
use Vship\Exceptions\RateLimitExceededException;
use Vship\Exceptions\UnexpectedResponseSchemaException;
use Vship\Exceptions\ValidationException;
use Vship\Models\Shipment\Shipment;
use Vship\Util\Util;

trait ManageShipments
{
    /**
     * Get Shipments.
     *
     * @param array $queryParams
     * @return Shipment[]
     *
     * @throws FailedActionException
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws UnexpectedResponseSchemaException
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
     * @param string $shipmentId
     * @return Shipment
     * @throws FailedActionException
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws UnexpectedResponseSchemaException
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
     * @param array $payload
     * @return Shipment
     * @throws FailedActionException
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     * @throws UnexpectedResponseSchemaException
     */
    public function createShipment(array $payload): Shipment
    {
        $response = $this->post('v1/shipment', $payload)['data'];

        return Util::convertToVshipObject(Shipment::class, $response);
    }

    /**
      * Cancel shipment.
      *
      * @throws GuzzleException
      * @throws FailedActionException
      * @throws NotFoundException
      * @throws RateLimitExceededException
      * @throws ValidationException
      */
    public function cancelShipment(string $id): void
    {
        $this->delete("v1/shipment/{$id}");
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
