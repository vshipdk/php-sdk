<?php
declare(strict_types=1);

namespace Shippii\Models\CarrierAccount;

use Shippii\Models\Organisation\Organisation;

final class CarrierAccount
{
    public string|null $id = null;
    public string|null $name = null;
    public Organisation|null $organisation = null;
    public string|null $fields = null; // TODO
    public string|null $carrierCode = null;
    public string|null $status = null;
    public string|null $expiresAt = null;
    public string|null $createdAt = null;
    public string|null $updatedAt = null;
}
