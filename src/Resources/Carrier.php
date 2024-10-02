<?php

declare(strict_types=1);

namespace Vship\Resources;

use GuzzleHttp\Exception\GuzzleException;
use Vship\Exceptions\FailedActionException;
use Vship\Exceptions\NotFoundException;
use Vship\Exceptions\RateLimitExceededException;
use Vship\Exceptions\ValidationException;

class Carrier extends Resource
{
    public string $id;

    public ?string $name = null;

    public ?string $code = null;

    public ?int $status = null;

    public string $carrierAccountId;

    public ?array $settings = null;

    public ?string $ownerType;

    public ?string $ownerId;

    public ?array $account;

    public ?string $createdAt;

    public ?string $updatedAt;

    /**
     * Create new Carrier.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function create(): array
    {
        $payload = $this->preparePayload(['name', 'code', 'carrier_account_id', 'status', 'settings']);

        return $this->client->createCarrier($payload);
    }

    /**
     * Update Carrier.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function update(): array
    {
        $payload = $this->preparePayload(['name', 'code', 'status', 'settings']);

        return $this->client->updateCarrier($this->id, $payload);
    }

    /**
     * Delete Carrier.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function delete(): array
    {
        return $this->client->deleteCarrier($this->id);
    }
}
