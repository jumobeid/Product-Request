<?php

namespace App\Http\Requests;

use App\Models\PackingSlipDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePackingSlipDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('packing_slip_detail_edit');
    }

    public function rules()
    {
        return [
            'packing_slip_number'         => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'packing_slip_item_details.*' => [
                'integer',
            ],
            'packing_slip_item_details'   => [
                'array',
            ],
        ];
    }
}
