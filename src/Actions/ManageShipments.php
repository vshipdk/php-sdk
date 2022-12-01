<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Resources\Shipment;

trait ManageShipments
{
    public function listUserShipments(array $parameters): array
    {
        $parameters = $this->prepareRequestParameters($parameters);
        $response = $this->get("shipment?{$parameters}");

        return $this->transformCollection(
            collection: $response['data'],
            class: Shipment::class,
            meta: $response['meta'],
        );
    }

    public function createShipment(array $payload): Shipment
    {
        return new Shipment($this->post('shipment', $payload)['data'], $this);
    }

    public function updateShipment(string $shipmentId, array $payload): Shipment
    {
        return new Shipment($this->patch("shipment/{$shipmentId}", $payload)['data'], $this);
    }

    public function updateShipmentState(string $shipmentId, string $shipmentState): void
    {
        $this->post("shipment/{$shipmentId}/update-state/{$shipmentState}");
    }

    public function archiveShipment(string $shipmentId): void
    {
        $this->patch("shipment/archive/{$shipmentId}");
    }
}