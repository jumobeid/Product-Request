@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.crmDocument.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.crm-documents.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="customer_id">{{ trans('cruds.crmDocument.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                    @foreach($customers as $id => $customer)
                        <option value="{{ $id }}" {{ old('customer_id') == $id ? 'selected' : '' }}>{{ $customer }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmDocument.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="document_file">{{ trans('cruds.crmDocument.fields.document_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('document_file') ? 'is-invalid' : '' }}" id="document_file-dropzone">
                </div>
                @if($errors->has('document_file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('document_file') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmDocument.fields.document_file_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.crmDocument.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmDocument.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.crmDocument.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmDocument.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="purchased_items">{{ trans('cruds.crmDocument.fields.purchased_items') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('purchased_items') ? 'is-invalid' : '' }}" name="purchased_items[]" id="purchased_items" multiple required>
                    @foreach($purchased_items as $id => $purchased_items)
                        <option value="{{ $id }}" {{ in_array($id, old('purchased_items', [])) ? 'selected' : '' }}>{{ $purchased_items }}</option>
                    @endforeach
                </select>
                @if($errors->has('purchased_items'))
                    <div class="invalid-feedback">
                        {{ $errors->first('purchased_items') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmDocument.fields.purchased_items_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pending_invoice_id">{{ trans('cruds.crmDocument.fields.pending_invoice') }}</label>
                <select class="form-control select2 {{ $errors->has('pending_invoice') ? 'is-invalid' : '' }}" name="pending_invoice_id" id="pending_invoice_id">
                    @foreach($pending_invoices as $id => $pending_invoice)
                        <option value="{{ $id }}" {{ old('pending_invoice_id') == $id ? 'selected' : '' }}>{{ $pending_invoice }}</option>
                    @endforeach
                </select>
                @if($errors->has('pending_invoice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pending_invoice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmDocument.fields.pending_invoice_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="packing_slip_details">{{ trans('cruds.crmDocument.fields.packing_slip_detail') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('packing_slip_details') ? 'is-invalid' : '' }}" name="packing_slip_details[]" id="packing_slip_details" multiple>
                    @foreach($packing_slip_details as $id => $packing_slip_detail)
                        <option value="{{ $id }}" {{ in_array($id, old('packing_slip_details', [])) ? 'selected' : '' }}>{{ $packing_slip_detail }}</option>
                    @endforeach
                </select>
                @if($errors->has('packing_slip_details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('packing_slip_details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmDocument.fields.packing_slip_detail_helper') }}</span>
            </div>
            
            <div class="form-group">
                <label for="status_id">{{ trans('cruds.crmDocument.fields.status') }}</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id">
                    @foreach($statuses as $id => $status)
                        <option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmDocument.fields.status_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.documentFileDropzone = {
    url: '{{ route('admin.crm-documents.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="document_file"]').remove()
      $('form').append('<input type="hidden" name="document_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="document_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($crmDocument) && $crmDocument->document_file)
      var file = {!! json_encode($crmDocument->document_file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="document_file" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection