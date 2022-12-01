<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Resources\Shipment;

trait ManageShipments
{
    public function listUserShipments(array $parameters)
    {
        $parameters = $this->prepareRequestParameters($parameters);

        return $this->transformCollection(
            collection: $this->get("shipment?{$parameters}")['data'],
            class: Shipment::class,
        );
    }

    public function createShipment(array $payload)
    {
        return new Shipment($this->post('shipment', $payload)['data'], $this);
    }

    public function updateShipment(string $shipmentId, array $payload)
    {
        return new Shipment($this->patch("shipment/{$shipmentId}", $payload)['data'], $this);
    }

    public function updateShipmentState(string $shipmentId, string $shipmentState)
    {
        return new Shipment($this->post("shipment/{$shipmentId}/update-state/{$shipmentState}")['data'], $this);
    }

    public function archiveShipment(string $shipmentId)
    {
        $this->patch("shipment/archive/{$shipmentId}");
    }
}