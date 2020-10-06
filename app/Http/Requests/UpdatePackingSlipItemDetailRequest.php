<?php

namespace App\Http\Requests;

use App\Models\PackingSlipItemDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePackingSlipItemDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('packing_slip_item_detail_edit');
    }

    public function rules()
    {
        return [
            'received_item_qty' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
