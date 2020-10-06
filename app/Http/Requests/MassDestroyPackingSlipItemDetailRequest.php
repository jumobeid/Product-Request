<?php

namespace App\Http\Requests;

use App\Models\PackingSlipItemDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPackingSlipItemDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('packing_slip_item_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:packing_slip_item_details,id',
        ];
    }
}
