<?php

namespace App\Http\Requests;

use App\Models\CrmDocument;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCrmDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('crm_document_edit');
    }

    public function rules()
    {
        return [
            'customer_id'            => [
                'required',
                'integer',
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
