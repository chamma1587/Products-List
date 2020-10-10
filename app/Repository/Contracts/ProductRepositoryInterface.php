<?php

namespace App\Repository\Contracts;

interface ProductRepositoryInterface
{  

    /**
     * @param Int $id
     * @return Array
     */
    public function getProductById($id);


    /**
     * @param Array $payload
     * @return Void
     */
    public function createProduct($payload);


    /**
     * @param String $search
     * @return Collection
     */
    public function getAllProduct($search);


    /**
     * @param String $refNumber
     * @return Array
     */
    public function updateProduct($payload, $id);

    /**
     * @param int $id
     * @return Void
     */
    public function deleteProduct($id);


}