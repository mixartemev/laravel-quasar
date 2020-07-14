<?php

namespace App\Http\Controllers;

use App\Http\Requests\TariffStoreRequest;
use App\Http\Requests\TariffUpdateRequest;
use App\Http\Resources\Tariff as TariffResource;
use App\Http\Resources\TariffCollection;
use App\Models\Tariff;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    /**
     * @param  Request  $request
     * @return TariffCollection
     */
    public function index(Request $request)
    {
        $tariffs = Tariff::all();

        return new TariffCollection($tariffs);
    }

    /**
     * @param  TariffStoreRequest  $request
     * @return TariffResource
     */
    public function store(TariffStoreRequest $request)
    {
        $tariff = Tariff::create($request->all());

        return new TariffResource($tariff);
    }

    /**
     * @param  Request  $request
     * @param  Tariff  $tariff
     * @return TariffResource
     */
    public function show(Request $request, Tariff $tariff)
    {
        return new TariffResource($tariff);
    }

    /**
     * @param  TariffUpdateRequest  $request
     * @param  Tariff  $tariff
     * @return TariffResource
     */
    public function update(TariffUpdateRequest $request, Tariff $tariff)
    {
        $tariff->update([]);

        return new TariffResource($tariff);
    }

    /**
     * @param  Request  $request
     * @param  Tariff  $tariff
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Tariff $tariff)
    {
        $tariff->delete();

        return response()->noContent(200);
    }
}
