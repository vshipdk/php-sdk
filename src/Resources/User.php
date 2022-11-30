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

    public function index(string $parameters = '')
    {
        return $this->shippii->listUsers($parameters);
    }

    public function create()
    {
        return $this->shippii->createUser($this);
    }

    public function get()
    {
        return $this->shippii->getUser($this);
    }

    public function update()
    {
        return $this->shippii->updateUser($this);
    }

    public function delete()
    {
        return $this->shippii->deleteUser($this);
    }

    public function sendResetPasswordLink()
    {
        return $this->shippii->sendResetUserPasswordLink($this);
    }
}