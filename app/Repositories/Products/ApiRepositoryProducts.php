<?php

namespace App\Repositories\Products;

use App\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\File;


class ApiRepositoryProducts extends Repository
{
  /**
   * all
   *
   * @return Collection
   */
  public function all(): Collection
  {
    $product = File::get(storage_path('products.json'));
    $products = json_decode($product, true);
    $products = Product::hydrate($products);
    return $products;
  }
}
