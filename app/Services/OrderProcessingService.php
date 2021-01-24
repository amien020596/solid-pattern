<?php

namespace App\Services;

use App\Http\Requests\FormOrderProcess;
use App\Contracts\ProductRepositoryInterface;
use App\Contracts\StockRepositoryInterface;
use App\Services\Discounts\TwentyPercentDiscount;

class OrderProcessingService
{

  protected $productRepository;
  protected $stockRepository;
  /**
   * __construct
   *
   * @param  mixed $productRepository
   * @return void
   */
  public function __construct(
    ProductRepositoryInterface $productRepository,
    StockRepositoryInterface $stockRepository,
    StripePaymentService $stripePaymentService
  ) {
    $this->stripePaymentService = $stripePaymentService;
    $this->productRepository = $productRepository;
    $this->stockRepository = $stockRepository;
  }

  public function execute($product_id)
  {
    // find the product 
    $product = $this->productRepository->getByid($product_id);

    // get the stock level
    $stock = $this->stockRepository->forProduct($product_id);

    // check stock level
    $this->stockRepository->checkStockLevel($stock);

    // apply discount
    $discountService = new DiscountService(new TwentyPercentDiscount);
    $total = $discountService->with($product)->applyDiscount();

    // attempt payment 
    $paymentSuccessMessage = $this->stripePaymentService->process($total);

    // payment succeeded
    if (!empty($paymentSuccessMessage)) {

      $this->stockRepository->updateRecordStockById($product_id);

      return [
        'payment_message' => $paymentSuccessMessage,
        'discounted_price' => $total,
        'original_price' => $product->price,
        'message' => 'Thank you, your order is being processed'
      ];
    }
  }
}
