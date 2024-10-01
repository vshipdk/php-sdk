<?php

declare(strict_types=1);

namespace Shippii\Actions;

use GuzzleHttp\Exception\GuzzleException;
use Shippii\Exceptions\FailedActionException;
use Shippii\Exceptions\NotFoundException;
use Shippii\Exceptions\RateLimitExceededException;
use Shippii\Exceptions\ValidationException;
use Shippii\Models\Organisation\Organisation;
use Shippii\Util\Util;

trait ManageOrganisations
{
    /**
     * Get All Organisations.
     *
     * @return Organisation[]
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function getOrganisations(array $queryParams = []): array
    {
        $parameters = $this->prepareRequestParameters($queryParams);
        $response = $this->get("v1/organisation?{$parameters}")['data'];

        return Util::convertToShippiiObjectCollection(Organisation::class, $response);
    }

    /**
     * Get Single Organisation.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function getOrganisation(string $organisationId): Organisation
    {
        $response = $this->get("v1/organisation/{$organisationId}")['data'];

        return Util::convertToShippiiObject(Organisation::class, $response);
    }

    /**
     * Create Organisation.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function createOrganisation(array $payload): Organisation
    {
        $response = $this->post('v1/organisation', $payload)['data'];

        return Util::convertToShippiiObject(Organisation::class, $response);
    }

    /**
     * Update Organisation.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function updateOrganisation(string $organisationId, array $payload): Organisation
    {
        $response = $this->patch("v1/organisation/{$organisationId}", $payload)['data'];

        return Util::convertToShippiiObject(Organisation::class, $response);
    }

    /**
     * Delete Organisation.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function deleteOrganisation(string $organisationId): Organisation
    {
        $response = $this->delete("v1/organisation/{$organisationId}")['data'];

        return Util::convertToShippiiObject(Organisation::class, $response);
    }
}
