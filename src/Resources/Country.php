<?php
declare(strict_types=1);

namespace Shippii\Resources;

class Country extends Resource
{
    public string|null $name;
    public string|null $officialStateName;
    public string|null $alpha2Code;
    public string|null $alpha3Code;
    public string|null $numericCode;
}