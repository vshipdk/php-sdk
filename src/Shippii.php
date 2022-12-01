<?php
declare(strict_types=1);

namespace Shippii;

use GuzzleHttp\Client as HttpClient;
use Shippii\Actions\ManageCarriers;
use Shippii\Actions\ManageCarriersAccounts;
use Shippii\Actions\ManageCountries;
use Shippii\Actions\ManageLabels;
use Shippii\Actions\ManageOrganisationObjects;
use Shippii\Actions\ManageOrganisations;
use Shippii\Actions\ManageShipments;
use Shippii\Actions\ManageUsers;

class Shippii
{
    use MakesHttpRequests,
        ManageCountries,
        ManageShipments,
        ManageCarriersAccounts,
        ManageCarriers,
        ManageUsers,
        ManageOrganisations,
        ManageLabels,
        ManageOrganisationObjects;

    /**
     * Number of seconds a request is retried.
     *
     * @var int
     */
    public $timeout = 30;

    /**
     * Create a new Forge instance.
     *
     * @param string $apiKey
     * @param string $apiHost
     */
    public function __construct(
        protected string $apiKey,
        protected string $apiHost,
    ) {
        $this->setApiKey();
    }

    /**
     * Set a new timeout.
     *
     * @param  int  $timeout
     * @return $this
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * Get the timeout.
     *
     * @return int
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * Set the api key and setup the guzzle request object.
     *
     * @return $this
     */
    protected function setApiKey()
    {
        $this->guzzle = new HttpClient([
            'base_uri' => "{$this->apiHost}/v1/",
            'http_errors' => false,
            'headers' => [
                'Authorization' => 'Bearer '.$this->apiKey,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);

        return $this;
    }

    /**
     * Transform the items of the collection to the given class.
     *
     * @param  array  $collection
     * @param  string  $class
     * @param  array  $extraData
     * @return array
     */
    protected function transformCollection($collection, $class, $extraData = [])
    {
        return array_map(function ($data) use ($class, $extraData) {
            if (is_array($data)) {
                return new $class($data + $extraData, $this);
            }
        }, $collection);
    }

    /**
     * Prepare query parameters string
     *
     * @param array $parameters
     * @return string
     */
    protected function prepareRequestParameters(array $parameters): string
    {
        $queryParameters = '';
        foreach ($parameters as $name => $value)
        {
            $queryParameters .= "{$name}={$value}&";
        }

        return $queryParameters;
    }
}