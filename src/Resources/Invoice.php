<?php

declare(strict_types=1);

namespace Vship\Resources;

use GuzzleHttp\Exception\GuzzleException;
use Vship\Exceptions\FailedActionException;
use Vship\Exceptions\NotFoundException;
use Vship\Exceptions\RateLimitExceededException;
use Vship\Exceptions\ValidationException;

class Invoice extends BaseResource
{
    /** @var string[] */
    public array $shipments;

    public ?float $discount = null;

    /** @var array<string, mixed> */
    public array $senderData;

    /** @var array<string, mixed> */
    public array $vatAgent;

    public string $invoiceLanguage;

    public string $declarationOfOrigin;

    /**
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function create(): \Vship\Models\Invoice\Invoice
    {
        $payload = $this->preparePayload(['shipments', 'discount', 'sender_data', 'vat_agent', 'invoice_language', 'declaration_of_origin']);

        return $this->client->createConsolidateInvoice($payload);
    }
}
