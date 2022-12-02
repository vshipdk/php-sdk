<?php
declare(strict_types=1);

namespace Shippii\Resources;

class Shipment extends Resource
{
    public string $id;
    public int $type;
    public string|null $carrierId;
    public array $sender;
    public array|null $receiver = null;
    public array|null $lines = null;
    public array $carrierOptions;
    public string $state;
    public string|null $rateId;
    public string|null $creatorId;
    public string|null $creatorType;
    public string|null $sendableId;
    public string|null $sendableAddressId;
    public string|null $receivableId;
    public string|null $receivableAddressId;
    public string|null $sendableReference;
    public string|null $carrierIdentification;
    public string|null $createdAt;
    public string|null $updatedAt;

    public function index(array $parameters = []): array
    {
        return $this->shippii->listUserShipments($parameters);
    }

    public function create(): self
    {
        $payload = $this->preparePayload(['type', 'carrier_id', 'sender', 'receiver', 'lines', 'carrier_options']);

        return $this->shippii->createShipment($payload);
    }

    public function update(): self
    {
        $payload = $this->preparePayload(['receiver', 'lines']);

        return $this->shippii->updateShipment($this->id, $payload);
    }

    public function updateState(): void
    {
        $this->shippii->updateShipmentState($this->id, $this->state);
    }

    public function archive(): void
    {
        $this->shippii->archiveShipment($this->id);
    }
}
