<?php $__env->startSection('action-btn'); ?>

<!-- literally user can create accounts -->
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Product')): ?>
<a href="#" data-size="lg" data-url="<?php echo e(route('accounts.create')); ?>" data-ajax-popup="true"
    data-title="<?php echo e(__('Create New Account')); ?>" class="btn btn-sm btn-purple btn-icon-only rounded-circle">
    <i class="fa fa-plus"></i>
</a>
<?php endif; ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('title'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.inlinecss', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="row dashboardtext" style="padding-bottom:150px;padding-top:60px;">

    <?php echo $__env->make('layouts.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   

      <div id="mainsearchdiv">
        <?php $__currentLoopData = $account; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $useraccount1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h4 class="card-title" style="margin-top:20px;margin-left:30px;">
            Withdrawal : <span id="withdrawalname" class="text-warning"> <?php echo e($useraccount1->first_name); ?> <?php echo e($useraccount1->middle_name); ?> <?php echo e($useraccount1->surname); ?></span>
          </h4>

<input style="display:none;" id="useraccountphonenumber" type="text" value="<?php echo e($useraccount1->phone_number); ?>" class="form-control" />


          <h5 class="card-title mb-4    " style="margin-top:20px;margin-left:30px;">
            Account No. : <span id="account_number" class="text-info">
                <?php $__currentLoopData = $mainaccountnumber; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maccountno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($maccountno); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </span> 
            <br/>
            <?php $__currentLoopData = $accounttype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <span style="font-size:14px !important;color:#c39dc7;margin-bottom:30px;" id="accounttype"><?php echo e($actype); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <br/>
            Current Balance : <span id="balanceamount" class="text-info"><?php echo e(\Auth::user()->priceFormat($totalbalance,'GH¢')); ?> </span>
            Available Balance : <span id="availbalanceamount" class="text-info"><?php echo e(\Auth::user()->priceFormat($totalbalance - (0.03 * $totalbalance),'GH¢')); ?> </span>
          
          <input id="totalbalancehidden" style="display:none;" value="<?php echo e($totalbalance - (0.03 * $totalbalance)); ?>" /> 
            </h5>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<a href="#" class="rounded pl-2 pr-2 mt-0" style="border:solid 1px;margin-left:30px;" onclick="showotheraccountno();">Show Other Acc. No.s</a>
       
<div style="margin:10px 30px !important;" id="showotheraccountno">
            <?php $__currentLoopData = $useraccountnumbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $useraccountnumber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($useraccountnumber->account_number == $accountsid): ?>

<?php else: ?>
 
<input type="button" class="btn-purple rounded" style="margin:2px 2px;" value="<?php echo e($useraccountnumber->account_number); ?>" />
 
<?php endif; ?>

           

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
       


          
          <div class="col-11 insetshadow">
            
            <div class="form-group">
                <span class="text-warning">Step 1</span>
          <input type="number" min="0.00" id="amount" name="amount" class="form-control mb-2" placeholder="Amount Here.." step="any" />
            </div>
        </div>

             

        <div class="col-11 insetshadow" id="confirmdiv">
            <span class="text-warning">Step 2</span>
            <div class="form-group">
                <input class="btn btn-purple mb-2 customercodebtn" id="sendcustomercode" type="button"
                    onclick="sendconfirmationcode()" value="Send Confirmation Code to Customer" />
                    <div style="display:none;" id="confirmationmessage" class="text-secondary"> Customer Confirmation Code Sent. Enter Below..
                    <div class="spinner-border text-info" role="status">
                     <span class="sr-only"> Waiting.. </span>
                    </div>
                    
                    </div>
                <input style="display:none;" type="text" id="confirmationcode"   class="form-control mb-2"
                    placeholder="Enter Code Here.." step="any" />



            </div>
        </div>


        <div class="col-11 insetshadow" style="display:none;" id="withdrawbtndiv">
            
            <div class="form-group">
                
                <span class="text-warning">Step 3</span>
                
              
 <?php $__currentLoopData = $account; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $useraccount2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input class="btn btn-purple mb-2 customercodebtn" id="confirmcustomercode" type="button" onclick="makewithdrawaljvs('<?php echo e($useraccount2->phone_number); ?>',withdrawalmsg())" value="Withdraw" />
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                
         
            </div>
    </div>

       


         



 

<div style="margin-top:100px;width:97%;position:relative;height:auto;margin-left:2%;margin-right:1% !important;">
    <table id="tdetailstable" class=" table-striped tableFixHead table-bordered" style="padding-bottom:0;position:relative;">
        <thead style="background-color:#ffffff !important;z-index:1">
            <tr>
                <th><strong>Tr Name</strong></th>
                <th><strong>Amount</strong></th>
                <th><strong>Date</strong></th>
                <th><strong>User</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transactions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><?php echo e($transactions->name_of_transaction); ?></td>
                <td><strong>GH¢ <?php echo e($transactions->amount); ?></strong></td>
                <td title="<?php echo e(\Auth::user()->dateFormat($transactions->created_at)); ?>"><?php echo e($transactions->created_at->diffForHumans()); ?></td>
                <td><?php echo e($transactions->agentname); ?></td>
            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
       
    </table>
</div>

      </div>
</div>
<?php echo $__env->make('layouts.depositwithdrawalcss', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script type="text/javascript">

function showotheraccountno(){
    
$( "#showotheraccountno").toggle();
}


function randomIntFromInterval(min, max) { // min and max included 
      return Math.floor(Math.random() * (max - min + 1) + min)
    }
    
    const rndInt = randomIntFromInterval(10000, 90000);
    const rndIn2 = randomIntFromInterval(100, 999);
    const accountnumbergen = 'GCI001' + rndIn2.toString() + rndInt.toString();
    let confirmationcodeval = null;
     

     function getconfirmcode(){
         return confirmationcodeval;
     }
    
    function uuidv4() {
      return ([1e7]+1e3+4e3+8e3+1e11).replace(/[018]/g, c =>
        (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
      );
    }


    function grtcn() {
      return ([1e1]+1e1).replace(/[018]/g, c =>
        (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
      );
    }

 

    function hideshowconfirmbox(isvalid){
        
if(isvalid == true){

    $('#confirmdiv').show();
}else{
    $('#confirmdiv').hide();

}
    }


    function sendconfirmationcode(){
        if($('#amount').val() == ''){
            alert('Kindly Enter Valid Amount');
        }else{

            let enteredamount = $('#amount').val();
            let availbalanceamount = $('#totalbalancehidden').val();
           
            
            if(parseInt(enteredamount) > parseInt(availbalanceamount)){
                alert('The Withdrawal Amount: '+ enteredamount +' is in-sufficient.');
            }else{
//Confirm Code Here.
showconfirmationtext();
//let balance = availbalanceamount - enteredamount;
callconfirmationcode();
            }
            


        }
    }


    function showconfirmationtext(){
        $('#confirmationcode').show();
        $('#confirmationmessage').show();
       $('#withdrawbtndiv').show();

    }


function withdrawalmsg(){
    var today = new Date();

const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
"Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
];



var date = monthNames[today.getMonth()]+'-'+(today.getDate()+1)+'-'+today.getFullYear();

let mymessage = 'Dear :' + $('#withdrawalname').html() +', Your withdrawal request of '  + formatter.format($('#amount').val()) + ' on the Acc. No. :' + $('#account_number').html() + ' (' + $('#accounttype').html()+ ') has been initiated.';

   return mymessage; 
}

    function callconfirmationcode(balance){
        confirmationcodeval = grtcn();
        var today = new Date();

        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
  "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
];

 

//var date = monthNames[today.getMonth()]+'-'+(today.getDate()+1)+'-'+today.getFullYear();
 
        let mymessage = 'New Withdrawal Confirmation Code: ' + confirmationcodeval;
        
       
   sndmsg($('#useraccountphonenumber').val(),mymessage);
        
    }

 
</script>





<?php echo $__env->make("layouts.modalview1", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 

<?php echo $__env->make("layouts.modalscripts", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/nobsbackend/resources/views/accounts/withdraw/create.blade.php ENDPATH**/ ?>