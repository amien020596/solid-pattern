<?php

namespace App\Services;

use App\Contracts\Shippable;

class HardCopyOrderBookService extends BaseOrderManagerService implements Shippable
{

  /**
   * shipping
   *
   * @param  mixed $shipping
   * @return void
   */
  public function shipping(int $shipping)
  {
    $this->total += $shipping;
    return $this;
  }
  /**
   * delivery
   *
   * @param  mixed $company
   * @return void
   */
  public function delivery($company)
  {
    $this->deliveryMessage = 'Delivery will be made by ' . $company;
    return $this;
  }
    
  /**
   * process
   *
   * @return void
   */
  public function process(){
    return (object)[
      'delivery' => $this->deliveryMessage,
      'paid'=>$this->total
    ];
  }
}