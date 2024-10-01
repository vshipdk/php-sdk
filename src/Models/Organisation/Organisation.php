<?php

declare(strict_types=1);

namespace Vship\SDK\Models\Organisation;

use Vship\SDK\Models\Address\Address;

final class Organisation
{
    public ?string $id = null;

    public ?Owner $owner = null;

    public ?string $name = null;

    public ?string $vat_number = null;

    public ?string $company_number = null;

    public ?bool $vat_registered = null;

    public ?string $currency = null;

    public ?string $timezone = null;

    public ?OrganisationSettings $settings = null;

    public ?string $created_at = null;

    public ?string $updated_at = null;

    /** @var Address[]|null */
    public ?array $addresses = null;
}
