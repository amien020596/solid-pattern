<?php

namespace App\Contracts;

interface ProductRepositoryInterface
{
  /**
   * getById
   *
   * @param  mixed $product_id
   * @return void
   */
  public function getById($product_id);
}
