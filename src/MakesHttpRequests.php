<?php

declare(strict_types=1);

namespace Vship;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Vship\Exceptions\FailedActionException;
use Vship\Exceptions\NotFoundException;
use Vship\Exceptions\RateLimitExceededException;
use Vship\Exceptions\TimeoutException;
use Vship\Exceptions\ValidationException;

trait MakesHttpRequests
{
    /**
     * Make a GET request to Client API and return the response.
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
     * Make a POST request to Client API and return the response.
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
     * Make a PUT request to Client API and return the response.
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
     * Make a PATCH request to Client API and return the response.
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
     * Make a DELETE request to Client API and return the response.
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
     * Make request to Client API and return the response.
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
            throw new NotFoundException();
        }

        if ($response->getStatusCode() == 400) {
            throw $this->buildFailedActionException($response);
        }

        if ($response->getStatusCode() === 429) {
            throw new RateLimitExceededException($response->hasHeader('x-ratelimit-reset') ? (int) $response->getHeader('x-ratelimit-reset')[0] : null);
        }

        throw new \Exception((string) $response->getBody());
    }

    private function buildFailedActionException(ResponseInterface $response): FailedActionException
    {
        $body = (string) $response->getBody();
        $json = json_decode($body, true);
        $messages = [];
        if (isset($json['data']['message'])) {
            $messages[] = $json['data']['message'];
        }
        foreach ($json['data']['errors'] as $error) {
            $messages[] = $error['carrierMessage'];
        }

        return new FailedActionException($messages, $body);
    }
}
