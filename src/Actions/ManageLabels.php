<?php

declare(strict_types=1);

namespace Vship\Actions;

use GuzzleHttp\Exception\GuzzleException;
use Vship\Exceptions\FailedActionException;
use Vship\Exceptions\NotFoundException;
use Vship\Exceptions\RateLimitExceededException;
use Vship\Exceptions\ValidationException;
use Vship\Models\Label\Label;
use Vship\Util\Util;

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

        return Util::convertToVshipObjectCollection(Label::class, $response);
    }
}
