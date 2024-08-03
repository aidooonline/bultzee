@extends('layouts.admin')
@section('page-title')
    {{__('Shipping Provider')}}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0 ">{{__('Shipping Provider')}}</h5>
    </div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('Home')}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{__('Shipping Provider')}}</li>
@endsection
@section('action-btn')
    @can('Create ShippingProvider')
        <a href="#" data-size="lg" data-url="{{ route('shipping_provider.create') }}" data-ajax-popup="true" data-title="{{__('Create New Shipping Provider')}}" class="btn btn-sm btn-primary btn-icon-only rounded-circle">
            <i class="fa fa-plus"></i>
        </a>
    @endcan
@endsection
@section('filter')
@endsection

@section('content')
    <div class="card">
        <!-- Table -->
        <div class="table-responsive">
            <table class="table align-items-center dataTable">
                <thead>
                <tr>
                    <th scope="col" class="sort" data-sort="name">{{__('Shipping Provider')}}</th>
                    @if(Gate::check('Edit ProductTax') || Gate::check('Delete ProductTax'))
                        <th class="text-right">{{__('Action')}}</th>
                    @endif
                </tr>
                </thead>
                <tbody class="list">
                @foreach($shipping_providers as $shipping_provider)
                    <tr>
                        <td class="sorting_1">{{$shipping_provider->name}}</td>
                        @if(Gate::check('Edit ProductTax') || Gate::check('Delete ProductTax'))
                            <td class="action text-right">
                                @can('Edit ShippingProvider')
                                    <a href="#" data-size="lg" data-url="{{ route('shipping_provider.edit',$shipping_provider->id) }}" data-ajax-popup="true" data-title="{{__('Edit type')}}" class="action-item">
                                        <i class="far fa-edit"></i>
                                    </a>
                                @endcan
                                @can('Delete ShippingProvider')
                                    <a href="#" class="action-item" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').' | '.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$shipping_provider->id}}').submit();">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['shipping_provider.destroy', $shipping_provider->id],'id'=>'delete-form-'.$shipping_provider->id]) !!}
                                    {!! Form::close() !!}
                                @endcan
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
