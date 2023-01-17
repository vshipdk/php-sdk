<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Util\Util;
use Shippii\Models\CarrierAccount\CarrierAccount;

trait ManageCarriersAccounts
{
    /**
     * Get All Carrier Accounts
     *
     * @param array $queryParams
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getCarrierAccounts(array $queryParams = []): array
    {
        $parameters = $this->prepareRequestParameters($queryParams);
        $response = $this->get("v1/carrier-account?{$parameters}")['data'];

        return Util::convertToShippiObjectCollection(CarrierAccount::class, $response);
    }

    /**
     * Get Single Carrier Account by ID
     *
     * @param string $carrierAccountId
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getCarrierAccount(string $carrierAccountId): mixed
    {
        $response = $this->get("v1/carrier-account/{$carrierAccountId}")['data'];
        return Util::convertToShippiObject(CarrierAccount::class, $response);
    }

    /**
     * Create Carrier Account
     *
     * @param array $payload
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function createCarrierAccount(array $payload): mixed
    {
        $response = $this->post("v1/carrier-account", $payload)['data'];
        return Util::convertToShippiObject(CarrierAccount::class, $response);
    }

    /**
     * Update Carrier Account
     *
     * @param string $carrierAccountId
     * @param array $payload
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function updateCarrierAccount(string $carrierAccountId, array $payload): mixed
    {
        $response = $this->patch("v1/carrier-account/{$carrierAccountId}")['data'];
        return Util::convertToShippiObject(CarrierAccount::class, $response);
    }

    /**
     * Delete Carrier Account
     *
     * @param string $carrierAccountId
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function deleteCarrierAccount(string $carrierAccountId): array
    {
        $response = $this->delete("v1/carrier-account/{$carrierAccountId}")['data'];
        return Util::convertToShippiObject(CarrierAccount::class, $response);
    }

    // TODO:
    /**
     * Get Carrier Account Fields
     *
     * @param string $carrierCode
     * @return CarrierAccount
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getCarrierAccountFields(string $carrierCode): CarrierAccount
    {
        $attributes = [
            'fields' => $this->get("v1/carrier-account/fields/{$carrierCode}")['data'],
            'carrier_code' => $carrierCode,
        ];

        return new CarrierAccount($attributes, $this);
    }
}