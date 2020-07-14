<?php

namespace App\Http\Controllers;

use App\Http\Requests\TariffItemStoreRequest;
use App\Http\Requests\TariffItemUpdateRequest;
use App\Http\Resources\TariffItem as TariffItemResource;
use App\Http\Resources\TariffItemCollection;
use App\Models\TariffItem;
use Illuminate\Http\Request;

class TariffItemController extends Controller
{
    /**
     * @param  Request  $request
     * @return TariffItemCollection
     */
    public function index(Request $request)
    {
        $tariffItems = TariffItem::all();

        return new TariffItemCollection($tariffItems);
    }

    /**
     * @param  TariffItemStoreRequest  $request
     * @return TariffItemResource
     */
    public function store(TariffItemStoreRequest $request)
    {
        $tariffItem = TariffItem::create($request->all());

        return new TariffItemResource($tariffItem);
    }

    /**
     * @param  Request  $request
     * @param  TariffItem  $tariffItem
     * @return TariffItemResource
     */
    public function show(Request $request, TariffItem $tariffItem)
    {
        return new TariffItemResource($tariffItem);
    }

    /**
     * @param  TariffItemUpdateRequest  $request
     * @param  TariffItem  $tariffItem
     * @return TariffItemResource
     */
    public function update(TariffItemUpdateRequest $request, TariffItem $tariffItem)
    {
        $tariffItem->update([]);

        return new TariffItemResource($tariffItem);
    }

    /**
     * @param  Request  $request
     * @param  TariffItem  $tariffItem
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TariffItem $tariffItem)
    {
        $tariffItem->delete();

        return response()->noContent(200);
    }
}
