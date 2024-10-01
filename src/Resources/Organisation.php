<?php

declare(strict_types=1);

namespace Vship\SDK\Resources;

use GuzzleHttp\Exception\GuzzleException;
use Vship\SDK\Exceptions\FailedActionException;
use Vship\SDK\Exceptions\NotFoundException;
use Vship\SDK\Exceptions\RateLimitExceededException;
use Vship\SDK\Exceptions\ValidationException;

class Organisation extends Resource
{
    public string $id;

    public ?string $name = null;

    public ?string $vatNumber = null;

    public ?string $companyNumber = null;

    public ?bool $vatRegistered = null;

    public ?string $currency = null;

    public ?string $timezone = null;

    public ?array $settings = null;

    /**
     * Create organisation.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function create(): array
    {
        $payload = $this->preparePayload(['name', 'vat_number', 'company_number', 'vat_registered', 'currency', 'timezone', 'settings']);

        return $this->client->createOrganisation($payload);
    }

    /**
     * Update organisation.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function update(): array
    {
        $payload = $this->preparePayload(['name', 'vat_number', 'company_number', 'vat_registered', 'currency', 'timezone', 'settings']);

        return $this->client->updateOrganisation($this->id, $payload);
    }

    /**
     * Delete organisation.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function delete(): array
    {
        return $this->client->deleteOrganisation($this->id);
    }
}
