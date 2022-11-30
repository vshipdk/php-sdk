<?php

namespace Shippii\Actions;

use Shippii\Resources\CarrierAccount;

trait ManageCarriersAccounts
{
    public function listCarriersAccounts(string $parameters)
    {
        return $this->get("carrier-account?{$parameters}");
    }

    public function createCarrierAccount(CarrierAccount $carrierAccount)
    {
        $payload = [
            'carrier_code' => $carrierAccount->carrierCode,
            'name' => $carrierAccount->name,
            'purpose' => $carrierAccount->purpose,
            'status' => $carrierAccount->status,
            'organisation_id' => $carrierAccount->organisationId,
            'data' => $carrierAccount->data,
            'expires_at' => $carrierAccount->expiresAt,
        ];

        return $this->post('carrier-account', $payload);
    }

    public function getCarrierAccount(CarrierAccount $carrierAccount)
    {
        return $this->get("carrier-account/{$carrierAccount->id}");
    }

    public function updateCarrierAccount(CarrierAccount $carrierAccount)
    {
        $payload = [
            'carrier_code' => $carrierAccount->carrierCode,
            'name' => $carrierAccount->name,
            'purpose' => $carrierAccount->purpose,
            'status' => $carrierAccount->status,
            'data' => $carrierAccount->data,
            'expires_at' => $carrierAccount->expiresAt,
        ];

        return $this->patch("carrier-account/{$carrierAccount->id}", $payload);
    }

    public function deleteCarrierAccount(CarrierAccount $carrierAccount)
    {
        return $this->delete("carrier-account/{$carrierAccount->id}");
    }

    public function getCarrierAccountFields(CarrierAccount $carrierAccount)
    {
        return $this->get("carrier-account/fields/{$carrierAccount->carrierCode}");
    }
}