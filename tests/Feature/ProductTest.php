<?php

namespace Tests\Feature;

use App\Product;
use App\Repositories\Products\ApiRepositoryProducts;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_product()
    {
        $products = app(ApiRepositoryProducts::class)->all();

        $response = $this->get('/product')->assertOk();
        $data = $response->viewData('products');

        $this->assertSame($products->count(), $data->count());
    }
}
