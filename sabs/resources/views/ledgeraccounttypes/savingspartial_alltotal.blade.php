 



<h4 style="width:100%;position:relative;padding-left:20px;" class="text-warning"> Ledger Account Types
</h4>

 <div class="listdiv2 rounded" style="margin-top:0 !important;padding-left:0 !important;padding-right:0 !important;margin-top:10px;padding-top:5px;padding-bottom:10px;">
     
     

 
    <a href="{{route('ledgeraccounttypes.create')}}" style="position:absolute;right:15px;top:30px;" href="#" class="btn btn-purple  mr-1 btn-fab btn-sm">
      <i class="fa fa-plus"></i>
    </a>
     
   
   
   
   <!-- TODAY -->
   @if(\Auth::user()->type=='Admin' || \Auth::user()->type=='owner')
  

   @foreach($ledgeraccountypes as $ledgertypes)
   <div class="col-xl-4 col-lg-6 col-md-6 col-12" id="ledgerid_{{$ledgertypes->id}}">
	 <div class="card bg-white pt-2 pb-2">
		 <div class="card-body">
			 <div class="card-block pt-2 pb-0">
				 <div class="media"> 
					 <div class="media-body white text-left">
						{{--  <h6 class="font-medium-5 mb-0 text-purple"><span  class="text-muted ghs"></span>{{number_format($todaytotalDP, 3, '.', ',')}} </h6> --}}
						 <span class="grey darken-1">{{$ledgertypes->name}}</span>
					 </div>
					 <div class="media-right text-right">
						 <i class="fas fa-arrow-circle-down text-purple font-medium-1"></i>

					 </div>
				 </div>
			 </div>
		  
		 </div>
	  </div>
  </div>
  @endforeach
   

   

  @endif
   <!-- END TODAY -->
   
    
    
   
  
   
   
 
   
     
   
 

<style>
    .ghs{
        font-weight:normal !important;
        font-size:13px;
    }
    
    .displaydivs{
        padding-bottom:50px;
    }
    
     
    #thisweekdiv,
    #thismonthdiv,
    #thisyeardiv,
    #alltimediv{
        display:none;
    }
</style>

<script type="text/javascript">

function getfilter(that){
    switch(that){
        case 'Today':
        
         $('.displaydivs').hide();
         $('#todaydiv').show(300);
         $('#filtertext').html(that);
        break;
        
        case 'This Week':
         $('.displaydivs').hide();
         $('#thisweekdiv').show(300); 
         $('#filtertext').html(that);
         
        break;
        
        case 'This Month':
           $('.displaydivs').hide();
         $('#thismonthdiv').show(300);
         $('#filtertext').html(that);
         
        break;
        
        case 'This Year':
            $('.displaydivs').hide();
         $('#thisyeardiv').show(300);
         $('#filtertext').html(that);
         
        break;
        
        case 'All Time':
            $('.displaydivs').hide();
         $('#alltimediv').show(300);
         $('#filtertext').html(that);
         
        break;
            
       
    }
}

function getfilterbyagent(that){
   
  if(that == 'agentid_agentallid12345'){
      showhidediv('loadingdiv');
      location.href="{{route('dashboard.index')}}";
      
  }else{
      showhidediv('loadingdiv');
      location.href="{{route('agentquerydashboard.index')}}/" + that;
      
  }
}

</script>




