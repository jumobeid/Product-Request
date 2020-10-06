<?php

namespace App\Http\Requests;

use App\Models\PurchasedItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPurchasedItemRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('purchased_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:purchased_items,id',
        ];
    }
}
