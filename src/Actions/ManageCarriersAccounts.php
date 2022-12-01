<?php
declare(strict_types=1);

namespace Shippii\Actions;

trait ManageCarriersAccounts
{
    public function listCarriersAccounts(array $parameters)
    {
        $parameters = $this->prepareRequestParameters($parameters);

        return $this->get("carrier-account?{$parameters}");
    }

    public function createCarrierAccount(array $payload)
    {
        return $this->post('carrier-account', $payload);
    }

    public function getCarrierAccount(string $carrierAccountId)
    {
        return $this->get("carrier-account/{$carrierAccountId}");
    }

    public function updateCarrierAccount(string $carrierAccountId, array $payload)
    {
        return $this->patch("carrier-account/{$carrierAccountId}", $payload);
    }

    public function deleteCarrierAccount(string $carrierAccountId)
    {
        return $this->delete("carrier-account/{$carrierAccountId}");
    }

    public function getCarrierAccountFields(string $carrierCode)
    {
        return $this->get("carrier-account/fields/{$carrierCode}");
    }
}