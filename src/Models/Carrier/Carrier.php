<?php

namespace Shippii\Models\Carrier;

use Shippii\Models\Carrier\Owner;
use Shippii\Models\Carrier\CarrierSettings;
use Shippii\Models\CarrierAccount\CarrierAccount;

final class Carrier
{
    public string|null $id = null;

    public Owner|null $owner = null;

    public string|null $name = null;

    public CarrierAccount|null $account = null;

    public string|null $code = null;

    public CarrierSettings|null $settings = null;

    public int|null $status = null;

    public string|null $created_at = null;

    public string|null $updated_at = null;
}
