<?php

declare(strict_types=1);

namespace Shippii\Actions;

use GuzzleHttp\Exception\GuzzleException;
use Shippii\Exceptions\FailedActionException;
use Shippii\Exceptions\NotFoundException;
use Shippii\Exceptions\RateLimitExceededException;
use Shippii\Exceptions\ValidationException;
use Shippii\Models\Label\Label;
use Shippii\Util\Util;

trait ManageLabels
{
    /**
     * Fetch labels for shipment.
     *
     * @return Label[]
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function fetchPrintShipmentLabel(string $shipmentId, array $queryParams = []): array
    {
        $parameters = $this->prepareRequestParameters($queryParams);
        $response = $this->get("v1/label/{$shipmentId}?{$parameters}")['data'];

        return Util::convertToShippiiObjectCollection(Label::class, $response);
    }
}
