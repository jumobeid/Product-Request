<?php

namespace App\Http\Requests;

use App\Models\PurchasedItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePurchasedItemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('purchased_item_create');
    }

    public function rules()
    {
        return [
            'quantity'               => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'price'                  => [
                'required',
            ],
            'product_id'             => [
                'required',
                'integer',
            ],
            'packing_slip_details.*' => [
                'integer',
            ],
            'packing_slip_details'   => [
                'array',
            ],
        ];
    }
}
