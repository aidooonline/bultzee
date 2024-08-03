@section('action-btn')

<!-- literally user can create accounts -->
 
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
    <h4 class="card-title" style="margin-top:20px;">
        Customers
      </h4>
    

      @foreach($accounts as $account)
      <button id="accountbtnpanel_{{$account->id}}"  class="accordion card listdiv" style="background:#fff;width:99%;padding-left:0;padding-right:0;margin-left:0;margin-right:0;">
 
          <table>
              <tr>
                  <td width="23%">
  
                      <div> 
  
                          @if($account->is_dataimage == 1)
                          <img style="position:relative;float:left;margin-right:10px;" class="rounded-circle profilepic" src="{{$account->customer_customer_picture}}" is_dataimage="{{$account->is_dataimage}}" profilevalue="{{$account->customer_picture}}">
                          @endif
  
                          @if($account->is_dataimage == 0)
                          <img style="position:relative;float:left;margin-right:10px;" class="rounded-circle profilepic" src="{{env('NOBS_IMAGES')}}/profileimage.png" profilevalue="{{$account->customer_picture}}">
                          @endif
  
                      </div>
                 
                  </td>
                  <td width="77%" style="text-align:left; ">
                      <div style="text-align:left;padding-top:1px !important;">
                          <h6 class="account_name" style="padding-top:1px !important;">
                              {{$account->first_name}} {{$account->middle_name}} {{$account->surname}}</h6>
                              <h6 style="color:#724c78;text-align:left !important;">{{$account->phone}}</h6>
                      
                      {{$account->email}} -- {{$account->residential_address}}
                      <h6 style="color:#5e7eb9;text-align:left !important;">{{$account->account_number}}</h6>
                      </div>
                  </td>
              </tr>
          </table>
  
      </button>
      
  
      @include("accounts.accountspartial_singletotal")
  
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
        height: auto !important;

         
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