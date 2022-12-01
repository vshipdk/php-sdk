<?php
declare(strict_types=1);

namespace Shippii\Resources;

class Carrier extends Resource
{
    public string $id;
    public string|null $name = null;
    public string|null $code = null;
    public int|null $status = null;
    public string $carrierAccountId;
    public array|null $settings = null;
    public string|null $ownerType;
    public string|null $ownerId;
    public array|null $account;
    public string|null $createdAt;
    public string|null $updatedAt;

    public function index(array $parameters = [])
    {
        return $this->shippii->listCarriers($parameters);
    }

    public function create()
    {
        $payload = $this->preparePayload(['name', 'code', 'status', 'carrier_account_id', 'settings']);

        return $this->shippii->createCarrier($payload);
    }

    public function get()
    {
        return $this->shippii->getCarrier($this->id);
    }

    public function update()
    {
        $payload = $this->preparePayload(['name', 'code', 'status', 'settings']);

        return $this->shippii->updateCarrier($this->id, $payload);
    }

    public function delete()
    {
        return $this->shippii->deleteCarrier($this->id);
    }
}