<?php

declare(strict_types=1);

namespace Shippii\Resources;

class Country extends Resource
{
    public ?string $name;

    public ?string $officialStateName;

    public ?string $alpha2Code;

    public ?string $alpha3Code;

    public ?string $numericCode;
}
