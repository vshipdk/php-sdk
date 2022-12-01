<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Resources\CarrierAccount;

trait ManageCarriersAccounts
{
    public function listCarriersAccounts(array $parameters = [])
    {
        $parameters = $this->prepareRequestParameters($parameters);

        return $this->transformCollection(
            collection: $this->get("carrier-account?{$parameters}")['data'],
            class: CarrierAccount::class,
        );
    }

    public function createCarrierAccount(array $payload)
    {
        return new CarrierAccount($this->post('carrier-account', $payload)['data'], $this);
    }

    public function getCarrierAccount(string $carrierAccountId)
    {
        return new CarrierAccount($this->get("carrier-account/{$carrierAccountId}")['data'], $this);
    }

    public function updateCarrierAccount(string $carrierAccountId, array $payload)
    {
        return new CarrierAccount($this->patch("carrier-account/{$carrierAccountId}", $payload)['data'], $this);
    }

    public function deleteCarrierAccount(string $carrierAccountId)
    {
        $this->delete("carrier-account/{$carrierAccountId}");
    }

    public function getCarrierAccountFields(string $carrierCode)
    {
        $attributes = [
            'fields' => $this->get("carrier-account/fields/{$carrierCode}")['data'],
            'carrier_code' => $carrierCode,
        ];

        return new CarrierAccount($attributes, $this);
    }
}