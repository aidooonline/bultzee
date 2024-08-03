<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Contact')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0 "><?php echo e(__('Contact Edit')); ?> <?php echo e('('. $contact->name .')'); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <div class="btn-group" role="group">
        <?php if(!empty($previous)): ?>
            <a href="<?php echo e(route('contact.edit',$previous)); ?>" class="btn btn-sm btn-primary btn-icon-only rounded-circle btn-text btn-icon action mr-2" data-toggle="tooltip" data-original-title="<?php echo e(__('Previous')); ?>">
                <i class="fas fa-chevron-left"></i>
            </a>
        <?php else: ?>
            <a href="#" class="btn btn-sm btn-primary btn-icon-only rounded-circle btn-text btn-icon action mr-2 disabled" data-toggle="tooltip" data-original-title="<?php echo e(__('Previous')); ?>">
                <i class="fas fa-chevron-left"></i>
            </a>
        <?php endif; ?>
        <?php if(!empty($next)): ?>
            <a href="<?php echo e(route('contact.edit',$next)); ?>" class="btn btn-sm btn-primary btn-icon-only rounded-circle btn-text btn-icon action" data-toggle="tooltip" data-original-title="<?php echo e(__('Next')); ?>">
                <i class="fas fa-chevron-right"></i>
            </a>
        <?php else: ?>
            <a href="#" class="btn btn-sm btn-primary btn-icon-only rounded-circle btn-text btn-icon action disabled" data-toggle="tooltip" data-original-title="<?php echo e(__('Next')); ?>">
                <i class="fas fa-chevron-right"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('contact.index')); ?>"><?php echo e(__('Contact')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Details')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-4 order-lg-2">
            <div class="card">
                <div class="list-group list-group-flush" id="tabs">
                    <div data-href="#account_edit" class="list-group-item custom-list-group-item text-primary">
                        <div class="media">
                            <i class="fas fa-user"></i>
                            <div class="media-body ml-3">
                                <a href="#" class="stretched-link h6 mb-1"><?php echo e(__('Overview')); ?></a>
                                <p class="mb-0 text-sm"><?php echo e(__('Edit about your contact information')); ?></p>
                            </div>
                        </div>
                    </div>
                    <div data-href="#account_stream" class="list-group-item custom-list-group-item">
                        <div class="media">
                            <i class="fas fa-rss"></i>
                            <div class="media-body ml-3">
                                <a href="#" class="stretched-link h6 mb-1"><?php echo e(__('Comment')); ?></a>
                                <p class="mb-0 text-sm"><?php echo e(__('Add Comment')); ?></p>
                            </div>
                        </div>
                    </div>
                    <div data-href="#accountopportunities" class="list-group-item custom-list-group-item">
                        <div class="media">
                            <i class="fas fa-handshake"></i>
                            <div class="media-body ml-3">
                                <a href="#" class="stretched-link h6 mb-1">Deals</a>
                                <p class="mb-0 text-sm"><?php echo e(__('Assigned opportunities for this contact')); ?></p>
                            </div>
                        </div>
                    </div>
                    <div style="display:none;" data-href="#accounttasks" class="list-group-item custom-list-group-item">
                        <div class="media">
                            <i class="fas fa-tasks"></i>
                            <div class="media-body ml-3">
                                <a href="#" class="stretched-link h6 mb-1"><?php echo e(__('Tasks')); ?></a>
                                <p class="mb-0 text-sm"><?php echo e(__('Assigned tasks for this contact')); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <!--account edit -->
            <div id="account_edit" class="tabs-card">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center h-40  ">
                            <div class="p-0">
                                <h6 class="mb-0"><?php echo e(__('Overview')); ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php echo e(Form::model($contact,array('route' => array('contact.update', $contact->id), 'method' => 'PUT'))); ?>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('name',__('Name'))); ?>

                                    <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name'),'required'=>'required'))); ?>

                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-name" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <?php echo e(Form::label('account',__('Account'))); ?>

                                <?php echo Form::select('account', $account, null,array('class' => 'form-control','data-toggle'=>'select')); ?>

                                <?php $__errorArgs = ['account'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-account" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('email',__('Email'))); ?>

                                    <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter Email'),'required'=>'required'))); ?>

                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-email" role="alert">
                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('phone',__('Phone'))); ?>

                                    <?php echo e(Form::text('phone',null,array('class'=>'form-control','placeholder'=>__('Enter Phone'),'required'=>'required'))); ?>

                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-phone" role="alert">
                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('contact_address',__('Address'))); ?>

                                    <?php echo e(Form::text('contact_address',null,array('class'=>'form-control','placeholder'=>__('Enter Billing Address'),'required'=>'required'))); ?>

                                    <?php $__errorArgs = ['contact_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-contact_address" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('contact_city',__('City'))); ?>

                                    <?php echo e(Form::text('contact_city',null,array('class'=>'form-control','placeholder'=>__('Enter Billing City'),'required'=>'required'))); ?>

                                    <?php $__errorArgs = ['contact_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-contact_city" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('contact_state',__('State'))); ?>

                                    <?php echo e(Form::text('contact_state',null,array('class'=>'form-control','placeholder'=>__('Enter Billing City'),'required'=>'required'))); ?>

                                    <?php $__errorArgs = ['contact_state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-contact_state" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('contact_postalcode',__('Postal Code'))); ?>

                                    <?php echo e(Form::text('contact_postalcode',null,array('class'=>'form-control','placeholder'=>__('Enter Billing City'),'required'=>'required'))); ?>

                                    <?php $__errorArgs = ['contact_postalcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-contact_postalcode" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('contact_country',__('Country'))); ?>

                                    <?php echo e(Form::text('contact_country',null,array('class'=>'form-control','placeholder'=>__('Enter Billing City'),'required'=>'required'))); ?>

                                    <?php $__errorArgs = ['contact_country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-contact_country" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('description',__('Description'))); ?>

                                    <?php echo Form::textarea('description',null,array('class' =>'form-control ','data-toggle'=>'select','rows'=>3,'required'=>'required')); ?>

                                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-description" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr class="mt-2 mb-2">
                                <h6><?php echo e(__('Assigned')); ?></h6>
                            </div>

                            <div class="col-6">
                                <?php echo e(Form::label('user',__('User'))); ?>

                                <?php echo Form::select('user', $user, $contact->user_id,array('class' => 'form-control ','data-toggle'=>'select')); ?>

                                <?php $__errorArgs = ['user'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-user" role="alert">
                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="w-100 mt-3 text-right">
                                <?php echo e(Form::submit(__('Update'),array('class'=>'btn btn-sm btn-primary rounded-pill mr-auto'))); ?>

                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
            <!--account edit end-->

            <!--stream edit -->
            <div id="account_stream" class="tabs-card d-none">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center h-40  ">
                            <div class="p-0">
                                <h6 class="mb-0"><?php echo e(__('Stream')); ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php echo e(Form::open(array('route' => array('streamstore',['contact',$contact->name,$contact->id]), 'method' => 'post','enctype'=>'multipart/form-data'))); ?>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('stream',__('Stream'))); ?>

                                    <?php echo e(Form::text('stream_comment',null,array('class'=>'form-control','placeholder'=>__('Enter Stream Comment'),'required'=>'required'))); ?>

                                </div>
                            </div>
                            <input type="hidden" name="log_type" value="contact comment">
                            <div class="col-12 mb-3 field" data-name="attachments">
                                <div class="attachment-upload">
                                    <div class="attachment-button">
                                        <div class="pull-left">
                                            <?php echo e(Form::label('attachment',__('Attachment'))); ?>

                                            <?php echo e(Form::file('attachment',array('class'=>'form-control'))); ?>

                                        </div>
                                    </div>
                                    <div class="attachments"></div>
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <div class="w-100 mt-3 text-right">
                                    <?php echo e(Form::submit(__('Save'),array('class'=>'btn btn-sm btn-primary rounded-pill mr-auto'))); ?>

                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
                <div class="card">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-sm-12">
                            <div class="card card-fluid">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-0"><?php echo e(__('Latest comments')); ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group list-group-flush">
                                    <?php $__currentLoopData = $streams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stream): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $remark = json_decode($stream->remark);
                                        ?>
                                        <?php if($remark->data_id == $contact->id): ?>
                                            <div class="list-group-item list-group-item-action">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-parent-child">
                                                        <img alt="" class="rounded-circle avatar" <?php if(!empty($stream->file_upload)): ?> src="<?php echo e((!empty($stream->file_upload))? asset(Storage::url("upload/profile/".$stream->file_upload)): asset(url("./assets/img/clients/160x160/img-1.png"))); ?>" <?php else: ?>  avatar="<?php echo e($remark->user_name); ?>" <?php endif; ?>>
                                                    </div>
                                                    <div class="flex-fill ml-3">
                                                        <div class="h6 text-sm mb-0"><?php echo e($remark->user_name); ?><small class="float-right text-muted"><?php echo e($stream->created_at); ?></small></div>
                                                        <span class="text-sm lh-140 mb-0">
                                                          <?php echo e(__('posted to')); ?> <a href="#"><?php echo e($remark->title); ?></a> , <?php echo e($stream->log_type); ?> <a href="#"><?php echo e($remark->stream_comment); ?></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--stream edit end-->

            <!--account opportunities -->
            <div id="accountopportunities" class="tabs-card d-none">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0"><?php echo e(__('Opportunities')); ?></h6>
                            </div>
                            <div class="text-right">
                                <div class="actions">
                                    <a href="#" data-size="lg" data-url="<?php echo e(route('opportunities.create',['contact',$contact->id])); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Opportunities')); ?>" class="btn btn-sm btn-primary btn-icon-only rounded-circle">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-wrapper p-3">
                        <!-- Files -->
                        <div class="mb-3">
                            <div class="table-responsive">
                                <table class="table align-items-center dataTable">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                        <th scope="col" class="sort" data-sort="budget"><?php echo e(__('Account')); ?></th>
                                        <th scope="col" class="sort" data-sort="status"><?php echo e(__('Stage')); ?></th>
                                        <th scope="col" class="sort" data-sort="completion"><?php echo e(__('Assigned User')); ?></th>
                                        <th scope="col" class="sort" data-sort="completion"><?php echo e(__('Amount')); ?></th>
                                        <?php if(Gate::check('Show Opportunities') || Gate::check('Edit Opportunities') || Gate::check('Delete Opportunities')): ?>
                                            <th scope="col"><?php echo e(__('Action')); ?></th>
                                        <?php endif; ?>
                                    </tr>
                                    </thead>
                                    <tbody class="list">
                                    <?php $__currentLoopData = $opportunitiess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opportunities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <a href="#" data-size="lg" data-url="<?php echo e(route('opportunities.show', $opportunities->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Opportunities Details')); ?>" class="action-item">
                                                    <?php echo e($opportunities->name); ?>

                                                </a>
                                            </td>
                                            <td class="budget">
                                                <a href="#"><?php echo e(!empty($opportunities->account_names)?$opportunities->account_names->name:'-'); ?></a>
                                            </td>
                                            <td>
                                                <span class="badge badge-dot">
                                                    <?php echo e($opportunities->stages->name); ?>

                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-dot"><?php echo e(!empty($opportunities->assign_user)?$opportunities->assign_user->name:'-'); ?></span>
                                            </td>
                                            <td>
                                                <span class="badge badge-dot"><?php echo e(\Auth::user()->priceFormat($opportunities->amount)); ?></span>
                                            </td>
                                            <?php if(Gate::check('Show Opportunities') || Gate::check('Edit Opportunities') || Gate::check('Delete Opportunities')): ?>
                                            <td>
                                                <div class="d-flex">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Opportunities')): ?>
                                                    <a href="#" data-size="lg" data-url="<?php echo e(route('opportunities.show', $opportunities->id)); ?>" data-ajax-popup="true" data-toggle="tooltip" data-original-title="<?php echo e(__('Details')); ?>" data-title="<?php echo e(__('Opportunities Details')); ?>" class="action-item">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Opportunities')): ?>
                                                    <a href="<?php echo e(route('opportunities.edit',$opportunities->id)); ?>" class="action-item" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>" data-title="<?php echo e(__('Edit Opportunities')); ?>"><i class="far fa-edit"></i></a>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Opportunities')): ?>
                                                    <a href="#" class="action-item " data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').' | '.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($opportunities->id); ?>').submit();">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['opportunities.destroy', $opportunities->id],'id'=>'delete-form-'.$opportunities ->id]); ?>

                                                    <?php echo Form::close(); ?>

                                                   <?php endif; ?>
                                                </div>
                                            </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--account opportunities end-->

            <!--account Tasks -->
            <div id="accounttasks" class="tabs-card d-none">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0"><?php echo e(__('Tasks')); ?></h6>
                            </div>
                            <div class="text-right">
                                <div class="actions">
                                    <a href="#" data-size="lg" data-url="<?php echo e(route('task.create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Task')); ?>" class="btn btn-sm btn-primary btn-icon-only rounded-circle">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-wrapper p-3">
                        <!-- Files -->
                        <div class="mb-3">

                            <table class="table align-items-center dataTable">
                                <thead>
                                <tr>
                                    <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                    <th scope="col" class="sort" data-sort="budget"><?php echo e(__('Parent')); ?></th>
                                    <th scope="col" class="sort" data-sort="status"><?php echo e(__('Status')); ?></th>
                                    <th scope="col" class="sort" data-sort="completion"><?php echo e(__('Date Start')); ?></th>
                                    <th scope="col" class="sort" data-sort="completion"><?php echo e(__('Assigned User')); ?></th>
                                    <?php if(Gate::check('Show Task') || Gate::check('Edit Task') || Gate::check('Delete Task')): ?>
                                    <th scope="col"><?php echo e(__('Action')); ?></th>
                                    <?php endif; ?>
                                </tr>
                                </thead>
                                <tbody class="list">
                                <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="#" data-size="lg" data-url="<?php echo e(route('task.show',$task->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Task Details')); ?>" class="action-item">
                                                <?php echo e($task->name); ?>

                                            </a>
                                        </td>
                                        <td class="budget">
                                            <a href="#"><?php echo e($task->parent); ?></a>
                                        </td>
                                        <td>
                                            <span class="badge badge-dot"><?php echo e(!empty($task->stages)?$task->stages->name:''); ?></span>
                                        </td>
                                        <td>
                                            <span class="badge badge-dot"><?php echo e(\Auth::user()->dateFormat($task->start_date)); ?></span>
                                        </td>
                                        <td>
                                            <span class="badge badge-dot"><?php echo e(!empty($task->assign_user)?$task->assign_user->name:'-'); ?></span>
                                        </td>
                                        <?php if(Gate::check('Show Task') || Gate::check('Edit Task') || Gate::check('Delete Task')): ?>
                                        <td>
                                            <div class="d-flex">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Task')): ?>
                                                <a href="#" data-size="lg" data-url="<?php echo e(route('task.show',$task->id)); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Details')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Task Details')); ?>" class="action-item">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Task')): ?>
                                                <a href="<?php echo e(route('task.edit',$task->id)); ?>" class="action-item" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>" data-title="<?php echo e(__('Edit Task')); ?>"><i class="far fa-edit"></i></a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Task')): ?>
                                                <a href="#" class="action-item " data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').' | '.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($task->id); ?>').submit();">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['task.destroy', $task->id],'id'=>'delete-form-'.$task ->id]); ?>

                                                <?php echo Form::close(); ?>

                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--account Tasks end-->
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>

    <script>

        $(document).on('change', 'select[name=parent]', function () {
            console.log('h');
            var parent = $(this).val();
            getparent(parent);
        });

        function getparent(bid) {
            console.log(bid);
            $.ajax({
                url: '<?php echo e(route('task.getparent')); ?>',
                type: 'POST',
                data: {
                    "parent": bid, "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function (data) {
                    console.log(data);
                    $('#parent_id').empty();
                    

                    $.each(data, function (key, value) {
                        $('#parent_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                    if (data == '') {
                        $('#parent_id').empty();
                    }
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/efloq/resources/views/contact/edit.blade.php ENDPATH**/ ?>