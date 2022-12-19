<?php
declare(strict_types=1);

namespace Shippii\Resources;

class User extends Resource
{
    public string|null $id;
    public string|null $firstName = null;
    public string|null $lastName = null;
    public string|null $email = null;
    public string|null $phone = null;
    public string|null $role = null;
    public string|null $timezone = null;
    public string|null $locale = null;
    public string|null $mobileRaw;
    public string|null $mobileE164;
    public string|null $mobileNational;
    public string|null $createdAt;
    public string|null $updateAt;
}