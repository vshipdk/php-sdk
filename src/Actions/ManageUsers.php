<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Models\User\User;
use Shippii\Util\Util;

trait ManageUsers
{
    /**
     * Get All Users
     *
     * @param array $parameters
     * @return User[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getUsers(array $parameters = []): array
    {
        $parameters = $this->prepareRequestParameters($parameters);
        $response = $this->get("v1/user?{$parameters}")['data'];
        return Util::convertToShippiiObjectCollection(User::class, $response);
    }

    /**
     * Get Single User
     *
     * @param string $userId
     * @return User
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getUser(string $userId): User
    {
        $response = $this->get("v1/user/{$userId}")['data'];

        return Util::convertToShippiiObject(User::class, $response);
    }
}