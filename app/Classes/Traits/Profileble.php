<?php

namespace App\Classes\Traits;

use Client;

trait Profileble
{
	/**
     * Get profile of customer
     * 
     * @return array
     */
    public function profile()
    {
        return Client::setEndpoint('profile')
            ->setHeaders(['Authorization' => session('authenticate.token')])
            ->get()['contents'];
    }
}