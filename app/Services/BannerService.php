<?php
namespace App\Services;

use App\Http\Requests\Banner\StoreRequest;
use App\Http\Requests\Banner\UpdateRequest;
use App\Models\Banner;
use Illuminate\Support\Facades\DB;

class BannerService {

    /**
     * Display a listing of the resource.
     * @param int $perPage
     * @return mixed
     */
    public function list(int $perPage): mixed {
        return Banner::paginate($perPage);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreRequest $request
     * @return Banner|null
     */
    public function store(StoreRequest $request): ?Banner {
        return DB::transaction(function() use ($request) {
            $banner_data = $request->validated();
            return Banner::create($banner_data);
        });
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateRequest $request
     * @param Banner $banner
     * @return Banner|null
     */
    public function update(UpdateRequest $request, Banner $banner): ?Banner {
        return DB::transaction(function() use ($request, $banner) {
            $banner_data = $request->validated();
            $banner->update($banner_data);
            return $banner;
        });
    }

    /**
     * Delete the specified resource in storage.
     * @param Banner $banner
     */
    public function destroy(Banner $banner) {
        DB::transaction(function() use ($banner) {
           $banner->delete();
        });
    }

}
