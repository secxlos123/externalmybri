<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use GuzzleHttp\Client;

if (! function_exists('getCustomer')) {

    /**
     * GET UserLogin Data.
     *
     * @return object
     */
    function getCustomer(){
        $data = session()->get('authenticate');
        return $data;
    }
}


if (! function_exists('is_read')) {

    /**
     * GET UserLogin Data.
     *
     * @return object
     */
    function is_read(){
        $data = session()->get('authenticate');

        return json_encode( ['id' => $data['user_id'] ,'role'=> $data['role'] ,'name'=> $data['fullname']] );
    }
}



if (! function_exists('notificationsUnread')) {
    /**
     * Get logged user info.
     *
     * @param  integer $value
     * @return mixed
     */
    function notificationsUnread()
    {
        $data = session()->get('authenticate');
        $NotificationDataUnread = \Client::setEndpoint('users/notification/unread')
                ->setHeaders([
                    'Authorization' => $data['token']//session()->get('_token')
                    , 'role' => $data['role']
                    , 'userid' => $data['user_id']
                ])->get();
        $ArrnotificationUnread = [];
        if(isset($NotificationDataUnread['contents'])){
            $ArrnotificationUnread = $NotificationDataUnread['contents'];
        }

        session()->put('notificationsUnread', $ArrnotificationUnread);

        return $ArrnotificationUnread;
    }
}