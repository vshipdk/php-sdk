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

    /**
     * Create new Carrier
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function create(): array
    {
        $payload = $this->preparePayload(['name', 'code', 'carrier_account_id', 'status', 'settings']);
        return $this->shippii->createCarrier($payload);
    }


    /**
     * Update Carrier
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function update(): array
    {
        $payload = $this->preparePayload(['name', 'code', 'status', 'settings']);
        return $this->shippii->updateCarrier($this->id, $payload);
    }

    /**
     * Delete Carrier
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function delete(): array
    {
        return $this->shippii->deleteCarrier($this->id);
    }
}