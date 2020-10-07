@extends('layouts.admin')
@section('content')
@can('pending_invoice_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.pending-invoices.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.pendingInvoice.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.pendingInvoice.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PendingInvoice">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.pendingInvoice.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.pendingInvoice.fields.pending_invoice_total_amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.pendingInvoice.fields.invoice_due_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.pendingInvoice.fields.discount_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.pendingInvoice.fields.tax') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendingInvoices as $key => $pendingInvoice)
                        <tr data-entry-id="{{ $pendingInvoice->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $pendingInvoice->id ?? '' }}
                            </td>
                            <td>
                                {{ $pendingInvoice->pending_invoice_total_amount ?? '' }}
                            </td>
                            <td>
                                {{ $pendingInvoice->invoice_due_date ?? '' }}
                            </td>
                            <td>
                                {{ $pendingInvoice->discount_code ?? '' }}
                            </td>
                            <td>
                                {{ $pendingInvoice->tax ?? '' }}
                            </td>
                            <td>
                                @can('pending_invoice_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.pending-invoices.show', $pendingInvoice->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('pending_invoice_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.pending-invoices.edit', $pendingInvoice->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('pending_invoice_delete')
                                    <form action="{{ route('admin.pending-invoices.destroy', $pendingInvoice->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('pending_invoice_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pending-invoices.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-PendingInvoice:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection