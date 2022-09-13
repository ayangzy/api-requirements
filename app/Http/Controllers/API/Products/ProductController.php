<?php

namespace App\Http\Controllers\API\Products;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Actions\FetchProductsAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = (new FetchProductsAction())->execute();
        
        return $this->successResponse('products retrieve successfully', ProductResource::collection($products));
    }
}
