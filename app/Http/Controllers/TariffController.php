<?php

namespace App\Http\Controllers;

use App\Http\Requests\TariffStoreRequest;
use App\Http\Requests\TariffUpdateRequest;
use App\Http\Resources\Tariff as TariffResource;
use App\Http\Resources\TariffCollection;
use App\Tariff;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TariffCollection
     */
    public function index(Request $request)
    {
        $tariffs = Tariff::all();

        return new TariffCollection($tariffs);
    }

    /**
     * @param \App\Http\Requests\TariffStoreRequest $request
     * @return \App\Http\Resources\Tariff
     */
    public function store(TariffStoreRequest $request)
    {
        $tariff = Tariff::create($request->all());

        return new TariffResource($tariff);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Tariff $tariff
     * @return \App\Http\Resources\Tariff
     */
    public function show(Request $request, Tariff $tariff)
    {
        return new TariffResource($tariff);
    }

    /**
     * @param \App\Http\Requests\TariffUpdateRequest $request
     * @param \App\Tariff $tariff
     * @return \App\Http\Resources\Tariff
     */
    public function update(TariffUpdateRequest $request, Tariff $tariff)
    {
        $tariff->update([]);

        return new TariffResource($tariff);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Tariff $tariff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Tariff $tariff)
    {
        $tariff->delete();

        return response()->noContent(200);
    }
}
