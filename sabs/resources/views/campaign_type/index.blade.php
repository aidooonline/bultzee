@extends('layouts.admin')
@section('page-title')
    {{__('Campaigns Type')}}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0 ">{{__('Campaigns Type')}}</h5>
    </div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('Home')}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{__('Campaign Type')}}</li>
@endsection
@section('action-btn')
    @can('Create CampaignType')
        <a href="#" data-size="lg" data-url="{{ route('campaign_type.create') }}" data-ajax-popup="true" data-title="{{__('Create New Campaigns Type')}}" class="btn btn-sm btn-primary btn-icon-only rounded-circle">
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
                    <th scope="col" class="sort" data-sort="name">{{__('type')}}</th>
                    @if(Gate::check('Edit CampaignType') || Gate::check('Delete CampaignType'))
                        <th class="text-right">{{__('Action')}}</th>
                    @endif
                </tr>
                </thead>
                <tbody class="list">
                @foreach($types as $type)
                    <tr>
                        <td class="sorting_1">{{$type->name}}</td>
                        @if(Gate::check('Edit CampaignType') || Gate::check('Delete CampaignType'))
                            <td class="action text-right">
                                @can('Edit CampaignType')
                                    <a href="#" data-size="lg" data-url="{{ route('campaign_type.edit',$type->id) }}" data-ajax-popup="true" data-title="{{__('Edit type')}}" class="action-item">
                                        <i class="far fa-edit"></i>
                                    </a>
                                @endcan
                                @can('Delete CampaignType')
                                    <a href="#" class="action-item" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').' | '.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$type->id}}').submit();">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['campaign_type.destroy', $type->id],'id'=>'delete-form-'.$type->id]) !!}
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
