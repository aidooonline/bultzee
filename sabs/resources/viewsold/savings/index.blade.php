@section('action-btn')

<!-- literally user can create accounts -->
@can('Create Product')
<a href="#" data-size="lg" data-url="{{ route('accounts.create') }}" data-ajax-popup="true"
    data-title="{{__('Create New Account')}}" class="btn btn-sm btn-purple btn-icon-only rounded-circle">
    <i class="fa fa-plus"></i>
</a>
@endcan
@endsection

 

@extends('layouts.admin')
 
@section('title')
 
@endsection
 
@section('action-btn')

@endsection
@section('content')

@include('layouts.inlinecss')

<div  class="row dashboardtext" style="padding-bottom:150px;padding-top:60px;">

 @include('layouts.search')
<div id="mainsearchdiv">
     
@include('savings.savingspartial_alltotal')

    @foreach($savingsaccounts as $savings)

    <button id="accountbtnpanel_{{$savings->id}}" onclick="dataapi('{{$savings->id}}',this);" class="accordion card listdiv" style="height:60px;background:#fff;width:99%;padding-left:20px;padding-right:20px;margin-left:0;margin-right:0;">

        <table>
            <tr>
                
                <td  style="text-align:left; ">
                    <div style="text-align:left;padding-top:1px !important;">
                        <h6 class="account_name" style="padding-top:1px !important;">
                            {{$savings->account_name}}</h6>
                    
                           
                    </div>
                </td>
            </tr>
        </table>

    </button>
   
@include('savings.savingspartial_singletotal')

    @endforeach
</div>
</div>
<style>

table td[class='mintd'] {
        padding: 5px 25px !important;
    }

    .account_name{
        color:#666666;text-align:left !important;font-weight:bold;font-family:verdana;
    }

    .table-panel td{
        font-size:1em !important;
        color:rgb(65, 6, 65);
        font-family:Verdana, Geneva, Tahoma, sans-serif;
    }
    .accordion img {
        width: 65px;
        height: 65px;
    }

    .listdiv  {
        width: 25%;
        height: 120px;

         
    }

    .listdiv .listdiv .image {
        width: 25%;
        height: 70px;

        
    }

    .listdiv .listdiv img {
        width: 70px;
        height: 70px;
    }

    .listdiv .listdiv .text {
        width: 75%;
        height: 70px;
        background-color: green;
    }

    .listdiv .listdiv .text a,
    .listdiv .listdiv .text span {
        float: left;
        color: purple;
    }


    .listdiv2{
        height:auto !important;
        height:600px;
    }

    .listdiv2 .listdiv2 .image {
        width: 25%;
        height: auto;
 
    }

    .listdiv2 .listdiv2 img {
        width: 70px;
        height: 70px;
    }

    .listdiv2 .listdiv2 .text {
        width: 75%;
        height: 70px;
        background-color: green;
    }

    .listdiv2 .listdiv2 .text a,
    .listdiv2 .listdiv2 .text span {
        float: left;
        color: purple;
    }


</style>







@include("layouts.modalview1")



@include("layouts.modalscripts")



@endsection

@push('script-page')

@endpush