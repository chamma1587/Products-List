<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Contracts\ProductRepositoryInterface;

class customerController extends Controller
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
    public function dashboard()
    {
        $search ='';
        $products = $this->productRepository->getAllProduct($search);

        return view('customer.dashboard', compact(['products']));
    }
}
