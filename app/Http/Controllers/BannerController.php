<?php
namespace App\Http\Controllers;

use App\Http\Requests\Banner\StoreRequest;
use App\Http\Requests\Banner\UpdateRequest;
use App\Models\Banner;
use App\Services\BannerService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BannerController extends Controller {

    /**
     * @param BannerService $bannerService
     */
    public function __construct(protected BannerService $bannerService) {}

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse {
        $perPage = $request->query('per_page');
        $banners = $this->bannerService->list($perPage ?? 15);
        return response()->json($banners);
    }

    /**
     * Display the specified resource.
     * @param Banner $product
     * @return JsonResponse
     */
    public function show(Banner $product): JsonResponse {
        return response()->json($product);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse {
        $banner = $this->bannerService->store($request);
        return response()->json($banner, 201);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateRequest $request
     * @param Banner $banner
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, Banner $banner): JsonResponse {
        $banner = $this->bannerService->update($request, $banner);
        return response()->json($banner);
    }

    /**
     * Delete the specified resource in storage.
     * @param Banner $banner
     * @return JsonResponse
     */
    public function destroy(Banner $banner): JsonResponse {
        $this->bannerService->destroy($banner);
        return response()->json($banner);
    }

}
