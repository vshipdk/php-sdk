<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Util\Util;
use Shippii\Models\Label\Label;

trait ManageLabels
{
    /**
     * Fetch labels for shipment
     *
     * @param string $shipmentId
     * @param array $queryParams
     * @return Label
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function fetchPrintShipmentLabel(string $shipmentId, array $queryParams = []): Label
    {
        $parameters = $this->prepareRequestParameters($queryParams);
        $response = $this->get("v1/label/{$shipmentId}?{$parameters}")['data'];
        return Util::convertToShippiiObject(Label::class, $response);
    }
}