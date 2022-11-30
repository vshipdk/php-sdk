<?php

namespace Shippii\Actions;

trait ManageUsers
{
    public function listUsers(string $parameters)
    {
        return $this->get("user?{$parameters}");
    }

    public function createUser(array $payload)
    {
        return $this->post('user', $payload);
    }

    public function getUser(string $userId)
    {
        return $this->get("user/{$userId}");
    }

    public function updateUser(string $userId, array $payload)
    {
        return $this->patch("user/{$userId}", $payload);
    }

    public function deleteUser(string $userId)
    {
        return $this->delete("user/{$userId}");
    }

    public function sendResetUserPasswordLink(array $payload)
    {
        return $this->post("user-password/reset", $payload);
    }
}