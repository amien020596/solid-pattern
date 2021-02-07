<?php

namespace App\Contracts;

interface Shippable
{
  /**
   * shipping
   *
   * @param  mixed $shipping
   * @return void
   */
  public function shipping(int $shipping);
    /**
   * delivery
   *
   * @param  mixed $company
   * @return void
   */
  public function delivery($company);
}