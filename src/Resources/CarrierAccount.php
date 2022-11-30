<?php

namespace Shippii\Resources;

class CarrierAccount extends Resource
{
    public string|null $id;
    public string|null $carrierCode;
    public string|null $name;
    public string|null $purpose;
    public string|null $status;
    public string|null $organisationId;
    public array|null $data;
    public string|null $expiresAt = null;

    public function index(string $parameters = '')
    {
        return $this->shippii->listCarriersAccounts($parameters);
    }

    public function create()
    {
        return $this->shippii->createCarrierAccount($this);
    }

    public function get()
    {
        return $this->shippii->getCarrierAccount($this);
    }

    public function update()
    {
        return $this->shippii->updateCarrierAccount($this);
    }

    public function delete()
    {
        return $this->shippii->deleteCarrierAccount($this);
    }

    public function getFields()
    {
        return $this->shippii->getCarrierAccountFields($this);
    }
}