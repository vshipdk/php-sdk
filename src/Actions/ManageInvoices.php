<?php

declare(strict_types=1);

namespace Shippii\Actions;

use GuzzleHttp\Exception\GuzzleException;
use Shippii\Exceptions\FailedActionException;
use Shippii\Exceptions\NotFoundException;
use Shippii\Exceptions\RateLimitExceededException;
use Shippii\Exceptions\ValidationException;
use Shippii\Models\Invoice\Invoice;
use Shippii\Util\Util;

trait ManageInvoices
{
    /**
     * Create an invoice.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function createConsolidateInvoice(array $payload): Invoice
    {
        $response = $this->post('v1/invoices/consolidate', $payload)['data'];

        return Util::convertToShippiObject(Invoice::class, $response);
    }
}
