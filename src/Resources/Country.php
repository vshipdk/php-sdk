<?php

declare(strict_types=1);

namespace Vship\Resources;

class Country extends BaseResource
{
    public ?string $name = null;

    public ?string $officialStateName = null;

    public ?string $alpha2Code = null;

    public ?string $alpha3Code = null;

    public ?string $numericCode = null;
}
