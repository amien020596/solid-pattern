<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormOrderProcess;
use App\Services\OrderProcessingService;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class ProcessOrderController extends Controller
{
    protected $orderProcessingService;

    public function __construct(FormOrderProcess $request, OrderProcessingService $orderProcessingService)
    {
        $this->request = $request;
        $this->orderProcessingService = $orderProcessingService;
    }

    public function process_order($product_id)
    {
        $response = $this->orderProcessingService->execute($product_id);
        return response($response);
    }
}
