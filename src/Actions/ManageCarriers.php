<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Resources\Carrier;

trait ManageCarriers
{
    public function listCarriers(array $parameters = []): array
    {
        $parameters = $this->prepareRequestParameters($parameters);
        $response = $this->get("carrier?{$parameters}");

        return $this->transformCollection(
            collection: $response['data'],
            class: Carrier::class,
            meta: $response['meta'],
        );
    }

    public function createCarrier(array $payload): Carrier
    {
        return new Carrier($this->post('carrier', $payload), $this);
    }

    public function getCarrier(string $carrierId): Carrier
    {
        return new Carrier($this->get("carrier/{$carrierId}")['data'], $this);
    }

    public function updateCarrier(string $carrierId, array $payload): Carrier
    {
        return new Carrier($this->patch("carrier/{$carrierId}", $payload), $this);
    }

    public function deleteCarrier(string $carrierId): void
    {
        $this->delete("carrier/{$carrierId}");
    }
}