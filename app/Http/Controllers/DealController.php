<?php

namespace App\Http\Controllers;

use App\Deal;
use App\Http\Requests\DealStoreRequest;
use App\Http\Requests\DealUpdateRequest;
use App\Http\Resources\Deal as DealResource;
use App\Http\Resources\DealCollection;
use Illuminate\Http\Request;

class DealController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\DealCollection
     */
    public function index(Request $request)
    {
        $deals = Deal::all();

        return new DealCollection($deals);
    }

    /**
     * @param \App\Http\Requests\DealStoreRequest $request
     * @return \App\Http\Resources\Deal
     */
    public function store(DealStoreRequest $request)
    {
        $deal = Deal::create($request->all());

        return new DealResource($deal);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Deal $deal
     * @return \App\Http\Resources\Deal
     */
    public function show(Request $request, Deal $deal)
    {
        return new DealResource($deal);
    }

    /**
     * @param \App\Http\Requests\DealUpdateRequest $request
     * @param \App\Deal $deal
     * @return \App\Http\Resources\Deal
     */
    public function update(DealUpdateRequest $request, Deal $deal)
    {
        $deal->update([]);

        return new DealResource($deal);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Deal $deal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Deal $deal)
    {
        $deal->delete();

        return response()->noContent(200);
    }
}
