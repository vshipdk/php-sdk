<?php

namespace Shippii\Actions;

trait ManageShipments
{
    public function listUserShipments(string $parameters)
    {
        return $this->get("shipment?{$parameters}");
    }

    public function createShipment(array $payload)
    {
        return $this->post('shipment', $payload);
    }

    public function updateShipment(string $shipmentId, array $payload)
    {
        return $this->patch("shipment/{$shipmentId}", $payload);
    }

    public function updateShipmentState(string $shipmentId, string $shipmentState)
    {
        return $this->post("shipment/{$shipmentId}/update-state/{$shipmentState}");
    }

    public function archiveShipment(string $shipmentId)
    {
        return $this->patch("shipment/archive/{$shipmentId}");
    }
}