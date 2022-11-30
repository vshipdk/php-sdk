<?php

namespace Shippii\Actions;

trait ManageLabels
{
    public function fetchPrintShipmentLabel(string $shipmentId, string $parameters)
    {
        return $this->get("label/{$shipmentId}?{$parameters}");
    }
}