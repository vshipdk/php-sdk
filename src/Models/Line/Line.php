<?php
declare(strict_types=1);

namespace Shippii\Models\Line;

final class Line
{
    public string|null $id = null;
    public string|null $name = null;
    public string|null $sku = null;
    public float|null $qty = null;
    public float|null $weight = null;
    public float|null $totalWeight = null;
    public float|null $volume = null;
    public float|null $totalVolume = null;
    public string|null $tariffCode = null;
    public string|null $harmonizationCode = null;
    public string|null $countryOfOrigin = null;
    public string|null $countryOfDeclaration = null;
}