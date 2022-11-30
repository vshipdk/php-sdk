<?php

namespace Shippii\Resources;

class Country extends Resource
{
    public function index()
    {
        return $this->shippii->getCountries();
    }
}