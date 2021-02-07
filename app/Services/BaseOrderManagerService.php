<?php

namespace App\Services;

use App\Contracts\OrderInterface;


abstract class BaseOrderManagerService implements OrderInterface
{
  /**
   * total
   *
   * @var mixed
   */
  protected $total;
  /**
   * items
   *
   * @var mixed
   */
  protected $items;
  /**
   * deliveryMessage
   *
   * @var mixed
   */
  protected $deliveryMessage;
  /**
   * __construct
   *
   * @param  mixed $items
   * @return void
   */
  public function __construct($items = [])
  {
    $this->items = $items;
  }
  /**
   * calculate
   *
   * @return void
   */
  public function calculate()
  {
    $this->total = collect($this->items)->sum('price');
    return $this;
  }
  
  /**
   * discount
   *
   * @param  mixed $discount
   * @return void
   */
  public function discount($discount = 0.02)
  {
    $this->total -= $this->total * $discount;
    return $this;
  }
    
  /**
   * process
   *
   * @return void
   */
  abstract public function process();
}
