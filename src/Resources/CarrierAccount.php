<?php
declare(strict_types=1);

namespace Shippii\Resources;

class CarrierAccount extends Resource
{
    public string $id;
    public string|null $carrierCode = null;
    public string|null $name = null;
    public string|null $purpose = null;
    public string|null $status = null;
    public string $organisationId;
    public array|null $data = null;
    public string|null $expiresAt = null;
    public array|null $fields;
    public array|null $carriers;
    public string|null $createdAt;
    public string|null $updatedAt;

    public function index(array $parameters = []): array
    {
        return $this->shippii->listCarriersAccounts($parameters);
    }

    public function create(): self
    {
        $payload = $this->preparePayload(['carrier_code', 'name', 'purpose', 'status', 'organisation_id', 'data', 'expires_at']);

        return $this->shippii->createCarrierAccount($payload);
    }

    public function get(): self
    {
        return $this->shippii->getCarrierAccount($this->id);
    }

    public function update(): self
    {
        $payload = $this->preparePayload(['carrier_code', 'name', 'purpose', 'status', 'organisation_id', 'data', 'expires_at']);

        return $this->shippii->updateCarrierAccount($this->id, $payload);
    }

    public function delete(): void
    {
        $this->shippii->deleteCarrierAccount($this->id);
    }

    public function getFields(): self
    {
        return $this->shippii->getCarrierAccountFields($this->carrierCode);
    }
}