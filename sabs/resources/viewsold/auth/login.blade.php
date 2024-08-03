@extends('layouts.auth')
@section('page-title')
    {{__('Login')}}
@endsection
@section('content')


    <div class="login segments-page2">
        <div class="container">
            <div class="section-title" style="margin-top:100px;margin-bottom:50px;	">
                
 
                <h1 style="display:none">{{env('COMPANY_NAME')}}</h1>
               
            </div>
            <div class="col-sm-8 col-lg-4">
                
                <div class="zindex-100 mb-0">
                    <div class="px-md-5 py-5">
                        
                        <style>

                            #loginform .email{
                                background-color:purple !important;
                            }
                            .loginform input[type='text'], input[type='email'], input[type='password'] {
    height: 60px !important;
    border-radius: 5px !important;
    font-size: 19px !important;
    background-color:purple !important;
}
                        </style>
                        <span class="clearfix"></span>
                        {{Form::open(array('route'=>'login','method'=>'post','id'=>'loginForm','class'=> 'loginform' ))}}
                        
                            
 
                                {{Form::text('email',null,array('class' => 'email','placeholder'=>__('Enter Your Emails')))}}
                                @error('email')
                                <span class="invalid-email text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                       
                               
                                {{Form::password('password',array('class'=>'form-control','placeholder'=>__('Enter Your Password')))}}
                                
                                @error('password')
                                <span class="invalid-password text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                           
                       
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-icon round rounded-pill text-white" id="saveBtn" onclick="showhidediv('loadingdiv');" />
                          
                        </div>
                        {{Form::close()}}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
  function showhidediv(divid){
 $('#'+ divid).toggle();
  }
</script>
 
@endsection
    
