<?php
declare(strict_types=1);

namespace Shippii\Actions;

use Shippii\Resources\Country;

trait ManageCountries
{
    public function getCountries()
    {
        return $this->transformCollection(
            collection: ['data'],
            class: Country::class,
        );
    }
}