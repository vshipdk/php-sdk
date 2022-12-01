<?php
declare(strict_types=1);

namespace Shippii\Actions;

trait ManageLabels
{
    public function fetchPrintShipmentLabel(string $shipmentId, array $parameters)
    {
        $parameters = $this->prepareRequestParameters($parameters);

        return $this->get("label/{$shipmentId}?{$parameters}");
    }
}