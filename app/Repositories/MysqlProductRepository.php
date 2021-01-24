<?php

namespace App\Repositories;

use App\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

/**
 * ProductRepository
 */
class MysqlProductRepository implements ProductRepositoryInterface
{
  /**
   * getById
   *
   * @param  mixed $product_id
   * @return void
   */
  public function getById($product_id)
  {
    return DB::table('products')->find($product_id);
  }
}
