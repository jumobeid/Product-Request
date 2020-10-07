<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPurchasedItemRequest;
use App\Http\Requests\StorePurchasedItemRequest;
use App\Http\Requests\UpdatePurchasedItemRequest;
use App\Models\PackingSlipDetail;
use App\Models\Product;
use App\Models\PurchasedItem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PurchasedItemsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('purchased_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchasedItems = PurchasedItem::all();

        return view('admin.purchasedItems.index', compact('purchasedItems'));
    }

    public function create()
    {
        abort_if(Gate::denies('purchased_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $packing_slip_details = PackingSlipDetail::all()->pluck('packing_slip_number', 'id');

        return view('admin.purchasedItems.create', compact('products', 'packing_slip_details'));
    }

    public function store(StorePurchasedItemRequest $request)
    {
        $purchasedItem = PurchasedItem::create($request->all());
        $purchasedItem->packing_slip_details()->sync($request->input('packing_slip_details', []));

        return redirect()->route('admin.purchased-items.index');
    }

    public function edit(PurchasedItem $purchasedItem)
    {
        abort_if(Gate::denies('purchased_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $packing_slip_details = PackingSlipDetail::all()->pluck('packing_slip_number', 'id');

        $purchasedItem->load('product', 'packing_slip_details');

        return view('admin.purchasedItems.edit', compact('products', 'packing_slip_details', 'purchasedItem'));
    }

    public function update(UpdatePurchasedItemRequest $request, PurchasedItem $purchasedItem)
    {
        $purchasedItem->update($request->all());
        $purchasedItem->packing_slip_details()->sync($request->input('packing_slip_details', []));

        return redirect()->route('admin.purchased-items.index');
    }

    public function show(PurchasedItem $purchasedItem)
    {
        abort_if(Gate::denies('purchased_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchasedItem->load('product', 'packing_slip_details');

        return view('admin.purchasedItems.show', compact('purchasedItem'));
    }

    public function destroy(PurchasedItem $purchasedItem)
    {
        abort_if(Gate::denies('purchased_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchasedItem->delete();

        return back();
    }

    public function massDestroy(MassDestroyPurchasedItemRequest $request)
    {
        PurchasedItem::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
