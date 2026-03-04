<?php

declare(strict_types=1);

namespace Vship\Resources;

use GuzzleHttp\Exception\GuzzleException;
use Vship\Exceptions\FailedActionException;
use Vship\Exceptions\NotFoundException;
use Vship\Exceptions\RateLimitExceededException;
use Vship\Exceptions\ValidationException;

class CarrierAccount extends BaseResource
{
    public string $id;

    public ?string $carrierCode = null;

    public ?string $name = null;

    public ?string $purpose = null;

    public ?string $status = null;

    public string $organisationId;

    /** @var array<string, mixed>|null */
    public ?array $data = null;

    public ?string $expiresAt = null;

    /** @var array<string, mixed>|null */
    public ?array $fields = null;

    /** @var array<string, mixed>|null */
    public ?array $carriers = null;

    public ?string $createdAt = null;

    public ?string $updatedAt = null;

    /**
     * Create carrier account.
     *
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function create(): \Vship\Models\CarrierAccount\CarrierAccount
    {
        $payload = $this->preparePayload(['carrier_code', 'name', 'purpose', 'status', 'organisation_id', 'data', 'expires_at']);

        return $this->client->createCarrierAccount($payload);
    }

    /**
     * Update Carrier account.
     *
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function update(): \Vship\Models\CarrierAccount\CarrierAccount
    {
        $payload = $this->preparePayload(['carrier_code', 'name', 'purpose', 'status', 'organisation_id', 'data', 'expires_at']);

        return $this->client->updateCarrierAccount($this->id, $payload);
    }

    /**
     * Delete carrier account.
     *
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function delete(): \Vship\Models\CarrierAccount\CarrierAccount
    {
        return $this->client->deleteCarrierAccount($this->id);
    }
}
