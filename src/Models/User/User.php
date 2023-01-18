<?php
declare(strict_types=1);

namespace Shippii\Models\User;

use Shippii\Models\Organisation\Organisation;

final class User
{
    public string|null $id = null;
    public string|null $firstName = null;
    public string|null $lastName = null;
    public string|null $email = null;
    public string|null $mobileE164 = null;
    public string|null $mobileNational = null;
    public string|null $mobileRaw = null;
    public string|null $role = null;
    public string|null $timezone = null;
    public string|null $locale = null;
    public string|null $createdAt = null;
    public string|null $updatedAt = null;
    /** @var Organisation[]|null  */
    public array|null $organisations = null;
}