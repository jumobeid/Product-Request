@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.packingSlipDetail.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.packing-slip-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.packingSlipDetail.fields.id') }}
                        </th>
                        <td>
                            {{ $packingSlipDetail->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.packingSlipDetail.fields.packing_slip_number') }}
                        </th>
                        <td>
                            {{ $packingSlipDetail->packing_slip_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.packingSlipDetail.fields.packing_slip_item_details') }}
                        </th>
                        <td>
                            @foreach($packingSlipDetail->packing_slip_item_details as $key => $packing_slip_item_details)
                                <span class="label label-info">{{ $packing_slip_item_details->received_item_qty }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.packing-slip-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection