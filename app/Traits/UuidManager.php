<?php

namespace App\Traits;

use Webpatser\Uuid\Uuid;

/**
 * Class UuidManager
 * @package App\Traits
 *
 *  manage uuid tokens
 */
trait UuidManager
{

    public static function generateUuid()
    {
        return Uuid::generate();
    }   
   

}