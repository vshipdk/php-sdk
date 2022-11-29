<?php

namespace Shippii\Actions;

trait ManageCountries
{
    public function getCountries()
    {
        return $this->get('country');
    }
}