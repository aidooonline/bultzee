{{Form::model($documentType, array('route' => array('document_type.update', $documentType->id), 'method' => 'PUT')) }}
<div class="row">
    <div class="col-12">
        <div class="form-group">
            {{Form::label('name',__('Name'))}}
            {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Document Type')))}}
            @error('name')
            <span class="invalid-name" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="text-right">
    {{Form::submit(__('Update'),array('class'=>'btn btn-sm btn-primary rounded-pill'))}}
</div>
{{Form::close()}}
