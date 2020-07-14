<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Http\Requests\DealStoreRequest;
use App\Http\Requests\DealUpdateRequest;
use App\Http\Resources\Deal as DealResource;
use App\Http\Resources\DealCollection;
use Illuminate\Http\Request;

class DealController extends Controller
{
    /**
     * @param  Request  $request
     * @return DealCollection
     */
    public function index(Request $request)
    {
        $deals = Deal::all();

        return new DealCollection($deals);
    }

    /**
     * @param  DealStoreRequest  $request
     * @return DealResource
     */
    public function store(DealStoreRequest $request)
    {
        $deal = Deal::create($request->all());

        return new DealResource($deal);
    }

    /**
     * @param  Request  $request
     * @param  Deal  $deal
     * @return DealResource
     */
    public function show(Request $request, Deal $deal)
    {
        return new DealResource($deal);
    }

    /**
     * @param  DealUpdateRequest  $request
     * @param  Deal  $deal
     * @return DealResource
     */
    public function update(DealUpdateRequest $request, Deal $deal)
    {
        $deal->update([]);

        return new DealResource($deal);
    }

    /**
     * @param  Request  $request
     * @param  Deal  $deal
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Deal $deal)
    {
        $deal->delete();

        return response()->noContent(200);
    }
}
