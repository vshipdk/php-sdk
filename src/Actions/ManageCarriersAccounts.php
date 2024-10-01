<?php

declare(strict_types=1);

namespace Shippii\Actions;

use GuzzleHttp\Exception\GuzzleException;
use Shippii\Exceptions\FailedActionException;
use Shippii\Exceptions\NotFoundException;
use Shippii\Exceptions\RateLimitExceededException;
use Shippii\Exceptions\ValidationException;
use Shippii\Models\CarrierAccount\CarrierAccount;
use Shippii\Models\CarrierAccount\CarrierAccountFields;
use Shippii\Util\Util;

trait ManageCarriersAccounts
{
    /**
     * Get All Carrier Accounts.
     *
     * @return CarrierAccount[]
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function getCarrierAccounts(array $queryParams = []): array
    {
        $parameters = $this->prepareRequestParameters($queryParams);
        $response = $this->get("v1/carrier-account?{$parameters}")['data'];

        return Util::convertToShippiiObjectCollection(CarrierAccount::class, $response);
    }

    /**
     * Get Single Carrier Account by ID.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function getCarrierAccount(string $carrierAccountId): CarrierAccount
    {
        $response = $this->get("v1/carrier-account/{$carrierAccountId}")['data'];

        // dd($response);
        return Util::convertToShippiiObject(CarrierAccount::class, $response);
    }

    /**
     * Create Carrier Account.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function createCarrierAccount(array $payload): CarrierAccount
    {
        $response = $this->post('v1/carrier-account', $payload)['data'];

        return Util::convertToShippiiObject(CarrierAccount::class, $response);
    }

    /**
     * Update Carrier Account.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function updateCarrierAccount(string $carrierAccountId, array $payload): CarrierAccount
    {
        $response = $this->patch("v1/carrier-account/{$carrierAccountId}")['data'];

        return Util::convertToShippiiObject(CarrierAccount::class, $response);
    }

    /**
     * Delete Carrier Account.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function deleteCarrierAccount(string $carrierAccountId): CarrierAccount
    {
        $response = $this->delete("v1/carrier-account/{$carrierAccountId}")['data'];

        return Util::convertToShippiiObject(CarrierAccount::class, $response);
    }

    /**
     * Get Carrier Account Fields.
     *
     * @return CarrierAccountFields[]
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function getCarrierAccountFields(string $carrierCode): array
    {
        $response = $this->get("v1/carrier-account/fields/{$carrierCode}")['data'];

        return Util::convertToShippiiObjectCollection(CarrierAccountFields::class, $response);
    }
}
