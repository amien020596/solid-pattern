<?php

namespace Tests\Feature;

use App\Stock;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class OrderProcessTest extends TestCase
{
    use RefreshDatabase;
    /**
     * a_user_order_can_be_processed
     *
     * @return void
     */
    public function test_a_user_order_can_be_processed()
    {
        $stock = factory(Stock::class)->create();
        $response = $this->post("/order/{$stock->product_id}/process", [
            'payment_method' => 'stripe'
        ])->assertOk()->json();

        /*
            'payment_message' => $paymentSuccessMessage,
            'discounted_price' => $total,
            'original_price' => $product->price,
            'message' => 'Thank you, your order is being processed'
        */
        $this->assertArrayHasKey('payment_message', $response);
        $this->assertArrayHasKey('discounted_price', $response);
        $this->assertArrayHasKey('original_price', $response);
        $this->assertArrayHasKey('message', $response);

        // $stock = Stock::find($stock->product_id)->get();
        // Log::debug('stock after', [$stock]);

        $this->assertDatabaseHas('stocks', [
            'quantity' => $stock->quantity - 1
        ]);
    }


    /**
     * test_run_out_stock
     *
     * @return void
     */
    public function test_run_out_stock()
    {
        $this->expectException(ValidationException::class);

        $stock = factory(Stock::class)->create([
            'quantity' => 0
        ]);

        $this->withoutExceptionHandling()->post("/order/{$stock->product_id}/process", [
            'payment_method' => 'stripe'
        ]);
    }
}
