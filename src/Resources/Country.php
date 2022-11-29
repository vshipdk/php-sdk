<?php

namespace Shippii\Resources;

class Country extends Resource
{
    public function getAll()
    {
        return $this->shippii->getCountries();
    }
}