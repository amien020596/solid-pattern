<?php

namespace App\Repositories;

use App\Contracts\StockRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

/**
 * StockRepository
 */
class MysqlStockRepository implements StockRepositoryInterface
{
  protected const MINIMUN_LIMIT_STOCK = 1;
  protected const AMOUNT_OF_STOCK_DROP = 1;

  /**
   * forProduct
   *
   * @param  mixed $product_id
   * @return void
   */
  public function forProduct($product_id)
  {
    return DB::table('stocks')->whereProductId($product_id)->first();
  }

  /**
   * checkStockLevel
   *
   * @param  mixed $stock
   * @return void
   */
  public function checkStockLevel($stock)
  {

    if ($stock->quantity < self::MINIMUN_LIMIT_STOCK) {

      throw new ValidationException([
        'message' => 'we are out of stock'
      ]);
    }
    return $stock;
  }

  /**
   * updateRecordStockById
   *
   * @param  mixed $product_id
   * @return void
   */
  public function updateRecordStockById($product_id)
  {
    // return query builder
    $stock = DB::table('stocks')->where('product_id', $product_id);

    $stock->update([
      'quantity' => $stock->first()->quantity - self::AMOUNT_OF_STOCK_DROP
    ]);
  }
}
