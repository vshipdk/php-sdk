<?php
declare(strict_types=1);

namespace Shippii\Models\OrganisationObject;

use Shippii\Models\Address\Address;
use Shippii\Models\Organisation\Organisation;

final class OrganisationObject
{
    public string|null $id = null;
    public string|null $name = null;
    public Organisation|null $organisation = null;
    public string|null $currency = null;
    public string|null $timezone = null;
    public OrganisationObjectSettings|null $settings = null;
    public string|null $created_at = null;
    public string|null $updated_at = null;
    /** @var Address[]|null */
    public array|null $addresses = null;
}
