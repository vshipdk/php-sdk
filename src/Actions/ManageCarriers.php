<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Resources\Carrier;

trait ManageCarriers
{
    public function listCarriers(array $parameters = [])
    {
        $parameters = $this->prepareRequestParameters($parameters);

        return $this->transformCollection(
            collection: $this->get("carrier?{$parameters}")['data'],
            class: Carrier::class,
        );
    }

    public function createCarrier(array $payload)
    {
        return new Carrier($this->post('carrier', $payload), $this);
    }

    public function getCarrier(string $carrierId)
    {
        return new Carrier($this->get("carrier/{$carrierId}")['data'], $this);
    }

    public function updateCarrier(string $carrierId, array $payload)
    {
        return new Carrier($this->patch("carrier/{$carrierId}", $payload), $this);
    }

    public function deleteCarrier(string $carrierId)
    {
        $this->delete("carrier/{$carrierId}");
    }
}