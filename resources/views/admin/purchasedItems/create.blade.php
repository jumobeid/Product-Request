@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.purchasedItem.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.purchased-items.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="quantity">{{ trans('cruds.purchasedItem.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', '') }}" step="1" required>
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasedItem.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.purchasedItem.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasedItem.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="product_id">{{ trans('cruds.purchasedItem.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                    @foreach($products as $id => $product)
                        <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $product }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasedItem.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="packing_slip_details">{{ trans('cruds.purchasedItem.fields.packing_slip_details') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('packing_slip_details') ? 'is-invalid' : '' }}" name="packing_slip_details[]" id="packing_slip_details" multiple>
                    @foreach($packing_slip_details as $id => $packing_slip_details)
                        <option value="{{ $id }}" {{ in_array($id, old('packing_slip_details', [])) ? 'selected' : '' }}>{{ $packing_slip_details }}</option>
                    @endforeach
                </select>
                @if($errors->has('packing_slip_details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('packing_slip_details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasedItem.fields.packing_slip_details_helper') }}</span>
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