<?php

declare(strict_types=1);

namespace Vship\Actions;

use GuzzleHttp\Exception\GuzzleException;
use Vship\Exceptions\FailedActionException;
use Vship\Exceptions\NotFoundException;
use Vship\Exceptions\RateLimitExceededException;
use Vship\Exceptions\ValidationException;
use Vship\Models\Invoice\Invoice;
use Vship\Util\Util;

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

        return Util::convertToVshipObject(Invoice::class, $response);
    }
}
