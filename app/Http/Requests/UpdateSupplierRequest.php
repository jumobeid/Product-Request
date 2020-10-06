<?php

namespace App\Http\Requests;

use App\Models\Supplier;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSupplierRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('supplier_edit');
    }

    public function rules()
    {
        return [
            'name'               => [
                'string',
                'required',
            ],
            'address'            => [
                'required',
            ],
            'pending_invoices.*' => [
                'integer',
            ],
            'pending_invoices'   => [
                'required',
                'array',
            ],
            'purchase_orders.*'  => [
                'integer',
            ],
            'purchase_orders'    => [
                'required',
                'array',
            ],
        ];
    }
}
