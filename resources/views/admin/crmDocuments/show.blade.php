@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.crmDocument.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.crm-documents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.crmDocument.fields.id') }}
                        </th>
                        <td>
                            {{ $crmDocument->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmDocument.fields.customer') }}
                        </th>
                        <td>
                            {{ $crmDocument->customer->first_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmDocument.fields.document_file') }}
                        </th>
                        <td>
                            @if($crmDocument->document_file)
                                <a href="{{ $crmDocument->document_file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmDocument.fields.name') }}
                        </th>
                        <td>
                            {{ $crmDocument->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmDocument.fields.description') }}
                        </th>
                        <td>
                            {{ $crmDocument->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmDocument.fields.purchased_items') }}
                        </th>
                        <td>
                            @foreach($crmDocument->purchased_items as $key => $purchased_items)
                                <span class="label label-info">{{ $purchased_items->quantity }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmDocument.fields.pending_invoice') }}
                        </th>
                        <td>
                            {{ $crmDocument->pending_invoice->pending_invoice_total_amount ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmDocument.fields.packing_slip_detail') }}
                        </th>
                        <td>
                            @foreach($crmDocument->packing_slip_details as $key => $packing_slip_detail)
                                <span class="label label-info">{{ $packing_slip_detail->packing_slip_number }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmDocument.fields.status') }}
                        </th>
                        <td>
                            {{ $crmDocument->status->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.crm-documents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection