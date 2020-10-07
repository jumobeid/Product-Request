@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.purchasedItem.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchased-items.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasedItem.fields.id') }}
                        </th>
                        <td>
                            {{ $purchasedItem->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasedItem.fields.quantity') }}
                        </th>
                        <td>
                            {{ $purchasedItem->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasedItem.fields.price') }}
                        </th>
                        <td>
                            {{ $purchasedItem->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasedItem.fields.product') }}
                        </th>
                        <td>
                            {{ $purchasedItem->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasedItem.fields.packing_slip_details') }}
                        </th>
                        <td>
                            @foreach($purchasedItem->packing_slip_details as $key => $packing_slip_details)
                                <span class="label label-info">{{ $packing_slip_details->packing_slip_number }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchased-items.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection