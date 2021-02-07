<?php

namespace App\Services;

use App\Contracts\OrderInterface;


class SoftCopyOrderBookService extends BaseOrderManagerService
{
  public function process(){
    return (object)[
      'delivery' =>"here is you link",
      'paid'=>$this->total
    ];
  }
}