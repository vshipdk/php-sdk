<?php

declare(strict_types=1);

namespace Shippii;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Shippii\Exceptions\FailedActionException;
use Shippii\Exceptions\NotFoundException;
use Shippii\Exceptions\RateLimitExceededException;
use Shippii\Exceptions\TimeoutException;
use Shippii\Exceptions\ValidationException;

trait MakesHttpRequests
{
    /**
     * Make a GET request to Shippii API and return the response.
     *
     * @throws FailedActionException
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function get(string $uri): mixed
    {
        return $this->request('GET', $uri);
    }

    /**
     * Make a POST request to Shippii API and return the response.
     *
     * @throws FailedActionException
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function post(string $uri, array $payload = []): mixed
    {
        return $this->request('POST', $uri, $payload);
    }

    /**
     * Make a PUT request to Shippii API and return the response.
     *
     * @throws FailedActionException
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function put(string $uri, array $payload = []): mixed
    {
        return $this->request('PUT', $uri, $payload);
    }

    /**
     * Make a PATCH request to Shippii API and return the response.
     *
     * @throws FailedActionException
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function patch(string $uri, array $payload = []): mixed
    {
        return $this->request('PATCH', $uri, $payload);
    }

    /**
     * Make a DELETE request to Shippii API and return the response.
     *
     * @throws FailedActionException
     * @throws GuzzleException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     */
    public function delete(string $uri, array $payload = []): mixed
    {
        return $this->request('DELETE', $uri, $payload);
    }

    /**
     * Retry the callback or fail after x seconds.
     *
     * @throws TimeoutException
     */
    public function retry(int $timeout, callable $callback, int $sleep = 5): mixed
    {
        $start = time();

        beginning:

        if ($output = $callback()) {
            return $output;
        }

        if (time() - $start < $timeout) {
            sleep($sleep);

            goto beginning;
        }

        if ($output === null || $output === false) {
            $output = [];
        }

        if (! is_array($output)) {
            $output = [$output];
        }

        throw new TimeoutException($output);
    }

    /**
     * Make request to Shippii API and return the response.
     *
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws RateLimitExceededException
     * @throws ValidationException
     * @throws GuzzleException
     */
    protected function request(string $verb, string $uri, array $payload = []): mixed
    {
        if (isset($payload['json'])) {
            $payload = ['json' => $payload['json']];
        } else {
            $payload = empty($payload) ? [] : ['json' => $payload];
        }

        $response = $this->guzzle->request($verb, $uri, $payload);

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
            $this->handleRequestError($response);
        }

        $responseBody = (string) $response->getBody();

        return json_decode($responseBody, true) ?: $responseBody;
    }

    /**
     * Handle the request error.
     *
     * @throws \Exception
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws ValidationException
     * @throws RateLimitExceededException
     */
    protected function handleRequestError(ResponseInterface $response): void
    {
        if ($response->getStatusCode() == 422) {
            $body = (string) $response->getBody();
            throw new ValidationException(json_decode($body, true), $body);
        }

        if ($response->getStatusCode() == 404) {
            throw new NotFoundException;
        }

        if ($response->getStatusCode() == 400) {
            throw new FailedActionException((string) $response->getBody());
        }

        if ($response->getStatusCode() === 429) {
            throw new RateLimitExceededException($response->hasHeader('x-ratelimit-reset') ? (int) $response->getHeader('x-ratelimit-reset')[0] : null);
        }

        throw new \Exception((string) $response->getBody());
    }
}
