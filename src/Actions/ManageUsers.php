<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Resources\User;

trait ManageUsers
{
    public function listUsers(array $parameters)
    {
        $parameters = $this->prepareRequestParameters($parameters);

        return $this->transformCollection(
            collection: $this->get("user?{$parameters}")['data'],
            class: User::class,
        );
    }

    public function createUser(array $payload)
    {
        return new User($this->post('user', $payload)['data'], $this);
    }

    public function getUser(string $userId)
    {
        return new User($this->get("user/{$userId}")['data'], $this);
    }

    public function updateUser(string $userId, array $payload)
    {
        return new User($this->patch("user/{$userId}", $payload)['data'], $this);
    }

    public function deleteUser(string $userId)
    {
        $this->delete("user/{$userId}");
    }

    public function sendResetUserPasswordLink(array $payload)
    {
        $this->post("user-password/reset", $payload);
    }
}