<?php

namespace App\Services\Discounts\Contracts;

interface DiscountableInterface
{
  public function apply($product);
}
