<?php
namespace App\Repository;

use App\Models\Product;
use  App\Repository\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
   

     /**
     * @param Int $id
     * @return Array
     */
    public function getProductById($id){

       return Product::where('id', $id)    
        ->first();      
    }


    /**
     * @param Array $payload
     * @return Void
     */
    public function createProduct($payload){
        
        Product::create($payload);
    }


    /**
     * @param String $search
     * @return Collection
     */
    public function getAllProduct($search){

         $product = Product::select('id','uuid', 'name', 'description', 'price', 'image', 'discount');

         if($search !=""){     

            $product->where(function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%')
                ->orWhere('description','like','%'.$search.'%');
            });
        }     

        return $product->orderBy('id', 'ASC')->paginate(2) ->appends(['search' => $search, 'page' => request('page')]);

    }


    /**
     * @param String $refNumber
     * @return Array
     */
    public function updateProduct($payload, $id){

        return Product::where('id', $id)
                     ->update($payload);
    }


     /**
     * @param Int $id
     * @return Array
     */
    public function deleteProduct($id){

        Product::where('id', $id)->delete();
        
    }
}