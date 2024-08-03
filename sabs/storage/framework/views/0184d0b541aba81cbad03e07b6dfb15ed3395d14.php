<?php $__env->startSection('title'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.inlinecss', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="row dashboardtext" style="padding-bottom:50px;padding-top:10px;">
    <h4 class="card-title">
        Create Loan Request
    </h4>

    <div id="mainsearchdiv">
        
        <div class="listdiv2"
            style="padding-top:20px;margin-top:0 !important;padding-left:0 !important;padding-right:0 !important;border-radius:10px 10px;background-color:rgb(255, 255, 255) !important;">
           
            <a onclick="$('#addcustomertoloan').modal('show');" style="width:auto;float:right;border-radius:8px;padding:2px 8px !important;" href="#" class="btn btn-sm btn-purple btn-icon-only">
            <i class="fas fa-user-plus"></i> Add Customer
            </a>
<br/>    

          
            <?php echo e(Form::open(array('url'=>'loanrequestdetail','method'=>'post','enctype'=>'multipart/form-data'))); ?>


            <div id="tab1">

                <h4 class="row" style="margin-left:18px;width:100%;margin-bottom:40px;color:#898989">1. Customer Information</h4>
                
                <div class="row col-12">
                    <div style="float:left;" class="form-group col-2 chat-avatar"> 
                        <img src="<?php echo e(env('NOBS_IMAGES')); ?>useraccounts/profileimage.png" class="rounded-circle" id="customerimage"  style="width:80px;height:auto;"/>
                    </div>
                    
                    
                    
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label>FirstName</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" value="" readonly/>
                        
                    </div>
                </div>
               
                <div class="col-12">
                    <div class="form-group">
                        <label>LastName</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" value="" readonly/>
                        
                    </div>
                </div>
                 

                <div class="col-12">
                    <div class="form-group">
                        <label>Contact</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number" value="" readonly/>
                        
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label>Customer Account Number</label>
                        <input type="text" class="form-control" name="account_number" id="account_number" value="" readonly/>
                    </div>
                        
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label>Loan Account Number</label>
                       
                        <input type="text" class="form-control" name="loan_account_number" id="loanaccountnumbergen" value="" readonly/>
                        
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label>Business Capital</label>
                        <?php echo e(Form::text('bus_capital',null,array('class'=>'form-control','required'=>'required'))); ?>

                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label>Estimated Daily Sales</label>
                        <?php echo e(Form::text('est_daily_sales',null,array('class'=>'form-control','placeholder'=>__('')))); ?>

                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label>Estimated Daily Expense</label>
                        <?php echo e(Form::text('est_daily_exp',null,array('class'=>'form-control','placeholder'=>__('')))); ?>

                    </div>
                </div>

                <div id="tab1btn" class="col-12">
                    <div class="form-group">
                        <a href="#" onclick="getnavigation('loaninfo')" class="btn mr-1 btn-round btn-dark"><i
                                class="fas fa-angle-double-right"></i> Next: Loan Info</a>
                    </div>
                </div>
 
            </div>

            <div style="display:none;" id="tab2">
                
                <h4 class="row" style="margin-left:18px;width:100%;margin-bottom:40px;color:#898989">2. Loan Information</h4>
                <input type="hidden" name="id" value="" />

                <input type="hidden" name="loan_migrated" value="" />
                <input type="hidden" name="user" value="<?php echo e(\Auth::user()->created_by_user); ?>" />
                <input type="hidden" name="agent_id" value="<?php echo e(\Auth::user()->id); ?>" />
                <input type="hidden" name="customer_account_id" id="customer_account_id" value="" /> 

                <div class="col-12">
                    <div class="form-group">
                        <label>Loan Type</label>
                        <?php echo e(Form::select('loantypedraft', $loantypes, null,array('class' => 'form-control
                        ','data-toggle'=>'select','onChange' => 'getselectedloantext(this)','id' => 'loantypedraft','name' => 'loan_id'))); ?>

                    </div>
                </div>
 

                <div class="col-12">
                    <div class="form-group">
                        <label>Requested Amount</label>
                        <?php echo e(Form::text('amount',null,array('class'=>'form-control','required'=>'required'))); ?>

                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label>Loan Purpose</label>
                        <?php echo e(Form::select('loan_purpose', $loanpurpose, null,array('class' => 'form-control
                        ','data-toggle'=>'select','id'=>'loanpurposeid'))); ?>


                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group row pl-2">
                        <label>Requested Date</label>
                        <?php echo e(Form::text('created_at',null,array('class'=>'form-control date1','id'=>'requesteddate'))); ?>

                        <?php echo e(Form::date('created_at2',null,array('class'=>'form-control date date2','onchange'=>'getselecteddate(event,"requesteddate")'))); ?>

                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label>IRPM</label>
                        <?php echo e(Form::text('irpm',null,array('class'=>'form-control'))); ?>

                    </div>
                </div>


                <div  class="col-12">
                    <div class="form-group row pl-2">
                        <label>Expected Disbursement Date</label>
                        <?php echo e(Form::text('expected_disbursement_date',null,array('class'=>'form-control date1','id'=>'expecteddisbursementdate'))); ?>

                        <?php echo e(Form::date('expected_disbursement_date2',null,array('class'=>'form-control date date2','onchange'=>'getselecteddate(event,"expecteddisbursementdate")'))); ?>

                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label>Mode of Payment</label>
                        <?php echo e(Form::text('mode_of_pmt',null,array('class'=>'form-control','placeholder'=>__('')))); ?>

                    </div>
                </div>

                <div  style="display:none" class="col-12">
                    <div class="form-group">
                        <label>Disbursement Date</label>
                        <?php echo Form::date('disbursement_date',null,array('class'=>'form-control','placeholder'=>__(''))); ?>

                    </div>
                </div>


                <div class="col-12">
                    <div class="form-group">
                        <label>External Credit Facilty</label>
                        <?php echo e(Form::text('ext_credit_facility',null,array('class'=>'form-control','placeholder'=>__('')))); ?>

                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label>External Credit Facility Amount</label>
                        <?php echo e(Form::text('ext_credit_facility_amt',null,array('class'=>'form-control','placeholder'=>__('')))); ?>

                    </div>
                </div>




                <div style="display:none;">
                    <?php echo e(Form::text('loan_request_rating',null,array('class'=>'form-control','id'=>__('loan_request_rating')))); ?>


                </div>
                <div style="display:none" id="otherdiv" class="col-12">
                    <div class="form-group">
                        <label>State Other Purpose</label>
                        <?php echo e(Form::textarea('pri_pmt_src',null,array('class'=>'form-control','placeholder'=>__('')))); ?>

                    </div>
                </div>


                <div class="col-12">
                    <div class="form-group">
                        <label>Loan Request Rating</label>
                        <div style="padding-left:0 !important;width:auto !important;" class="stars">
                            <input onchange="checkrating2('5')" class="star star-5" id="star-5" type="radio"
                                name="star" />
                            <label class="star star-5" for="star-5"></label>
                            <input onchange="checkrating2('4')" class="star star-4" id="star-4" type="radio"
                                name="star" />
                            <label class="star star-4" for="star-4"></label>
                            <input onchange="checkrating2('3')" class="star star-3" id="star-3" type="radio"
                                name="star" />
                            <label class="star star-3" for="star-3"></label>
                            <input onchange="checkrating2('2')" class="star star-2" id="star-2" type="radio"
                                name="star" />
                            <label class="star star-2" for="star-2"></label>
                            <input onchange="checkrating2('1')" class="star star-1" id="star-1" type="radio"
                                name="star" />
                            <label class="star star-1" for="star-1"></label>
                        </div>

                    </div>
                </div>


                <div class="col-12">
                    <div class="form-group">
                        <label>Primary Payment Source</label>
                        <?php echo e(Form::text('pri_pmt_src',null,array('class'=>'form-control','placeholder'=>__('')))); ?>

                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label>Secondary Payment Source</label>
                        <?php echo e(Form::text('sec_pmt_src',null,array('class'=>'form-control','placeholder'=>__('')))); ?>

                    </div>
                </div>

                <div id="tab2btn" class="col-12">
                    <div class="form-group">
                        <a href="#" onclick="getnavigation('customersinfo')" class="btn mr-1 btn-round btn-dark"><i
                                class="fas fa-angle-double-left"></i> Customer's Info</a>
                        <a href="#" onclick="getnavigation('guarantorsinfo')"
                            class="btn mr-1 btn-round btn-dark"><i class="fas fa-angle-double-right"></i>
                            Guarantor's Info</a>
                    </div>
                </div>


            </div>

            <div style="display:none;" id="tab3">
               
                <h4 class="row" style="margin-left:18px;width:100%;margin-bottom:40px;color:#898989">3. Guarantor's Information</h4>
                <div class="col-12">
                    <div class="form-group">
                        <label>Guarantor's Name</label>
                        <?php echo e(Form::text('guarantor_name',null,array('class'=>'form-control','placeholder'=>__('')))); ?>

                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label>Guarantor's Number</label>
                        <?php echo e(Form::text('guarantor_number',null,array('class'=>'form-control','placeholder'=>__('')))); ?>

                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label>Guarantor's GPS Loc</label>
                        <?php echo e(Form::text('guarantors_gps_loc',null,array('class'=>'form-control','placeholder'=>__('')))); ?>

                    </div>
                </div>

                <div style="display:none;" id="tab3btn" class="col-12">
                    <div class="form-group">
                        <a href="#" onclick="getnavigation('loaninfo')" class="btn mr-1 btn-round btn-dark"><i
                                class="fas fa-angle-double-right"></i> Previous: Loan Info</a>

                    </div>
                </div>
            </div>



            <div class="col-12" style="margin-bottom:20px;padding-bottom:20px;">
                <div class="form-group">
                    <?php echo e(Form::submit(__('Save'),array('class'=>'btn btn-sm btn-purple rounded-pill
                    mr-auto'))); ?>


                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>


    </div>


</div>



</div>
</div>
  
<?php echo $__env->make("loanrequestdetail.addcustomertoloan", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make("layouts.loanrequestscripts", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make("layouts.modalview1", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make("layouts.modalscripts", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>

<?php $__env->stopPush(); ?>

 
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/banqgego/public_html/nobs001/resources/views/loanrequestdetail/create.blade.php ENDPATH**/ ?>