<?php

declare(strict_types=1);

namespace Shippii\Resources;

class User extends Resource
{
    public ?string $id;

    public ?string $firstName = null;

    public ?string $lastName = null;

    public ?string $email = null;

    public ?string $phone = null;

    public ?string $role = null;

    public ?string $timezone = null;

    public ?string $locale = null;

    public ?string $mobileRaw;

    public ?string $mobileE164;

    public ?string $mobileNational;

    public ?string $createdAt;

    public ?string $updateAt;
}
