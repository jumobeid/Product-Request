<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCrmDocumentRequest;
use App\Http\Requests\StoreCrmDocumentRequest;
use App\Http\Requests\UpdateCrmDocumentRequest;
use App\Models\CrmCustomer;
use App\Models\CrmDocument;
use App\Models\CrmStatus;
use App\Models\PackingSlipDetail;
use App\Models\PendingInvoice;
use App\Models\PurchasedItem;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CrmDocumentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('crm_document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmDocuments = CrmDocument::all();

        return view('admin.crmDocuments.index', compact('crmDocuments'));
    }

    public function create()
    {
        abort_if(Gate::denies('crm_document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = CrmCustomer::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchased_items = PurchasedItem::all()->pluck('quantity', 'id');

        $pending_invoices = PendingInvoice::all()->pluck('pending_invoice_total_amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        $packing_slip_details = PackingSlipDetail::all()->pluck('packing_slip_number', 'id');

        $statuses = CrmStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.crmDocuments.create', compact('customers', 'purchased_items', 'pending_invoices', 'packing_slip_details', 'statuses'));
    }

    public function store(StoreCrmDocumentRequest $request)
    {
        $crmDocument = CrmDocument::create($request->all());
        $crmDocument->purchased_items()->sync($request->input('purchased_items', []));
        $crmDocument->packing_slip_details()->sync($request->input('packing_slip_details', []));

        if ($request->input('document_file', false)) {
            $crmDocument->addMedia(storage_path('tmp/uploads/' . $request->input('document_file')))->toMediaCollection('document_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $crmDocument->id]);
        }

        return redirect()->route('admin.crm-documents.index');
    }

    public function edit(CrmDocument $crmDocument)
    {
        abort_if(Gate::denies('crm_document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = CrmCustomer::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchased_items = PurchasedItem::all()->pluck('quantity', 'id');

        $pending_invoices = PendingInvoice::all()->pluck('pending_invoice_total_amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        $packing_slip_details = PackingSlipDetail::all()->pluck('packing_slip_number', 'id');

        $statuses = CrmStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crmDocument->load('customer', 'purchased_items', 'pending_invoice', 'packing_slip_details', 'status');

        return view('admin.crmDocuments.edit', compact('customers', 'purchased_items', 'pending_invoices', 'packing_slip_details', 'statuses', 'crmDocument'));
    }

    public function update(UpdateCrmDocumentRequest $request, CrmDocument $crmDocument)
    {
        $crmDocument->update($request->all());
        $crmDocument->purchased_items()->sync($request->input('purchased_items', []));
        $crmDocument->packing_slip_details()->sync($request->input('packing_slip_details', []));

        if ($request->input('document_file', false)) {
            if (!$crmDocument->document_file || $request->input('document_file') !== $crmDocument->document_file->file_name) {
                if ($crmDocument->document_file) {
                    $crmDocument->document_file->delete();
                }

                $crmDocument->addMedia(storage_path('tmp/uploads/' . $request->input('document_file')))->toMediaCollection('document_file');
            }
        } elseif ($crmDocument->document_file) {
            $crmDocument->document_file->delete();
        }

        return redirect()->route('admin.crm-documents.index');
    }

    public function show(CrmDocument $crmDocument)
    {
        abort_if(Gate::denies('crm_document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmDocument->load('customer', 'purchased_items', 'pending_invoice', 'packing_slip_details', 'status');

        return view('admin.crmDocuments.show', compact('crmDocument'));
    }

    public function destroy(CrmDocument $crmDocument)
    {
        abort_if(Gate::denies('crm_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmDocument->delete();

        return back();
    }

    public function massDestroy(MassDestroyCrmDocumentRequest $request)
    {
        CrmDocument::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('crm_document_create') && Gate::denies('crm_document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CrmDocument();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
