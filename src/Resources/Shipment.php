<?php

declare(strict_types=1);

namespace Shippii\Resources;

use GuzzleHttp\Exception\GuzzleException;
use Shippii\Exceptions\FailedActionException;
use Shippii\Exceptions\NotFoundException;
use Shippii\Exceptions\RateLimitExceededException;
use Shippii\Exceptions\ValidationException;

class Shipment extends Resource
{
    public const OBJECT_NAME = 'shipment';

    public string $id;

    public int $type;

    public ?string $carrierId;

    public array $sender;

    public ?array $receiver = null;

    public ?array $lines = null;

    public array $carrierOptions;

    public string $state;

    public ?string $rateId;

    public ?string $creatorId;

    public ?string $creatorType;

    public ?string $sendableId;

    public ?string $sendableAddressId;

    public ?string $receivableId;

    public ?string $receivableAddressId;

    public ?string $sendableReference;

    public ?string $carrierIdentification;

    public ?string $createdAt;

    public ?string $updatedAt;

    /**
     * Create shipment.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function create(): array
    {
        $payload = $this->preparePayload(['type', 'carrier_id', 'sender', 'receiver', 'lines', 'carrier_options']);

        return $this->shippii->createShipment($payload);
    }

    /**
     * Update Shipment.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function update(): array
    {
        $payload = $this->preparePayload(['receiver', 'lines']);

        return $this->shippii->updateShipment($this->id, $payload);
    }

    /**
     * Update the state of a shipment.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function updateState(): array
    {
        return $this->shippii->updateShipmentState($this->id, $this->state);
    }

    /**
     * Archive shipment.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function archive(): array
    {
        return $this->shippii->archiveShipment($this->id);
    }
}
