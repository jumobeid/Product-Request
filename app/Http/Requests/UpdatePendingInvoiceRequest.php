<?php

namespace App\Http\Requests;

use App\Models\PendingInvoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePendingInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pending_invoice_edit');
    }

    public function rules()
    {
        return [
            'pending_invoice_total_amount' => [
                'numeric',
                'required',
            ],
            'invoice_due_date'             => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'discount_code'                => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'tax'                          => [
                'numeric',
                'required',
            ],
        ];
    }
}
