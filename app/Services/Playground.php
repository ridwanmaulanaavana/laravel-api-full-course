<?php

namespace App;

use App\Services\Geolocation\Geolocation;
use App\Services\Geolocation\GeolocationFacade;

class playground{

    public function __construct(Geolocation $geolocation)
    {
        $result = GeolocationFacade::search('a');
        dump($result);
        //$golocation = app(Geolocation::class);

        
    }
}