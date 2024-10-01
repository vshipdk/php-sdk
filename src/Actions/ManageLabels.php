<?php

declare(strict_types=1);

namespace Vship\SDK\Actions;

use GuzzleHttp\Exception\GuzzleException;
use Vship\SDK\Exceptions\FailedActionException;
use Vship\SDK\Exceptions\NotFoundException;
use Vship\SDK\Exceptions\RateLimitExceededException;
use Vship\SDK\Exceptions\ValidationException;
use Vship\SDK\Models\Label\Label;
use Vship\SDK\Util\Util;

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
