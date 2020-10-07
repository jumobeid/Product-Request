<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePackingSlipDetailRequest;
use App\Http\Requests\UpdatePackingSlipDetailRequest;
use App\Http\Resources\Admin\PackingSlipDetailResource;
use App\Models\PackingSlipDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PackingSlipDetailsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('packing_slip_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PackingSlipDetailResource(PackingSlipDetail::with(['packing_slip_item_details'])->get());
    }

    public function store(StorePackingSlipDetailRequest $request)
    {
        $packingSlipDetail = PackingSlipDetail::create($request->all());
        $packingSlipDetail->packing_slip_item_details()->sync($request->input('packing_slip_item_details', []));

        return (new PackingSlipDetailResource($packingSlipDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PackingSlipDetail $packingSlipDetail)
    {
        abort_if(Gate::denies('packing_slip_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PackingSlipDetailResource($packingSlipDetail->load(['packing_slip_item_details']));
    }

    public function update(UpdatePackingSlipDetailRequest $request, PackingSlipDetail $packingSlipDetail)
    {
        $packingSlipDetail->update($request->all());
        $packingSlipDetail->packing_slip_item_details()->sync($request->input('packing_slip_item_details', []));

        return (new PackingSlipDetailResource($packingSlipDetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PackingSlipDetail $packingSlipDetail)
    {
        abort_if(Gate::denies('packing_slip_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packingSlipDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
