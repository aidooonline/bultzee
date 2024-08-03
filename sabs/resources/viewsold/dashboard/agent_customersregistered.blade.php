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
    <h4 class="card-title" style="margin-top:20px;">Customers Regsitered: <strong class="text-warning">{{$agentname}} </strong>
      </h4> 
 

    <div class="listdiv2 rounded" style="margin-top:0 !important;padding-left:0 !important;padding-right:0 !important;margin-top:0;">
       
      <table class="table" style="vertical-align: center;text-align:center;">
       @foreach ($agentdata as $agent)
       <tr>
        <td><a href="tel:{{$agent->phone}}" class="btn btn-xs btn-purple rounded"><i class="fa fa-phone"></i> Call </a></td>
        <td><a href="mailto:{{$agent->email}}" class="btn btn-xs btn-purple rounded"><i class="fa fa-envelope"></i> Mail</a></td>
        <td><a href="sms://{{$agent->phone}}" class="btn btn-xs btn-purple rounded"><i class="fa fa-envelope-open-text"></i> Sms</a></td>
        <td><a href="https://wa.me/{{$agent->phone}}" class="btn btn-xs btn-purple rounded"><i class="fa fa-whatsapp"></i> Whatsapp</a></td>
    </tr>
       @endforeach
       
    </table>
      
      
       
      </div>
      
       
      
       
      
      
      
      <div class="listdiv2 rounded" style="margin-top:0 !important;padding-left:0 !important;padding-right:0 !important;margin-top:0;">
             
        <table style="background-color:#f4e9f7 !important;margin-top:20px;"  class="table-striped table-border table-panel rounded">
           
            <tr>
                <td class="mintd" style="padding:1px 1px;"><strong>Customers Registered</strong></td>
                 
              </tr>
                <tr>
                    <td class="mintd" style="padding:1px 1px;">Today:</td>
                    <td class="mintd" style="padding:1px 1px;" id="todaytotal">{{$todaytotalCR}}</td>
                  </tr>
      
                  <tr>
                    <td class="mintd" style="padding:1px 1px;">This Week:</td>
                    <td class="mintd" style="padding:1px 1px;" id="thisweektotal">{{$thisweektotalCR}}</td>
                  </tr>
      
                  <tr>
                    <td class="mintd" style="padding:1px 1px;">This Month:</td>
                    <td class="mintd" style="padding:1px 1px;" id="thismonthtotal">{{$thismonthtotalCR}}</td>
                  </tr>
      
                  <tr>
                    <td class="mintd" style="padding:1px 1px;">This Year:</td>
                    <td class="mintd" style="padding:1px 1px;" id="thismonthtotal">{{$thisyeartotalCR}}</td>
                  </tr>
      
            
          </table>
      </div>
      
       
          
<div style="width:97%;position:relative;height:auto;margin-left:2%;margin-right:1% !important;">
    <table id="tdetailstable" class="table-striped tableFixHead table-bordered" style="padding-bottom:0;position:relative;">
        <thead style="background-color:#ffffff !important;z-index:1">
            <tr>
                <th><strong>Name</strong></th>
                <th><strong>Acc. No</strong></th>
                <th><strong>Phone</strong></th>
                <th><strong>Occupation</strong></th>
            </tr>
        </thead>
        <tbody>
            @foreach($accounts as $account)

            <tr>
                <td>{{$account->first_name}} {{$account->surname}}</td>
                <td><strong>{{$account->account_number}}</strong></td>
                <td>{{$account->phone_number}}</td>
                <td>{{$account->occupation}}</td>
            </tr>

            @endforeach
        </tbody>
        
    </table>
</div>
      

    
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