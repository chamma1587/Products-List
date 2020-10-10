<?php
namespace App\Repository;

use App\Models\Admin;
use App\Models\Customer;
use App\Repository\Contracts\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface
{
    /**
     * @param Array $payload
     * @return Void
    */
    public function registerCustomer($payload){
        Customer::create($payload);
    }



    /**
     * @param Array $payload
     * @return Void
    */
    public function registerAdmin($payload){
        Admin::create($payload);
    }  

    
}