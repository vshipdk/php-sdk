<?php

declare(strict_types=1);

namespace Shippii\Models\Country;

final class Country
{
    public ?string $name = null;

    public ?string $official_state_name = null;

    public ?string $alpha_2_code = null;

    public ?string $alpha_3_code = null;

    public ?string $numeric_code = null;
}
