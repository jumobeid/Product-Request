<?php

namespace App\Http\Requests;

use App\Models\PendingInvoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPendingInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pending_invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pending_invoices,id',
        ];
    }
}
