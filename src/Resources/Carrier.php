<?php

declare(strict_types=1);

namespace Vship\Resources;

use GuzzleHttp\Exception\GuzzleException;
use Vship\Exceptions\FailedActionException;
use Vship\Exceptions\NotFoundException;
use Vship\Exceptions\RateLimitExceededException;
use Vship\Exceptions\ValidationException;

class Carrier extends BaseResource
{
    public string $id;

    public ?string $name = null;

    public ?string $code = null;

    public ?int $status = null;

    public string $carrierAccountId;

    /** @var array<string, mixed>|null */
    public ?array $settings = null;

    public ?string $ownerType = null;

    public ?string $ownerId = null;

    /** @var array<string, mixed>|null */
    public ?array $account = null;

    public ?string $createdAt = null;

    public ?string $updatedAt = null;

    /**
     * Create new Carrier.
     *
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function create(): \Vship\Models\Carrier\Carrier
    {
        $payload = $this->preparePayload(['name', 'code', 'carrier_account_id', 'status', 'settings']);

        return $this->client->createCarrier($payload);
    }

    /**
     * Update Carrier.
     *
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function update(): \Vship\Models\Carrier\Carrier
    {
        $payload = $this->preparePayload(['name', 'code', 'status', 'settings']);

        return $this->client->updateCarrier($this->id, $payload);
    }

    /**
     * Delete Carrier.
     *
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function delete(): \Vship\Models\Carrier\Carrier
    {
        return $this->client->deleteCarrier($this->id);
    }
}
