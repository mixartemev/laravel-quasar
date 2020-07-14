<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarketStoreRequest;
use App\Http\Requests\MarketUpdateRequest;
use App\Http\Resources\Market as MarketResource;
use App\Http\Resources\MarketCollection;
use App\Models\Market;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    /**
     * @param  Request  $request
     * @return MarketCollection
     */
    public function index(Request $request)
    {
        $markets = Market::all();

        return new MarketCollection($markets);
    }

    /**
     * @param  MarketStoreRequest  $request
     * @return MarketResource
     */
    public function store(MarketStoreRequest $request)
    {
        $market = Market::create($request->all());

        return new MarketResource($market);
    }

    /**
     * @param  Request  $request
     * @param  Market  $market
     * @return MarketResource
     */
    public function show(Request $request, Market $market)
    {
        return new MarketResource($market);
    }

    /**
     * @param  MarketUpdateRequest  $request
     * @param  Market  $market
     * @return MarketResource
     */
    public function update(MarketUpdateRequest $request, Market $market)
    {
        $market->update([]);

        return new MarketResource($market);
    }

    /**
     * @param  Request  $request
     * @param  Market  $market
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Market $market)
    {
        $market->delete();

        return response()->noContent(200);
    }
}
