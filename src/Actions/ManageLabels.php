<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Resources\Label;

trait ManageLabels
{
    public function fetchPrintShipmentLabel(string $shipmentId, array $parameters)
    {
        $parameters = $this->prepareRequestParameters($parameters);
        $response = $this->get("label/{$shipmentId}?{$parameters}");

        return $this->transformCollection(
            collection: $response['data'],
            class: Label::class,
            meta: $response['meta'],
        );
    }
}