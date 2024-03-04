<?php

namespace App\Listeners;

use App\Event\UserInfo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\formdata;
use Mail;
class StoreUserInfo
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Event\UserInfo  $event
     * @return void
     */
    public function handle(UserInfo $event)
    {
        
        $userData = $event->user;

        Mail::send('MailText',$userData, function($message) use ($userData) {
            $message->to($userData['email']);
            $message->subject('Testing Mail');
        });
    }
}
