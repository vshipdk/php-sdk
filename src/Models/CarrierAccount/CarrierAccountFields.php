<?php

declare(strict_types=1);

namespace Vship\SDK\Models\CarrierAccount;

final class CarrierAccountFields
{
    public ?string $label = null;

    public ?string $name = null;

    public ?bool $required = null;

    public ?bool $isSecret = null;

    public ?string $type = null;

    public ?string $placeholder = null;

    public ?string $description = null;

    /** @var array<string>|null */
    public ?array $options = null;

    /** @var array<string>|null */
    public ?array $selectOptions = null;

    public ?bool $isMultiple = null;

    public ?string $value = null;
}
