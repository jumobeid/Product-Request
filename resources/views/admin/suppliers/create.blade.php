@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.supplier.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.suppliers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.supplier.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.supplier.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.supplier.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address" required>{{ old('address') }}</textarea>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.supplier.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="pending_invoices">{{ trans('cruds.supplier.fields.pending_invoices') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('pending_invoices') ? 'is-invalid' : '' }}" name="pending_invoices[]" id="pending_invoices" multiple required>
                    @foreach($pending_invoices as $id => $pending_invoices)
                        <option value="{{ $id }}" {{ in_array($id, old('pending_invoices', [])) ? 'selected' : '' }}>{{ $pending_invoices }}</option>
                    @endforeach
                </select>
                @if($errors->has('pending_invoices'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pending_invoices') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.supplier.fields.pending_invoices_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="purchase_orders">{{ trans('cruds.supplier.fields.purchase_orders') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('purchase_orders') ? 'is-invalid' : '' }}" name="purchase_orders[]" id="purchase_orders" multiple required>
                    @foreach($purchase_orders as $id => $purchase_orders)
                        <option value="{{ $id }}" {{ in_array($id, old('purchase_orders', [])) ? 'selected' : '' }}>{{ $purchase_orders }}</option>
                    @endforeach
                </select>
                @if($errors->has('purchase_orders'))
                    <div class="invalid-feedback">
                        {{ $errors->first('purchase_orders') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.supplier.fields.purchase_orders_helper') }}</span>
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