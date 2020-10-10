<?php

namespace App\Repository\Contracts;

interface AuthRepositoryInterface
{  

    /**
     * @param Array $payload
     * @return Void
    */
    public function registerCustomer($payload);



    /**
     * @param Array $payload
     * @return Void
    */
    public function registerAdmin($payload);


    


}