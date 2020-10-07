<?php

namespace App\Http\Requests;

use App\Models\CrmDocument;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCrmDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('crm_document_create');
    }

    public function rules()
    {
        return [
            'customer_id'            => [
                'required',
                'integer',
            ],
            'document_file'          => [
                'required',
            ],
            'name'                   => [
                'string',
                'required',
            ],
            'description'            => [
                'required',
            ],
            'purchased_items.*'      => [
                'integer',
            ],
            'purchased_items'        => [
                'required',
                'array',
            ],
            'pending_invoice_id'     => [
                'required',
                'integer',
            ],
            'packing_slip_details.*' => [
                'integer',
            ],
            'packing_slip_details'   => [
                'required',
                'array',
            ],
            'status_id'              => [
                'required',
                'integer',
            ],
        ];
    }
}
