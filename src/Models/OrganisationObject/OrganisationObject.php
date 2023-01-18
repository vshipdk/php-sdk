<?php
declare(strict_types=1);

namespace Shippii\Models\OrganisationObject;

use Shippii\Models\Adderess\Address;
use Shippii\Models\Organisation\Organisation;

final class OrganisationObject
{
    public string|null $id = null;
    public string|null $name = null;
    public string|null $organisationId = null;
    public string|null $currency = null;
    public string|null $timezone = null;
    /** @var array<string> */
    public array|null $settings = null;
    public string|null $createdAt = null;
    public string|null $updatedAt = null;
    public Organisation|null $organisation = null;
    /** @var Address[]| null */
    public array|null $addresses = null;
}