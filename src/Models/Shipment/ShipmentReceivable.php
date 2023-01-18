<?php
declare(strict_types=1);

namespace Shippii\Models\Shipment;

final class ShipmentReceivable
{
    public string|null $id = null;
    public string|null $userId = null;
    public string|null $firstName = null;
    public string|null $lastName = null;
    public string|null $email = null;
    public string|null $mobilePhoneE164 = null;
    public string|null $mobilePhoneNational = null;
    public string|null $mobilePhoneRaw = null;
    public string|null $registeredAt = null;
    public string|null $createdAt = null;
    public string|null $updatedAt = null;
}