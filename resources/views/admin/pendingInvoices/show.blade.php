@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pendingInvoice.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pending-invoices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pendingInvoice.fields.id') }}
                        </th>
                        <td>
                            {{ $pendingInvoice->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pendingInvoice.fields.pending_invoice_total_amount') }}
                        </th>
                        <td>
                            {{ $pendingInvoice->pending_invoice_total_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pendingInvoice.fields.invoice_due_date') }}
                        </th>
                        <td>
                            {{ $pendingInvoice->invoice_due_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pendingInvoice.fields.discount_code') }}
                        </th>
                        <td>
                            {{ $pendingInvoice->discount_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pendingInvoice.fields.tax') }}
                        </th>
                        <td>
                            {{ $pendingInvoice->tax }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pending-invoices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection