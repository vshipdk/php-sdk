<?php

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

    public function index(array $parameters = [])
    {
        $parameters = $this->prepareParameters($parameters);

        return $this->shippii->listCarriersAccounts($parameters);
    }

    public function create()
    {
        $payload = $this->preparePayload(['carrier_code', 'name', 'purpose', 'status', 'organisation_id', 'data', 'expires_at']);

        return $this->shippii->createCarrierAccount($payload);
    }

    public function get()
    {
        return $this->shippii->getCarrierAccount($this->id);
    }

    public function update()
    {
        $payload = $this->preparePayload(['carrier_code', 'name', 'purpose', 'status', 'organisation_id', 'data', 'expires_at']);

        return $this->shippii->updateCarrierAccount($this->id, $payload);
    }

    public function delete()
    {
        return $this->shippii->deleteCarrierAccount($this->id);
    }

    public function getFields()
    {
        return $this->shippii->getCarrierAccountFields($this->carrierCode);
    }
}