<?php

declare(strict_types=1);

namespace Vship\Actions;

use GuzzleHttp\Exception\GuzzleException;
use Vship\Exceptions\FailedActionException;
use Vship\Exceptions\NotFoundException;
use Vship\Exceptions\RateLimitExceededException;
use Vship\Exceptions\ValidationException;
use Vship\Models\OrganisationObject\OrganisationObject;
use Vship\Util\Util;

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

        return Util::convertToVshipObjectCollection(OrganisationObject::class, $response);
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

        return Util::convertToVshipObject(OrganisationObject::class, $response);
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

        return Util::convertToVshipObject(OrganisationObject::class, $response);
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

        return Util::convertToVshipObject(OrganisationObject::class, $response);
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

        return Util::convertToVshipObject(OrganisationObject::class, $response);
    }
}
