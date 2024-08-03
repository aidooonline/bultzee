<?php $__env->startSection('action-btn'); ?>

<!-- literally user can create accounts -->
 
<?php $__env->stopSection(); ?>

 


 
<?php $__env->startSection('title'); ?>
 
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('action-btn'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.inlinecss', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div  class="row dashboardtext" style="padding-bottom:150px;padding-top:60px;padding-left:15px;padding-right:15px;">

 <?php echo $__env->make('layouts.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div id="mainsearchdiv">
    <h4 class="card-title" style="margin-top:20px;">
        Customers
      </h4>
    

      <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <button id="accountbtnpanel_<?php echo e($account->id); ?>"  class="accordion card listdiv" style="background:#fff;width:99%;padding-left:0;padding-right:0;margin-left:0;margin-right:0;">
 
          <table>
              <tr>
                  <td width="23%">
  
                      <div style="padding-left:5px;"> 
  
                          <?php if($account->user_image == 'true'): ?>
                          <img style="position:relative;float:left;margin-right:10px;" class="rounded-circle" src="<?php echo e(env('NOBS_IMAGES')); ?>images/user_avatar/avatar_<?php echo e($account->id); ?>.jpg?lastmod=<?php echo date("m/d/Y h:i:s a", time())?>" is_dataimage="<?php echo e($account->is_dataimage); ?>" profilevalue="<?php echo e($account->customer_picture); ?>">
                          <?php else: ?>
                          
                           
                          <img style="position:relative;float:left;margin-right:10px;" class="rounded-circle" src="<?php echo e(env('NOBS_IMAGES')); ?>useraccounts/profileimage.png">
                          <?php endif; ?>
  
                          
  
                      </div>
                 
                  </td>
                  <td width="77%" style="text-align:left; ">
                      <div style="text-align:left;padding-top:1px !important;">
                          <h6 class="account_name" style="padding-top:1px !important;">
                              <?php echo e($account->first_name); ?> <?php echo e($account->middle_name); ?> <?php echo e($account->surname); ?></h6>
                              <h6 style="color:#724c78;text-align:left !important;"><?php echo e($account->phone); ?></h6>
                      
                      <?php echo e($account->email); ?> -- <?php echo e($account->residential_address); ?>

                      <h6 style="color:#5e7eb9;text-align:left !important;"><?php echo e($account->account_number); ?></h6>
                      </div>
                  </td>
              </tr>
          </table>
  
      </button>
      
  
      <?php echo $__env->make("accounts.accountspartial_singletotal", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
     
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







<?php echo $__env->make("layouts.modalview1", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php echo $__env->make("layouts.modalscripts", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bultepml/app.bultzee.com/sabs/resources/views/accounts/index.blade.php ENDPATH**/ ?>