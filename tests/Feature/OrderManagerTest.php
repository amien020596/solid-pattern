<?php

namespace Tests\Feature;

use App\Services\HardCopyOrderBookService;
use App\Services\OrderManagerService;
use App\Services\SoftCopyOrderBookService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderManagerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_order_hard_copy_book_manager_can_process_an_order()
    {
        $items = [
            ['title' => 'test-book1', 'price' => 2],
            ['title' => 'test-book2', 'price' => 4],
            ['title' => 'test-book3', 'price' => 6],
        ];
        $deliveryCompany = 'fedex';
        $orderManager = new HardCopyOrderBookService($items);
        $deliveryMessage = 'Delivery will be made by ' . $deliveryCompany;

        $processOrder = $orderManager
            ->calculate()
            ->discount()
            ->shipping(5)
            ->delivery($deliveryCompany)
            ->process();

        $this->assertSame(16.76, $processOrder->paid);
        $this->assertSame($deliveryMessage, $processOrder->delivery);
    }

    public function test_order_soft_copy_book_manager_can_process_an_order(){
        $items = [
            ['title' => 'test-book1', 'price' => 2],
            ['title' => 'test-book2', 'price' => 4],
            ['title' => 'test-book3', 'price' => 6],
        ];
        
        $orderManager = new SoftCopyOrderBookService($items);
        $deliveryMessage = 'here is you link';

        $processOrder = $orderManager
            ->calculate()
            ->discount()
            ->process();

        $this->assertSame(11.76, $processOrder->paid);
        $this->assertSame($deliveryMessage, $processOrder->delivery);
    }
}
