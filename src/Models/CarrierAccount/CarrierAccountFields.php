<?php
declare(strict_types=1);

namespace Shippii\Models\CarrierAccount;

final class CarrierAccountFields
{
    public string|null $label = null;
    public string|null $name = null;
    public bool|null $required = null;
    public bool|null $isSecret = null;
    public string|null $type = null;
    public string|null $placeholder = null;
    public string|null $description = null;
    public CarrierAccountFieldsOptions|null $options = null; // TODO:
    public CarrierAccountFieldsOptions|null $selectOptions = null; // TODO:
    public bool|null $isMultiple = null;
    public string|null $value = null;
}
