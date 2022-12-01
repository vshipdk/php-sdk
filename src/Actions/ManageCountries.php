<?php
declare(strict_types=1);

namespace Shippii\Actions;

trait ManageCountries
{
    public function getCountries()
    {
        return $this->get('country');
    }
}