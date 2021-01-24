<?php

namespace Tests\Unit;


use App\Product;
use App\Services\Discounts\FiftyPercentDiscount;
use App\Services\Discounts\SeventyfivePercentDiscount;
use App\Services\Discounts\TwentyPercentDiscount;
use App\Services\DiscountService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DiscountServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * test_apply_discount
     *
     * @return void
     */
    public function test_apply_discount_20_percent()
    {
        $product = factory(Product::class)->create([
            'price' => 40
        ]);

        $discountService = new DiscountService(new TwentyPercentDiscount);
        $total = $discountService->with($product)->applyDiscount();
        $this->assertSame(32, intval($total));
    }

    /**
     * test_apply_discount_50_percent
     *
     * @return void
     */
    public function test_apply_discount_50_percent()
    {
        $product = factory(Product::class)->create([
            'price' => 40
        ]);

        $discountService = new DiscountService(new FiftyPercentDiscount);
        $total = $discountService->with($product)->applyDiscount();
        $this->assertSame(20, intval($total));
    }

    public function test_apply_discount_75_percent()
    {
        $product = factory(Product::class)->create([
            'price' => 40
        ]);

        $discountService = new DiscountService(new SeventyfivePercentDiscount);
        $total = $discountService->with($product)->applyDiscount();
        $this->assertSame(10, intval($total));
    }
}
