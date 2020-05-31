<?php

namespace App\Http\Controllers;

use App\Http\Requests\TariffItemStoreRequest;
use App\Http\Requests\TariffItemUpdateRequest;
use App\Http\Resources\TariffItem as TariffItemResource;
use App\Http\Resources\TariffItemCollection;
use App\TariffItem;
use Illuminate\Http\Request;

class TariffItemController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TariffItemCollection
     */
    public function index(Request $request)
    {
        $tariffItems = TariffItem::all();

        return new TariffItemCollection($tariffItems);
    }

    /**
     * @param \App\Http\Requests\TariffItemStoreRequest $request
     * @return \App\Http\Resources\TariffItem
     */
    public function store(TariffItemStoreRequest $request)
    {
        $tariffItem = TariffItem::create($request->all());

        return new TariffItemResource($tariffItem);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\TariffItem $tariffItem
     * @return \App\Http\Resources\TariffItem
     */
    public function show(Request $request, TariffItem $tariffItem)
    {
        return new TariffItemResource($tariffItem);
    }

    /**
     * @param \App\Http\Requests\TariffItemUpdateRequest $request
     * @param \App\TariffItem $tariffItem
     * @return \App\Http\Resources\TariffItem
     */
    public function update(TariffItemUpdateRequest $request, TariffItem $tariffItem)
    {
        $tariffItem->update([]);

        return new TariffItemResource($tariffItem);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\TariffItem $tariffItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TariffItem $tariffItem)
    {
        $tariffItem->delete();

        return response()->noContent(200);
    }
}
