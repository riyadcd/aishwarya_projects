<?php

namespace App\Listeners;

use App\Event\FormData;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StoreData
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
     * @param  \App\Event\FormData  $event
     * @return void
     */
    public function handle(FormData $event)
    {
        $data =  $event->formdata;
        $storeData = DB::table('formdatas')->insert(['name' => $data->name ,'email' => $data->email , 'password' => $data->password , 'phonenumber' => $data->phonenumber]);
        return $storeData;
    }
}
