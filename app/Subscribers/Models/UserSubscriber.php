<?php

namespace App\Subscribers\Models;

use App\Events\Models\Users\UserCreated;
use App\Listeners\SendWelcomeEmail;
use Illuminate\Bus\Dispatcher;

class UserSubsricber{
    public function subscribe(Dispatcher $events){
        //$events->listen(UserCreated::class,SendWelcomeEmail::class);
    }
}