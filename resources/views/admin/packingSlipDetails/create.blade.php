@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.packingSlipDetail.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.packing-slip-details.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="packing_slip_number">{{ trans('cruds.packingSlipDetail.fields.packing_slip_number') }}</label>
                <input class="form-control {{ $errors->has('packing_slip_number') ? 'is-invalid' : '' }}" type="number" name="packing_slip_number" id="packing_slip_number" value="{{ old('packing_slip_number', '') }}" step="1" required>
                @if($errors->has('packing_slip_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('packing_slip_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.packingSlipDetail.fields.packing_slip_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="packing_slip_item_details">{{ trans('cruds.packingSlipDetail.fields.packing_slip_item_details') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('packing_slip_item_details') ? 'is-invalid' : '' }}" name="packing_slip_item_details[]" id="packing_slip_item_details" multiple>
                    @foreach($packing_slip_item_details as $id => $packing_slip_item_details)
                        <option value="{{ $id }}" {{ in_array($id, old('packing_slip_item_details', [])) ? 'selected' : '' }}>{{ $packing_slip_item_details }}</option>
                    @endforeach
                </select>
                @if($errors->has('packing_slip_item_details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('packing_slip_item_details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.packingSlipDetail.fields.packing_slip_item_details_helper') }}</span>
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