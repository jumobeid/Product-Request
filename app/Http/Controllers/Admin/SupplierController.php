<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySupplierRequest;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\CrmDocument;
use App\Models\PendingInvoice;
use App\Models\Supplier;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SupplierController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('supplier_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $suppliers = Supplier::all();

        return view('admin.suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        abort_if(Gate::denies('supplier_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pending_invoices = PendingInvoice::all()->pluck('pending_invoice_total_amount', 'id');

        $purchase_orders = CrmDocument::all()->pluck('name', 'id');

        return view('admin.suppliers.create', compact('pending_invoices', 'purchase_orders'));
    }

    public function store(StoreSupplierRequest $request)
    {
        $supplier = Supplier::create($request->all());
        $supplier->pending_invoices()->sync($request->input('pending_invoices', []));
        $supplier->purchase_orders()->sync($request->input('purchase_orders', []));

        return redirect()->route('admin.suppliers.index');
    }

    public function edit(Supplier $supplier)
    {
        abort_if(Gate::denies('supplier_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pending_invoices = PendingInvoice::all()->pluck('pending_invoice_total_amount', 'id');

        $purchase_orders = CrmDocument::all()->pluck('name', 'id');

        $supplier->load('pending_invoices', 'purchase_orders');

        return view('admin.suppliers.edit', compact('pending_invoices', 'purchase_orders', 'supplier'));
    }

    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $supplier->update($request->all());
        $supplier->pending_invoices()->sync($request->input('pending_invoices', []));
        $supplier->purchase_orders()->sync($request->input('purchase_orders', []));

        return redirect()->route('admin.suppliers.index');
    }

    public function show(Supplier $supplier)
    {
        abort_if(Gate::denies('supplier_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supplier->load('pending_invoices', 'purchase_orders');

        return view('admin.suppliers.show', compact('supplier'));
    }

    public function destroy(Supplier $supplier)
    {
        abort_if(Gate::denies('supplier_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supplier->delete();

        return back();
    }

    public function massDestroy(MassDestroySupplierRequest $request)
    {
        Supplier::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
