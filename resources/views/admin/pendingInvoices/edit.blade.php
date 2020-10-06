@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.pendingInvoice.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pending-invoices.update", [$pendingInvoice->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="pending_invoice_total_amount">{{ trans('cruds.pendingInvoice.fields.pending_invoice_total_amount') }}</label>
                <input class="form-control {{ $errors->has('pending_invoice_total_amount') ? 'is-invalid' : '' }}" type="number" name="pending_invoice_total_amount" id="pending_invoice_total_amount" value="{{ old('pending_invoice_total_amount', $pendingInvoice->pending_invoice_total_amount) }}" step="0.01" required>
                @if($errors->has('pending_invoice_total_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pending_invoice_total_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pendingInvoice.fields.pending_invoice_total_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="invoice_due_date">{{ trans('cruds.pendingInvoice.fields.invoice_due_date') }}</label>
                <input class="form-control date {{ $errors->has('invoice_due_date') ? 'is-invalid' : '' }}" type="text" name="invoice_due_date" id="invoice_due_date" value="{{ old('invoice_due_date', $pendingInvoice->invoice_due_date) }}">
                @if($errors->has('invoice_due_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_due_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pendingInvoice.fields.invoice_due_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discount_code">{{ trans('cruds.pendingInvoice.fields.discount_code') }}</label>
                <input class="form-control {{ $errors->has('discount_code') ? 'is-invalid' : '' }}" type="number" name="discount_code" id="discount_code" value="{{ old('discount_code', $pendingInvoice->discount_code) }}" step="1">
                @if($errors->has('discount_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pendingInvoice.fields.discount_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tax">{{ trans('cruds.pendingInvoice.fields.tax') }}</label>
                <input class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" type="number" name="tax" id="tax" value="{{ old('tax', $pendingInvoice->tax) }}" step="0.01" required>
                @if($errors->has('tax'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pendingInvoice.fields.tax_helper') }}</span>
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