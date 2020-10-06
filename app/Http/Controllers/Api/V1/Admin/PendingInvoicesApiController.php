<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePendingInvoiceRequest;
use App\Http\Requests\UpdatePendingInvoiceRequest;
use App\Http\Resources\Admin\PendingInvoiceResource;
use App\Models\PendingInvoice;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PendingInvoicesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pending_invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PendingInvoiceResource(PendingInvoice::all());
    }

    public function store(StorePendingInvoiceRequest $request)
    {
        $pendingInvoice = PendingInvoice::create($request->all());

        return (new PendingInvoiceResource($pendingInvoice))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PendingInvoice $pendingInvoice)
    {
        abort_if(Gate::denies('pending_invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PendingInvoiceResource($pendingInvoice);
    }

    public function update(UpdatePendingInvoiceRequest $request, PendingInvoice $pendingInvoice)
    {
        $pendingInvoice->update($request->all());

        return (new PendingInvoiceResource($pendingInvoice))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PendingInvoice $pendingInvoice)
    {
        abort_if(Gate::denies('pending_invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pendingInvoice->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
