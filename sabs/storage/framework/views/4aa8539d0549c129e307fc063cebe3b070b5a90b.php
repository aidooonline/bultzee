<?php
    $dir= asset(Storage::url('uploads/plan'));
?>
<?php $__env->startPush('script-page'); ?>
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
            <?php if($plan->price > 0.0 && env('ENABLE_STRIPE') == 'on' && !empty(env('STRIPE_KEY')) && !empty(env('STRIPE_SECRET'))): ?>
        var stripe = Stripe('<?php echo e(env('STRIPE_KEY')); ?>');
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        var style = {
            base: {
                // Add your base input styles here. For example:
                fontSize: '14px',
                color: '#32325d',
            },
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Create a token or display an error when the form is submitted.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            stripe.createToken(card).then(function (result) {
                if (result.error) {
                    $("#card-errors").html(result.error.message);
                    show_toastr('Error', result.error.message, 'error');
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }

        <?php endif; ?>

        $(document).ready(function () {
            $(document).on('click', '.apply-coupon', function () {

                var ele = $(this);
                var coupon = ele.closest('.row').find('.coupon').val();
                $.ajax({
                    url: '<?php echo e(route('apply.coupon')); ?>',
                    datType: 'json',
                    data: {
                        plan_id: '<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($plan->id)); ?>',
                        coupon: coupon
                    },
                    success: function (data) {
                        $('.final-price').text(data.final_price);
                        $('#stripe_coupon, #paypal_coupon').val(coupon);
                        if (data.is_success) {
                            show_toastr('Success', data.message, 'success');
                        } else {
                            show_toastr('Error', 'Coupon code is required', 'error');
                        }
                    }
                })
            });
        });

    </script>
<?php $__env->stopPush(); ?>
<?php
    $dir= asset(Storage::url('uploads/plan'));
    $dir_payment= asset(Storage::url('uploads/payments'));
?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Order Summary')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Order Summary')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('plan.index')); ?>"><?php echo e(__('Plan')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Order Summary')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-3">
            <div class="card ">
                <div class="card-header border-0 pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0"><?php echo e($plan->name); ?></h6>
                        </div>
                    </div>
                </div>
                <div class="card-body text-center plan-box">
                    <a href="#" class="avatar rounded-circle avatar-lg hover-translate-y-n3">
                        <img alt="Image placeholder" src="<?php echo e($dir.'/'.$plan->image); ?>" class="">
                    </a>

                    <h5 class="h6 my-4 "><span class="final-price"><?php echo e(env('CURRENCY_SYMBOL').$plan->price); ?></span> <?php echo e(' / '.$plan->duration); ?></h5>

                    <?php if(\Auth::user()->type=='company' && \Auth::user()->plan == $plan->id): ?>
                        <h5 class="h6 my-4">
                            <?php echo e(__('Expired : ')); ?> <?php echo e(\Auth::user()->plan_expire_date ? \Auth::user()->dateFormat(\Auth::user()->plan_expire_date):__('Unlimited')); ?>

                        </h5>
                    <?php endif; ?>
                    <h5 class="h6 my-4"><?php echo e($plan->description); ?></h5>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-6 text-center">
                            <span class="h5 mb-0"><?php echo e($plan->max_employee); ?></span>
                            <span class="d-block text-sm"><?php echo e(__('Employee')); ?></span>
                        </div>
                        <div class="col-6 text-center">
                            <span class="h5 mb-0"><?php echo e($plan->max_client); ?></span>
                            <span class="d-block text-sm"> <?php echo e(__('Client')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-lg-4 order-lg-2">
                    <div class="card plan-stripe-box">
                        <div class="list-group list-group-flush" id="tabs">
                            <?php if((env('ENABLE_STRIPE') == 'on' && !empty(env('STRIPE_KEY')) && !empty(env('STRIPE_SECRET'))) && (env('ENABLE_PAYPAL') == 'on' && !empty(env('PAYPAL_CLIENT_ID')) && !empty(env('PAYPAL_SECRET_KEY')))): ?>
                                <div data-href="#stripe-payment" class="custom-list-group-item list-group-item text-primary">
                                    <div class="media">
                                        <i class="fas fa-cog pt-1"></i>
                                        <div class="media-body ml-3">
                                            <a href="#" class="stretched-link h6 mb-1"><?php echo e(__('Stripe')); ?></a>
                                            <p class="mb-0 text-sm"><?php echo e(__('Details about your plan stript payment')); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div data-href="#paypal-payment" class="custom-list-group-item list-group-item text-primary">
                                    <div class="media">
                                        <i class="fas fa-cog pt-1"></i>
                                        <div class="media-body ml-3">
                                            <a href="#" class="stretched-link h6 mb-1"><?php echo e(__('Paypal')); ?></a>
                                            <p class="mb-0 text-sm"><?php echo e(__('Details about your plan paypal payment')); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 order-lg-1">
                    <?php if(env('ENABLE_STRIPE') == 'on' && !empty(env('STRIPE_KEY')) && !empty(env('STRIPE_SECRET'))): ?>
                        <div id="stripe-payment" class="tabs-card">
                            <div class="card">
                                <form role="form" action="<?php echo e(route('stripe.post')); ?>" method="post" class="require-validation" id="payment-form">
                                    <?php echo csrf_field(); ?>
                                    <div class="border p-3 mb-3 rounded stripe-payment-div">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="custom-radio">
                                                    <label class="font-16 font-weight-bold"><?php echo e(__('Credit / Debit Card')); ?></label>
                                                </div>
                                                <p class="mb-0 pt-1 text-sm"><?php echo e(__('Safe money transfer using your bank account. We support Mastercard, Visa, Discover and American express.')); ?></p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="card-name-on"><?php echo e(__('Name on card')); ?></label>
                                                    <input type="text" name="name" id="card-name-on" class="form-control required" placeholder="<?php echo e(\Auth::user()->name); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div id="card-element"></div>
                                                <div id="card-errors" role="alert"></div>
                                            </div>
                                            <div class="col-md-10">
                                                <br>
                                                <div class="form-group">
                                                    <label for="stripe_coupon"><?php echo e(__('Coupon')); ?></label>
                                                    <input type="text" id="stripe_coupon" name="coupon" class="form-control coupon" placeholder="<?php echo e(__('Enter Coupon Code')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2 coupon-apply-btn">
                                                <div class="form-group apply-stripe-btn-coupon">
                                                    <a href="#" class="btn btn-primary coupon-apply-btn apply-coupon btn-sm"><?php echo e(__('Apply')); ?></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'><?php echo e(__('Please correct the errors and try again.')); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="text-sm-right mr-2">
                                                    <input type="hidden" name="plan_id" value="<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($plan->id)); ?>">
                                                    <button class="btn btn-primary btn-sm" type="submit">
                                                        <i class="mdi mdi-cash-multiple mr-1"></i> <?php echo e(__('Pay Now')); ?>

                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(env('ENABLE_PAYPAL') == 'on' && !empty(env('PAYPAL_CLIENT_ID')) && !empty(env('PAYPAL_SECRET_KEY'))): ?>
                        <div id="paypal-payment" class="tabs-card d-none">
                            <div class="card ">
                                <form class="w3-container w3-display-middle w3-card-4" method="POST" id="payment-form" action="<?php echo e(route('plan.pay.with.paypal')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="plan_id" value="<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($plan->id)); ?>">

                                    <div class="border p-3 mb-3 rounded payment-box">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label for="paypal_coupon"><?php echo e(__('Coupon')); ?></label>
                                                    <input type="text" id="paypal_coupon" name="coupon" class="form-control coupon" placeholder="<?php echo e(__('Enter Coupon Code')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2 coupon-apply-btn">
                                                <div class="form-group apply-paypal-btn-coupon">
                                                    <a href="#" class="btn btn-primary apply-coupon btn-sm"><?php echo e(__('Apply')); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3 mr-3">
                                        <div class="text-sm-right">
                                            <button class="btn btn-primary btn-sm" type="submit">
                                                <i class="mdi mdi-cash-multiple mr-1"></i> <?php echo e(__('Pay Now')); ?>

                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/efloq/resources/views/plan/stripe.blade.php ENDPATH**/ ?>