<?php

namespace App\Contracts;

interface StockRepositoryInterface
{
  /**
   * checkStockLevel
   *
   * @param  mixed $stock
   * @return void
   */
  public function checkStockLevel($stock);

  /**
   * forProduct
   *
   * @param  mixed $product_id
   * @return void
   */
  public function forProduct($product_id);

  /**
   * updateRecordStockById
   *
   * @param  mixed $product_id
   * @return void
   */
  public function updateRecordStockById($product_id);
}
