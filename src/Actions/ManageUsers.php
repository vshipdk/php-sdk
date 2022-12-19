<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Resources\User;

trait ManageUsers
{
    /**
     * Get All Users
     *
     * @param array $parameters
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Shippii\Exceptions\FailedActionException
     * @throws \Shippii\Exceptions\NotFoundException
     * @throws \Shippii\Exceptions\RateLimitExceededException
     * @throws \Shippii\Exceptions\ValidationException
     */
    public function getUsers(array $parameters = []): array
    {
        $parameters = $this->prepareRequestParameters($parameters);
        $response = $this->get("v1/user?{$parameters}");

        return $this->transformCollection(
            collection: $response['data'],
            class: User::class,
            meta: $response['meta'],
        );
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
        return new User($this->get("v1/user/{$userId}")['data'], $this);
    }
}