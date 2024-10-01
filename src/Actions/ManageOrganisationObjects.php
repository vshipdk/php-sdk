<?php

declare(strict_types=1);

namespace Shippii\Actions;

use GuzzleHttp\Exception\GuzzleException;
use Shippii\Exceptions\FailedActionException;
use Shippii\Exceptions\NotFoundException;
use Shippii\Exceptions\RateLimitExceededException;
use Shippii\Exceptions\ValidationException;
use Shippii\Models\OrganisationObject\OrganisationObject;
use Shippii\Util\Util;

trait ManageOrganisationObjects
{
    /**
     * Get All Organisation Objects.
     *
     * @return OrganisationObject[]
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function getOrganisationObjects(array $parameters = []): array
    {
        $parameters = $this->prepareRequestParameters($parameters);
        $response = $this->get("v1/organisation-object?{$parameters}")['data'];

        return Util::convertToShippiiObjectCollection(OrganisationObject::class, $response);
    }

    /**
     * Get Single Organisation Object.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function getOrganisationObject(string $organisationObjectId): OrganisationObject
    {
        $response = $this->get("v1/organisation-object/{$organisationObjectId}")['data'];

        return Util::convertToShippiiObject(OrganisationObject::class, $response);
    }

    /**
     * Create Organisation Object.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function createOrganisationObject(array $payload): OrganisationObject
    {
        $response = $this->post('v1/organisation-object', $payload)['data'];

        return Util::convertToShippiiObject(OrganisationObject::class, $response);
    }

    /**
     * Update Organisation Object.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function updateOrganisationObject(string $organisationObjectId, array $payload): OrganisationObject
    {
        $response = $this->patch("v1/organisation-object/{$organisationObjectId}", $payload)['data'];

        return Util::convertToShippiiObject(OrganisationObject::class, $response);
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
    public function deleteOrganisationObject(string $organisationObjectId): OrganisationObject
    {
        $response = $this->delete("v1/organisation-object/{$organisationObjectId}")['data'];

        return Util::convertToShippiiObject(OrganisationObject::class, $response);
    }
}
