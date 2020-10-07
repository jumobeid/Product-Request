<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPackingSlipDetailRequest;
use App\Http\Requests\StorePackingSlipDetailRequest;
use App\Http\Requests\UpdatePackingSlipDetailRequest;
use App\Models\PackingSlipDetail;
use App\Models\PackingSlipItemDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PackingSlipDetailsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('packing_slip_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packingSlipDetails = PackingSlipDetail::all();

        return view('admin.packingSlipDetails.index', compact('packingSlipDetails'));
    }

    public function create()
    {
        abort_if(Gate::denies('packing_slip_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packing_slip_item_details = PackingSlipItemDetail::all()->pluck('received_item_qty', 'id');

        return view('admin.packingSlipDetails.create', compact('packing_slip_item_details'));
    }

    public function store(StorePackingSlipDetailRequest $request)
    {
        $packingSlipDetail = PackingSlipDetail::create($request->all());
        $packingSlipDetail->packing_slip_item_details()->sync($request->input('packing_slip_item_details', []));

        return redirect()->route('admin.packing-slip-details.index');
    }

    public function edit(PackingSlipDetail $packingSlipDetail)
    {
        abort_if(Gate::denies('packing_slip_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packing_slip_item_details = PackingSlipItemDetail::all()->pluck('received_item_qty', 'id');

        $packingSlipDetail->load('packing_slip_item_details');

        return view('admin.packingSlipDetails.edit', compact('packing_slip_item_details', 'packingSlipDetail'));
    }

    public function update(UpdatePackingSlipDetailRequest $request, PackingSlipDetail $packingSlipDetail)
    {
        $packingSlipDetail->update($request->all());
        $packingSlipDetail->packing_slip_item_details()->sync($request->input('packing_slip_item_details', []));

        return redirect()->route('admin.packing-slip-details.index');
    }

    public function show(PackingSlipDetail $packingSlipDetail)
    {
        abort_if(Gate::denies('packing_slip_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packingSlipDetail->load('packing_slip_item_details');

        return view('admin.packingSlipDetails.show', compact('packingSlipDetail'));
    }

    public function destroy(PackingSlipDetail $packingSlipDetail)
    {
        abort_if(Gate::denies('packing_slip_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packingSlipDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyPackingSlipDetailRequest $request)
    {
        PackingSlipDetail::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
