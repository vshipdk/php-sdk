<?php
declare(strict_types=1);

namespace Shippii;

use GuzzleHttp\Client as HttpClient;
use Shippii\Actions\ManageCarriers;
use Shippii\Actions\ManageCarriersAccounts;
use Shippii\Actions\ManageCountries;
use Shippii\Actions\ManageShipments;
use Shippii\Resources\User;

class Shippii
{
    use MakesHttpRequests,
        ManageCountries,
        ManageShipments,
        ManageCarriersAccounts,
        ManageCarriers;

    /**
     * Number of seconds a request is retried.
     *
     * @var int
     */
    public $timeout = 30;

    /**
     * Create a new Forge instance.
     *
     * @param string          $apiKey
     * @param string          $apiHost
     * @param HttpClient|null $guzzle
     */
    public function __construct(
        protected string $apiKey,
        protected string $apiHost,
        public HttpClient|null $guzzle = null,
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
     * Get an authenticated user instance.
     *
     * @return User
     */
    public function user()
    {
        return new User($this->get('user')['user']);
    }

    /**
     * Set the api key and setup the guzzle request object.
     *
     * @return $this
     */
    protected function setApiKey()
    {
        $this->guzzle = $this->guzzle ?: new HttpClient([
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
            return new $class($data + $extraData, $this);
        }, $collection);
    }
}