<?php

namespace App\Http\Requests;

use App\Models\PackingSlipDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPackingSlipDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('packing_slip_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:packing_slip_details,id',
        ];
    }
}
