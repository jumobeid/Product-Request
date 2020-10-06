<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePackingSlipItemDetailRequest;
use App\Http\Requests\UpdatePackingSlipItemDetailRequest;
use App\Http\Resources\Admin\PackingSlipItemDetailResource;
use App\Models\PackingSlipItemDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PackingSlipItemDetailsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('packing_slip_item_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PackingSlipItemDetailResource(PackingSlipItemDetail::all());
    }

    public function store(StorePackingSlipItemDetailRequest $request)
    {
        $packingSlipItemDetail = PackingSlipItemDetail::create($request->all());

        return (new PackingSlipItemDetailResource($packingSlipItemDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PackingSlipItemDetail $packingSlipItemDetail)
    {
        abort_if(Gate::denies('packing_slip_item_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PackingSlipItemDetailResource($packingSlipItemDetail);
    }

    public function update(UpdatePackingSlipItemDetailRequest $request, PackingSlipItemDetail $packingSlipItemDetail)
    {
        $packingSlipItemDetail->update($request->all());

        return (new PackingSlipItemDetailResource($packingSlipItemDetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PackingSlipItemDetail $packingSlipItemDetail)
    {
        abort_if(Gate::denies('packing_slip_item_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packingSlipItemDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
