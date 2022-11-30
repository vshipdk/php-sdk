<?php

namespace Shippii\Resources;

class Label extends Resource
{
    public string $shipmentId;

    public function fetchPrintShipmentLabel(array $parameters)
    {
        $parameters = $this->prepareParameters($parameters);

        return $this->shippii->fetchPrintShipmentLabel($this->shipmentId, $parameters);
    }
}