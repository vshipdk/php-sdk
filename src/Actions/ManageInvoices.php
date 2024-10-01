<?php

declare(strict_types=1);

namespace Vship\SDK\Actions;

use GuzzleHttp\Exception\GuzzleException;
use Vship\SDK\Exceptions\FailedActionException;
use Vship\SDK\Exceptions\NotFoundException;
use Vship\SDK\Exceptions\RateLimitExceededException;
use Vship\SDK\Exceptions\ValidationException;
use Vship\SDK\Models\Invoice\Invoice;
use Vship\SDK\Util\Util;

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
