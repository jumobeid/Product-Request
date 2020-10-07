<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurchasedItemRequest;
use App\Http\Requests\UpdatePurchasedItemRequest;
use App\Http\Resources\Admin\PurchasedItemResource;
use App\Models\PurchasedItem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PurchasedItemsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('purchased_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PurchasedItemResource(PurchasedItem::with(['product', 'packing_slip_details'])->get());
    }

    public function store(StorePurchasedItemRequest $request)
    {
        $purchasedItem = PurchasedItem::create($request->all());
        $purchasedItem->packing_slip_details()->sync($request->input('packing_slip_details', []));

        return (new PurchasedItemResource($purchasedItem))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PurchasedItem $purchasedItem)
    {
        abort_if(Gate::denies('purchased_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PurchasedItemResource($purchasedItem->load(['product', 'packing_slip_details']));
    }

    public function update(UpdatePurchasedItemRequest $request, PurchasedItem $purchasedItem)
    {
        $purchasedItem->update($request->all());
        $purchasedItem->packing_slip_details()->sync($request->input('packing_slip_details', []));

        return (new PurchasedItemResource($purchasedItem))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PurchasedItem $purchasedItem)
    {
        abort_if(Gate::denies('purchased_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchasedItem->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
