<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use GuzzleHttp\Client;


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
        try {
            $NotificationDataUnread = \Client::setEndpoint('users/notification/unread')
                    ->setHeaders([
                        'Authorization' => $data['token']//session()->get('_token')
                        , 'role' => $data['role']
                        , 'user_id' => $data['user_id']
                    ])->get();
            $ArrnotificationUnread = [];
            if(isset($NotificationDataUnread['contents'])){
                $ArrnotificationUnread = $NotificationDataUnread['contents'];
            }
           
            session()->put('notificationsUnread', $ArrnotificationUnread);
            
            return $ArrnotificationUnread;


        } catch (ClientException $e) {
            \Log::info(Psr7\str($e->getRequest()));
            if ($e->hasResponse()) {
                \Log::info(Psr7\str($e->getResponse()));
            }
        }
    }
}