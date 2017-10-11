<?php

namespace App\Classes\Traits;

use Client;

trait Profileble
{
    /**
     * Avaliable status of user
     * 
     * @var array
     */
    protected $status = ['Belum Menikah' => 0, 'Menikah' => 1, 'Janda' => 2, 'Duda' => 2];

	/**
     * Get profile of user
     * 
     * @return array|null
     */
    public function profile()
    {
        $profile = Client::setEndpoint('profile')
            ->setHeaders(['Authorization' => session('authenticate.token')])
            ->get();

        return isset( $profile['contents'] ) ? $profile['contents'] : null ;
    }

    /**
     * Get profile of customer
     * 
     * @return array
     */
    public function customer()
    {
        $profile = $this->profile();
        $profile['personal'] = $this->personal($profile['personal']);
        return $profile;
    }

    /**
     * Get personal data of customer
     * 
     * @param  array  $data
     * @return array
     */
    public function personal(array $data)
    {
        $personal = [];
        foreach ($data as $key => $value) {
            $personal[$key] = $value;

            if ( in_array($key, ['birth_date', 'couple_birth_date']) ) {
                $personal[$key] = date('d-m-Y', strtotime($value));
            }

            if ('status' === $key) {
                $personal[$key] = $value ? $this->status[$value] : '';
            }
        }
        return $personal;
    }
}