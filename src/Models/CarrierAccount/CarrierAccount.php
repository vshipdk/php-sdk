<?php
declare(strict_types=1);

namespace Shippii\Models\CarrierAccount;

use Shippii\Models\Organisation\Organisation;
use Shippii\Models\Carrier\Carrier;

final class CarrierAccount
{
    public string|null $id = null;
    public string|null $name = null;
    /** @var CarrierAccountFields[]|null */
    public array|null $fields = null;
    public string|null $carrier_code = null;
    public string|null $status = null;
    public string|null $purpose = null;
    /** @var Carrier[]|null */
    public array|null $carriers = null;
    public string|null $expires_at = null;
    public string|null $created_at = null;
    public string|null $updated_at = null;
}
