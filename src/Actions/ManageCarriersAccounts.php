<?php

declare(strict_types=1);

namespace Vship\SDK\Actions;

use GuzzleHttp\Exception\GuzzleException;
use Vship\SDK\Exceptions\FailedActionException;
use Vship\SDK\Exceptions\NotFoundException;
use Vship\SDK\Exceptions\RateLimitExceededException;
use Vship\SDK\Exceptions\ValidationException;
use Vship\SDK\Models\CarrierAccount\CarrierAccount;
use Vship\SDK\Models\CarrierAccount\CarrierAccountFields;
use Vship\SDK\Util\Util;

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

        return Util::convertToVshipObjectCollection(CarrierAccount::class, $response);
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
        return Util::convertToVshipObject(CarrierAccount::class, $response);
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

        return Util::convertToVshipObject(CarrierAccount::class, $response);
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

        return Util::convertToVshipObject(CarrierAccount::class, $response);
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

        return Util::convertToVshipObject(CarrierAccount::class, $response);
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

        return Util::convertToVshipObjectCollection(CarrierAccountFields::class, $response);
    }
}
