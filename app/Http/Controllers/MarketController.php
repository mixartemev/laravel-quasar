<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarketStoreRequest;
use App\Http\Requests\MarketUpdateRequest;
use App\Http\Resources\Market as MarketResource;
use App\Http\Resources\MarketCollection;
use App\Market;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\MarketCollection
     */
    public function index(Request $request)
    {
        $markets = Market::all();

        return new MarketCollection($markets);
    }

    /**
     * @param \App\Http\Requests\MarketStoreRequest $request
     * @return \App\Http\Resources\Market
     */
    public function store(MarketStoreRequest $request)
    {
        $market = Market::create($request->all());

        return new MarketResource($market);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Market $market
     * @return \App\Http\Resources\Market
     */
    public function show(Request $request, Market $market)
    {
        return new MarketResource($market);
    }

    /**
     * @param \App\Http\Requests\MarketUpdateRequest $request
     * @param \App\Market $market
     * @return \App\Http\Resources\Market
     */
    public function update(MarketUpdateRequest $request, Market $market)
    {
        $market->update([]);

        return new MarketResource($market);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Market $market
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Market $market)
    {
        $market->delete();

        return response()->noContent(200);
    }
}
