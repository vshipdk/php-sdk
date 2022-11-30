<?php

namespace Shippii\Actions;

use http\Exception\BadUrlException;
use Shippii\Resources\User;

trait ManageUsers
{
    public function listUsers(string $parameters)
    {
        return $this->get("user?{$parameters}");
    }

    public function createUser(User $user)
    {
        $payload = [
            'first_name' => $user->firstName,
            'last_name' => $user->lastName,
            'email' => $user->email,
            'phone' => $user->phone,
            'role' => $user->role,
            'timezone' => $user->timezone,
            'locale' => $user->locale,
        ];

        return $this->post('user', $payload);
    }

    public function getUser(User $user)
    {
        return $this->get("user/{$user->id}");
    }

    public function updateUser(User $user)
    {
        $payload = [
            'email' => $user->email,
        ];

        return $this->patch("user/{$user->id}", $payload);
    }

    public function deleteUser(User $user)
    {
        return $this->delete("user/{$user->id}");
    }

    public function sendResetUserPasswordLink(User $user)
    {
        $payload = [
            'first_name' => $user->firstName,
            'last_name' => $user->lastName,
            'email' => $user->email,
            'phone' => $user->phone,
            'role' => $user->role,
            'timezone' => $user->timezone,
            'locale' => $user->locale,
        ];

        return $this->post("user-password/reset", $payload);
    }
}