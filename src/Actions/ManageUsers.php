<?php

declare(strict_types=1);

namespace Vship\SDK\Actions;

use GuzzleHttp\Exception\GuzzleException;
use Vship\SDK\Exceptions\FailedActionException;
use Vship\SDK\Exceptions\NotFoundException;
use Vship\SDK\Exceptions\RateLimitExceededException;
use Vship\SDK\Exceptions\ValidationException;
use Vship\SDK\Models\User\User;
use Vship\SDK\Util\Util;

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
