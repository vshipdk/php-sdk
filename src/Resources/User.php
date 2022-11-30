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

    public function index(array $parameters = [])
    {
        $parameters = $this->prepareParameters($parameters);

        return $this->shippii->listUsers($parameters);
    }

    public function create()
    {
        $payload = $this->preparePayload(['first_name', 'last_name', 'email', 'phone', 'role', 'timezone', 'locale']);

        return $this->shippii->createUser($payload);
    }

    public function get()
    {
        return $this->shippii->getUser($this->id);
    }

    public function update()
    {
        $payload = $this->preparePayload(['first_name', 'last_name', 'email', 'phone', 'role', 'timezone', 'locale']);

        return $this->shippii->updateUser($this->id, $payload);
    }

    public function delete()
    {
        return $this->shippii->deleteUser($this->id);
    }

    public function sendResetPasswordLink()
    {
        $payload = $this->preparePayload(['email']);

        return $this->shippii->sendResetUserPasswordLink($payload);
    }
}