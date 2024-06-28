<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller {

    /**
     * @param ProductService $productService
     */
    public function __construct(protected ProductService $productService) {}

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse {
        $perPage = $request->query('per_page');
        $products = $this->productService->list($perPage ?? 15);
        return response()->json($products);
    }

    /**
     * @param Product $product
     * @return JsonResponse
     */
    public function show(Product $product): JsonResponse {
        return response()->json($product);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse {
        $product = $this->productService->store($request);
        return response()->json($product, 201);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateRequest $request
     * @param Product $product
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, Product $product): JsonResponse {
        $product = $this->productService->update($request, $product);
        return response()->json($product);
    }

    /**
     * Delete the specified resource in storage.
     * @param Product $product
     * @return JsonResponse
     */
    public function destroy(Product $product): JsonResponse {
        $this->productService->destroy($product);
        return response()->json($product);
    }

}
