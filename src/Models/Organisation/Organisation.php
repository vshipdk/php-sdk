<?php
declare(strict_types=1);

namespace Shippii\Models\Organisation;

final class Organisation
{
    public string|null $id = null;
    public Owner|null $owner = null;
    public string|null $name = null;
    public string|null $vatNumber = null;
    public string|null $companyNumber = null;
    public bool|null $vatRegistered = null;
    public string|null $currency = null;
    public string|null $timezone = null;
    public array|null $settings = null;
    public string|null $createdAt = null;
    public string|null $updatedAt = null;
    public string|null $addresses = null;
}
