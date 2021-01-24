<?php

namespace App\Services;

use App\Services\Discounts\Contracts\DiscountableInterface;

class DiscountService
{

  /**
   * product
   *
   * @var mixed
   */
  protected $product;
  /**
   * discountable
   *
   * @var mixed
   */
  protected $discountable;

  public function __construct(DiscountableInterface $discountable)
  {
    return $this->discountable = $discountable;
  }
  /**
   * with
   *
   * @param  mixed $product
   * @return void
   */
  public function with($product)
  {
    $this->product = $product;
    return $this;
  }

  /**
   * apply
   *
   * @return void
   */
  public function applyDiscount()
  {
    return $this->discountable->apply($this->product);
  }
}
