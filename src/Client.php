<?php

declare(strict_types=1);

namespace Vship;

use GuzzleHttp\Client as HttpClient;
use Vship\Actions\ManageCarriers;
use Vship\Actions\ManageCarriersAccounts;
use Vship\Actions\ManageCountries;
use Vship\Actions\ManageInvoices;
use Vship\Actions\ManageLabels;
use Vship\Actions\ManageOrganisationObjects;
use Vship\Actions\ManageOrganisations;
use Vship\Actions\ManageShipments;
use Vship\Actions\ManageUsers;
use Vship\Actions\HandleWebhooks;

class Client
{
    use MakesHttpRequests;
    use ManageCarriers;
    use ManageCarriersAccounts;
    use ManageCountries;
    use ManageInvoices;
    use ManageLabels;
    use ManageOrganisationObjects;
    use ManageOrganisations;
    use ManageShipments;
    use ManageUsers;
    use HandleWebhooks;

    /**
     * Number of seconds a request is retried.
     */
    public int $timeout = 30;

    /**
     * The Client Key.
     */
    public string $apiKey;

    /**
     * The Guzzle HTTP Client instance.
     */
    public HttpClient $guzzle;

    /**
     * Base URL of Client API
     */
    public string $baseUrl;

    public const SANDBOX_URL = 'https://api-dev.vship.dev/';

    /**
     * Create a new Forge instance.
     */
    public function __construct(?string $apiKey = null, ?HttpClient $guzzle = null, ?string $baseUrl = self::SANDBOX_URL)
    {
        if ($apiKey !== null) {
            $this->setApiKey($apiKey, $baseUrl, $guzzle);
        }

        if (! is_null($guzzle)) {
            $this->guzzle = $guzzle;
        }
    }

    /**
     * Set a new timeout.
     *
     * @param  int  $timeout
     * @return $this
     */
    public function setTimeout($timeout): static
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * Get the timeout.
     *
     * @return int
     */
    public function getTimeout(): int
    {
        return $this->timeout;
    }

    /**
     * Set the api key and set up the guzzle request object.
     *
     * @return $this
     */
    public function setApiKey(string $apiKey, string $baseUrl, HttpClient $guzzle = null): static
    {
        $this->guzzle = $guzzle ?: new HttpClient([
            'base_uri' => $baseUrl,
            'http_errors' => false,
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);

        return $this;
    }

    /**
     * Prepare query parameters string.
     * @param array<string, int|string|float> $parameters
     */
    protected function prepareRequestParameters(array $parameters): string
    {
        $queryParameters = '';
        foreach ($parameters as $name => $value) {
            $queryParameters .= "{$name}={$value}&";
        }

        return $queryParameters;
    }
}
