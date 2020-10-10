<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Product;
use App\Traits\FileUpload;
use App\Traits\UuidManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repository\Contracts\ProductRepositoryInterface;


class AdminController extends Controller
{
    protected $productRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        ProductRepositoryInterface $productRepository
        )
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard(Request $request)
    {
        $payload =  $request->all();   
        $search = isset($payload['search']) ? $payload['search'] : '';

        $products = $this->productRepository->getAllProduct($search);

        return view('admin.dashboard',  compact(['products']));
    }


    /**
     * Load New Product from
     *
     * 
     */
    public function createProduct()
    {
        return view('admin.addProduct');
    }


    /**
     * Load New Product from
     *
     * 
     */
    public function storeProduct(Request $request)
    {        

        try{
            $payload = $request->all();

            $this->validate($request, [
                'name' => 'required|string|max:100',           
                'price' => 'required'      
            ]);          
            
    
            $uuid = UuidManager::generateUuid();
            $payload['uuid'] = $uuid->string;

            $payload['image'] = "";

            if ($request->file('file')) {     
                $payload['image'] = FileUpload::image($request->file('file'),  'products');
            }      

            $this->productRepository->createProduct($payload);

            \Session::flash('success', 'Here is your success message');

            return redirect()->intended('admin/');

         }catch (\Exception $e) { 
           
            \Log::error($e);
           
                       
        }
    }


    /**
     * update product
     *
     * 
     */
    public function editProduct($id)
    {  
        
        $product = $this->productRepository->getProductById($id);
        if(!$product){
            \Session::flash('errors', 'Product not found');

            return redirect()->intended('admin/');
        }       

        return view('admin.editProduct',  compact(['product']));
    }



     /**
     * update product
     *
     * 
     */
    public function updateProduct(Request $request, $id)
    {          
        $payload = $request->all();

        $this->validate($request, [
            'name' => 'required|string|max:100',           
            'price' => 'required'      
        ]);          


        if ($request->file('file')) {     
            $upload['image'] = FileUpload::image($request->file('file'),  'products');
        }   

        $upload = [
            'name' => $payload['name'],
            'price' => $payload['price'],
            'discount' => $payload['discount'],
            'description' => $payload['description']
        ];

        $product = $this->productRepository->updateProduct($upload, $id);
        
        return redirect()->intended('admin/');
    }


     /**
     * update product
     *
     * 
     */
    public function deleteProduct($id)
    {          
        $product = $this->productRepository->deleteProduct($id);
        
        return redirect()->intended('admin/');
    }



    
}
