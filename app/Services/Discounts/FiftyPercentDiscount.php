<?php

namespace App\Services\Discounts;

use App\Services\Discounts\Contracts\DiscountableInterface;

class FiftyPercentDiscount implements DiscountableInterface
{

  /**
   * apply
   *
   * @param  mixed $product
   * @return void
   */
  public function apply($product)
  {
    $discount = 0.5 * $product->price;
    return number_format(($product->price - $discount), 2);
  }
}
