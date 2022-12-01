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

    public function index(array $parameters = []): array
    {
        return $this->shippii->listUsers($parameters);
    }

    public function create(): self
    {
        $payload = $this->preparePayload(['first_name', 'last_name', 'email', 'phone', 'role', 'timezone', 'locale']);

        return $this->shippii->createUser($payload);
    }

    public function get(): self
    {
        return $this->shippii->getUser($this->id);
    }

    public function update(): self
    {
        $payload = $this->preparePayload(['first_name', 'last_name', 'email', 'phone', 'role', 'timezone', 'locale']);

        return $this->shippii->updateUser($this->id, $payload);
    }

    public function delete(): void
    {
        $this->shippii->deleteUser($this->id);
    }

    public function sendResetPasswordLink(): void
    {
        $payload = $this->preparePayload(['email']);

        $this->shippii->sendResetUserPasswordLink($payload);
    }
}