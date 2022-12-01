<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Resources\User;

trait ManageUsers
{
    public function listUsers(array $parameters)
    {
        $parameters = $this->prepareRequestParameters($parameters);
        $response = $this->get("user?{$parameters}");

        return $this->transformCollection(
            collection: $response['data'],
            class: User::class,
            meta: $response['meta'],
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
        return $this->delete("user/{$userId}");
    }

    public function sendResetUserPasswordLink(array $payload)
    {
        return $this->post("user-password/reset", $payload);
    }
}