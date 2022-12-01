<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Resources\Label;

trait ManageLabels
{
    public function fetchPrintShipmentLabel(string $shipmentId, array $parameters)
    {
        $parameters = $this->prepareRequestParameters($parameters);

        return $this->transformCollection(
            collection: $this->get("label/{$shipmentId}?{$parameters}")['data'],
            class: Label::class,
        );
    }
}