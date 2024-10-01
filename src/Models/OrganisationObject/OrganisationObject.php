<?php

declare(strict_types=1);

namespace Vship\SDK\Models\OrganisationObject;

use Vship\SDK\Models\Address\Address;
use Vship\SDK\Models\Organisation\Organisation;

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
