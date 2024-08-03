@extends('layouts.admin')

@section('page-title')
    {{ $formBuilder->name.__("'s Form Field") }}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"> {{ $formBuilder->name.__(" Form Field") }}</h5>
    </div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('form_builder.index')}}">{{__('Form Builder')}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{__('Add Field')}}</li>
@endsection
@section('action-btn')
    @can('Create Form Field')
        <a href="#" data-size='md' data-url="{{ route('form.field.create',$formBuilder->id) }}" data-size="md" data-ajax-popup="true" data-title="{{__('Create New Filed')}}" class="btn btn-sm btn-white btn-icon-only rounded-circle" data-toggle="tooltip">
            <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
        </a>
    @endcan
@endsection

@section('content')

    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center dataTable">
                <thead>
                <tr>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Type')}}</th>
                    @if(\Auth::user()->can('Edit Form Field') || \Auth::user()->can('Delete Form Field'))
                        <th class="text-right" width="200px">{{__('Action')}}</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @if($formBuilder->form_field->count())
                    @foreach ($formBuilder->form_field as $field)
                        <tr>
                            <td>{{ $field->name }}</td>
                            <td>{{ ucfirst($field->type) }}</td>
                            @if(\Auth::user()->can('Edit Form Field') || \Auth::user()->can('Delete Form Field'))
                                <td class="text-right">
                                    @can('Edit Form Field')
                                        <a href="#" class="action-item" data-url="{{ route('form.field.edit',[$formBuilder->id,$field->id]) }}" data-ajax-popup="true" data-title="{{__('Edit Field')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can('Delete Form Field')
                                        <a href="#!" class="action-item" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-{{$field->id}}').submit();">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['form.field.destroy', [$formBuilder->id,$field->id]],'id'=>'delete-form-'.$field->id]) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" class="text-center">{{__('No data available in table')}}</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection

