<?php

declare(strict_types=1);

namespace Shippii\Actions;

use GuzzleHttp\Exception\GuzzleException;
use Shippii\Exceptions\FailedActionException;
use Shippii\Exceptions\NotFoundException;
use Shippii\Exceptions\RateLimitExceededException;
use Shippii\Exceptions\ValidationException;
use Shippii\Models\User\User;
use Shippii\Util\Util;

trait ManageUsers
{
    /**
     * Get All Users.
     *
     * @return User[]
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function getUsers(array $parameters = []): array
    {
        $parameters = $this->prepareRequestParameters($parameters);
        $response = $this->get("v1/user?{$parameters}")['data'];

        return Util::convertToShippiiObjectCollection(User::class, $response);
    }

    /**
     * Get Single User.
     *
     * @throws GuzzleException
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function getUser(string $userId): User
    {
        $response = $this->get("v1/user/{$userId}")['data'];

        return Util::convertToShippiiObject(User::class, $response);
    }
}
