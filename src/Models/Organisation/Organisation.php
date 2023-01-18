<?php
declare(strict_types=1);

namespace Shippii\Models\Organisation;

use Shippii\Models\Address\Address;

final class Organisation
{
    public string|null $id = null;
    public Owner|null $owner = null;
    public string|null $name = null;
    public string|null $vat_number = null;
    public string|null $company_number = null;
    public bool|null $vat_registered = null;
    public string|null $currency = null;
    public string|null $timezone = null;
    public OrganisationSettings|null $settings = null;
    public string|null $created_at = null;
    public string|null $updated_at = null;
    /** @var Address[]|null */
    public array|null $addresses = null;
}
