<?php

namespace App\Repositories\Products;

use App\Product;
use Illuminate\Database\Eloquent\Collection;

class DatabaseRepository extends Repository
{
  /**
   * all
   *
   * @return void
   */
  public function all(): Collection
  {
    return Product::all();
  }
}
