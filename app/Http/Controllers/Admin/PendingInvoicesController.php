<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPendingInvoiceRequest;
use App\Http\Requests\StorePendingInvoiceRequest;
use App\Http\Requests\UpdatePendingInvoiceRequest;
use App\Models\PendingInvoice;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PendingInvoicesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pending_invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pendingInvoices = PendingInvoice::all();

        return view('admin.pendingInvoices.index', compact('pendingInvoices'));
    }

    public function create()
    {
        abort_if(Gate::denies('pending_invoice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pendingInvoices.create');
    }

    public function store(StorePendingInvoiceRequest $request)
    {
        $pendingInvoice = PendingInvoice::create($request->all());

        return redirect()->route('admin.pending-invoices.index');
    }

    public function edit(PendingInvoice $pendingInvoice)
    {
        abort_if(Gate::denies('pending_invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pendingInvoices.edit', compact('pendingInvoice'));
    }

    public function update(UpdatePendingInvoiceRequest $request, PendingInvoice $pendingInvoice)
    {
        $pendingInvoice->update($request->all());

        return redirect()->route('admin.pending-invoices.index');
    }

    public function show(PendingInvoice $pendingInvoice)
    {
        abort_if(Gate::denies('pending_invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pendingInvoices.show', compact('pendingInvoice'));
    }

    public function destroy(PendingInvoice $pendingInvoice)
    {
        abort_if(Gate::denies('pending_invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pendingInvoice->delete();

        return back();
    }

    public function massDestroy(MassDestroyPendingInvoiceRequest $request)
    {
        PendingInvoice::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
