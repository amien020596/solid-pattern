<?php

namespace App\Contracts;

interface OrderInterface
{
  /**
   * calculate
   *
   * @return void
   */
  public function calculate();
  
  /**
   * discount
   *
   * @param  mixed $discount
   * @return void
   */
  public function discount($discount);

  /**
   * process
   *
   * @return void
   */
  public function process();
}
