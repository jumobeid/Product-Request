@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.packingSlipItemDetail.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.packing-slip-item-details.update", [$packingSlipItemDetail->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="received_item_qty">{{ trans('cruds.packingSlipItemDetail.fields.received_item_qty') }}</label>
                <input class="form-control {{ $errors->has('received_item_qty') ? 'is-invalid' : '' }}" type="number" name="received_item_qty" id="received_item_qty" value="{{ old('received_item_qty', $packingSlipItemDetail->received_item_qty) }}" step="1" required>
                @if($errors->has('received_item_qty'))
                    <div class="invalid-feedback">
                        {{ $errors->first('received_item_qty') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.packingSlipItemDetail.fields.received_item_qty_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection