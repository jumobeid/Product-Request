<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPackingSlipItemDetailRequest;
use App\Http\Requests\StorePackingSlipItemDetailRequest;
use App\Http\Requests\UpdatePackingSlipItemDetailRequest;
use App\Models\PackingSlipItemDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PackingSlipItemDetailsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('packing_slip_item_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packingSlipItemDetails = PackingSlipItemDetail::all();

        return view('admin.packingSlipItemDetails.index', compact('packingSlipItemDetails'));
    }

    public function create()
    {
        abort_if(Gate::denies('packing_slip_item_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.packingSlipItemDetails.create');
    }

    public function store(StorePackingSlipItemDetailRequest $request)
    {
        $packingSlipItemDetail = PackingSlipItemDetail::create($request->all());

        return redirect()->route('admin.packing-slip-item-details.index');
    }

    public function edit(PackingSlipItemDetail $packingSlipItemDetail)
    {
        abort_if(Gate::denies('packing_slip_item_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.packingSlipItemDetails.edit', compact('packingSlipItemDetail'));
    }

    public function update(UpdatePackingSlipItemDetailRequest $request, PackingSlipItemDetail $packingSlipItemDetail)
    {
        $packingSlipItemDetail->update($request->all());

        return redirect()->route('admin.packing-slip-item-details.index');
    }

    public function show(PackingSlipItemDetail $packingSlipItemDetail)
    {
        abort_if(Gate::denies('packing_slip_item_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.packingSlipItemDetails.show', compact('packingSlipItemDetail'));
    }

    public function destroy(PackingSlipItemDetail $packingSlipItemDetail)
    {
        abort_if(Gate::denies('packing_slip_item_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packingSlipItemDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyPackingSlipItemDetailRequest $request)
    {
        PackingSlipItemDetail::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
