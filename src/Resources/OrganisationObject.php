<?php

declare(strict_types=1);

namespace Vship\Resources;

use GuzzleHttp\Exception\GuzzleException;
use Vship\Exceptions\FailedActionException;
use Vship\Exceptions\NotFoundException;
use Vship\Exceptions\RateLimitExceededException;
use Vship\Exceptions\ValidationException;

class OrganisationObject extends BaseResource
{
    public string $id;

    public ?string $name = null;

    public string $organisationId;

    /** @var array<string, mixed> */
    public array $organisation;

    public ?string $currency = null;

    public ?string $timezone = null;

    /** @var array<string, mixed>|null */
    public ?array $settings = null;

    public ?string $createdAt = null;

    public ?string $updatedAt = null;

    /**
     * Create Organisation Object.
     *
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function create(): \Vship\Models\OrganisationObject\OrganisationObject
    {
        $payload = $this->preparePayload(['name', 'organisation_id', 'currency', 'timezone', 'settings']);

        return $this->client->createOrganisationObject($payload);
    }

    /**
     * Update organisation object.
     *
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function update(): \Vship\Models\OrganisationObject\OrganisationObject
    {
        $payload = $this->preparePayload(['name', 'currency', 'timezone', 'settings']);

        return $this->client->updateOrganisationObject($this->id, $payload);
    }

    /**
     * Delete Organisation Object.
     *
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function delete(): \Vship\Models\OrganisationObject\OrganisationObject
    {
        return $this->client->deleteOrganisationObject($this->id);
    }
}
