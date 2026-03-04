<?php

declare(strict_types=1);

namespace Vship\Resources;

class User extends BaseResource
{
    public ?string $id = null;

    public ?string $firstName = null;

    public ?string $lastName = null;

    public ?string $email = null;

    public ?string $phone = null;

    public ?string $role = null;

    public ?string $timezone = null;

    public ?string $locale = null;

    public ?string $mobileRaw = null;

    public ?string $mobileE164 = null;

    public ?string $mobileNational = null;

    public ?string $createdAt = null;

    public ?string $updateAt = null;
}
