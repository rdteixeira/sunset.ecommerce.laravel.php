<?php
namespace App\Services;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductService {

    /**
     * Display a listing of the resource.
     * @param int $perPage
     * @return mixed
     */
    public function list(int $perPage): mixed {
        return Product::paginate($perPage);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreRequest $request
     * @return Product|null
     */
    public function store(StoreRequest $request): ?Product {
        return DB::transaction(function() use ($request) {
            $product_data = $request->validated();
            return Product::create($product_data);
        });
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateRequest $request
     * @param Product $product
     * @return Product|null
     */
    public function update(UpdateRequest $request, Product $product): ?Product {
        return DB::transaction(function() use ($request, $product) {
            $product_data = $request->validated();
            $product->update($product_data);
            return $product;
        });
    }

    /**
     * Delete the specified resource in storage.
     * @param Product $product
     */
    public function destroy(Product $product) {
        DB::transaction(function() use ($product) {
            $product->delete();
        });
    }

}
