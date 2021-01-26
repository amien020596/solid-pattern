<?php

namespace App\Http\Controllers;

use App\Repositories\Products\ApiRepositoryProducts;
use App\Repositories\Products\DatabaseRepository;



class ProductController extends Controller
{
    public function product(ApiRepositoryProducts $repository)
    {
        $products = $repository->all();
        return view('product', compact('products'));
    }
}
