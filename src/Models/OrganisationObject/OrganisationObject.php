<?php

declare(strict_types=1);

namespace Vship\Models\OrganisationObject;

use Vship\Models\Address\Address;
use Vship\Models\Organisation\Organisation;

final class OrganisationObject
{
    public ?string $id = null;

    public ?string $name = null;

    public ?Organisation $organisation = null;

    public ?string $currency = null;

    public ?string $timezone = null;

    public ?OrganisationObjectSettings $settings = null;

    public ?string $created_at = null;

    public ?string $updated_at = null;

    /** @var Address[]|null */
    public ?array $addresses = null;
}
