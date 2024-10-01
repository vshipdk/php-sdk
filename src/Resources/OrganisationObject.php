<?php

declare(strict_types=1);

namespace Shippii\Resources;

use GuzzleHttp\Exception\GuzzleException;
use Shippii\Exceptions\FailedActionException;
use Shippii\Exceptions\NotFoundException;
use Shippii\Exceptions\RateLimitExceededException;
use Shippii\Exceptions\ValidationException;

class OrganisationObject extends Resource
{
    public string $id;

    public ?string $name = null;

    public string $organisationId;

    public array $organisation;

    public ?string $currency = null;

    public ?string $timezone = null;

    public ?array $settings = null;

    public ?string $createdAt;

    public ?string $updatedAt;

    /**
     * Create Organisation Object.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function create(): array
    {
        $payload = $this->preparePayload(['name', 'organisation_id', 'currency', 'timezone', 'settings']);

        return $this->shippii->createOrganisationObject($payload);
    }

    /**
     * Update organisation object.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function update(): array
    {
        $payload = $this->preparePayload(['name', 'currency', 'timezone', 'settings']);

        return $this->shippii->updateOrganisationObject($this->id, $payload);
    }

    /**
     * Delete Organisation Object.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function delete(): array
    {
        return $this->shippii->deleteOrganisationObject($this->id);
    }
}
