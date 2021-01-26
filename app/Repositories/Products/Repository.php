<?php

namespace App\Repositories\Products;

use Illuminate\Database\Eloquent\Collection;

abstract class Repository
{
  /**
   * all
   *
   * @return Collection
   */
  abstract public function all(): Collection;
}
