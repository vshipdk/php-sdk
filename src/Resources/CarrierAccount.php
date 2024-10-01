<?php

declare(strict_types=1);

namespace Shippii\Resources;

use GuzzleHttp\Exception\GuzzleException;
use Shippii\Exceptions\FailedActionException;
use Shippii\Exceptions\NotFoundException;
use Shippii\Exceptions\RateLimitExceededException;
use Shippii\Exceptions\ValidationException;

class CarrierAccount extends Resource
{
    public string $id;

    public ?string $carrierCode = null;

    public ?string $name = null;

    public ?string $purpose = null;

    public ?string $status = null;

    public string $organisationId;

    public ?array $data = null;

    public ?string $expiresAt = null;

    public ?array $fields;

    public ?array $carriers;

    public ?string $createdAt;

    public ?string $updatedAt;

    /**
     * Create carrier account.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function create(): array
    {
        $payload = $this->preparePayload(['carrier_code', 'name', 'purpose', 'status', 'organisation_id', 'data', 'expires_at']);

        return $this->shippii->createCarrierAccount($payload);
    }

    /**
     * Update Carrier account.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function update(): array
    {
        $payload = $this->preparePayload(['carrier_code', 'name', 'purpose', 'status', 'organisation_id', 'data', 'expires_at']);

        return $this->shippii->updateCarrierAccount($this->id, $payload);
    }

    /**
     * Delete carrier account.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function delete(): array
    {
        return $this->shippii->deleteCarrierAccount($this->id);
    }
}
