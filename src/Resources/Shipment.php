<?php

declare(strict_types=1);

namespace Vship\Resources;

use GuzzleHttp\Exception\GuzzleException;
use Vship\Exceptions\FailedActionException;
use Vship\Exceptions\NotFoundException;
use Vship\Exceptions\RateLimitExceededException;
use Vship\Exceptions\ValidationException;

class Shipment extends BaseResource
{
    public const OBJECT_NAME = 'shipment';

    public string $id;

    public int $type;

    public ?string $carrierId = null;

    /** @var array<string, mixed> */
    public array $sender;

    /** @var array<string, mixed>|null */
    public ?array $receiver = null;

    /** @var array<int, array<string, mixed>>|null */
    public ?array $lines = null;

    /** @var array<string, mixed> */
    public array $carrierOptions;

    public string $state;

    public ?string $rateId = null;

    public ?string $creatorId = null;

    public ?string $creatorType = null;

    public ?string $sendableId = null;

    public ?string $sendableAddressId = null;

    public ?string $receivableId = null;

    public ?string $receivableAddressId = null;

    public ?string $sendableReference = null;

    public ?string $carrierIdentification = null;

    public ?string $createdAt = null;

    public ?string $updatedAt = null;

    /**
     * Create shipment.
     *
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function create(): \Vship\Models\Shipment\Shipment
    {
        $payload = $this->preparePayload(['type', 'carrier_id', 'sender', 'receiver', 'lines', 'carrier_options']);

        return $this->client->createShipment($payload);
    }

    /**
     * Archive shipment.
     *
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function archive(): void
    {
        $this->client->archiveShipment($this->id);
    }
}
