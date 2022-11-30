<?php

namespace Shippii\Actions;

use Shippii\Resources\Carrier;

trait ManageCarriers
{
    public function listCarriers(string $parameters)
    {
        return $this->get("carrier?{$parameters}");
    }

    public function createCarrier(Carrier $carrier)
    {
        $payload = [
            'name' => $carrier->name,
            'code' => $carrier->code,
            'status' => $carrier->status,
            'carrier_account_id' => $carrier->carrierAccountId,
            'settings' => $carrier->settings,
        ];

        return $this->post('carrier', $payload);
    }

    public function getCarrier(Carrier $carrier)
    {
        return $this->get("carrier/{$carrier->id}");
    }

    public function updateCarrier(Carrier $carrier)
    {
        $payload = [
            'name' => $carrier->name,
            'code' => $carrier->code,
            'status' => $carrier->status,
            'settings' => $carrier->settings,
        ];

        return $this->patch("carrier/{$carrier->id}", $payload);
    }

    public function deleteCarrier(Carrier $carrier)
    {
        return $this->delete("carrier/{$carrier->id}");
    }
}