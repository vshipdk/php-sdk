<?php

declare(strict_types=1);

namespace Vship\Actions;

use GuzzleHttp\Exception\GuzzleException;
use Vship\Exceptions\FailedActionException;
use Vship\Exceptions\NotFoundException;
use Vship\Exceptions\RateLimitExceededException;
use Vship\Exceptions\ValidationException;
use Vship\Models\User\User;
use Vship\Util\Util;

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

        return Util::convertToVshipObjectCollection(User::class, $response);
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

        return Util::convertToVshipObject(User::class, $response);
    }
}
