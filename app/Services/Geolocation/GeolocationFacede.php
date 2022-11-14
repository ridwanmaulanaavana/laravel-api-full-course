<?php

namespace App\Services\Geolocation;

use Illuminate\Support\Facades\Facade;
use App\Services\Geolocation\Geolocation;




class GeolocationFacade extends Facade{

    protected static function getFacadeAccessor()
    {
        //parent::getFacadeAccessor();
        return Geolocation::class;
    }

}