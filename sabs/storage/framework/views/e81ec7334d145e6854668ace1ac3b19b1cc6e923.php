<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Role')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0 "><?php echo e(__('Role')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Role')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Role')): ?>
        <a href="#" data-url="<?php echo e(route('role.create')); ?>" data-size="xl" data-ajax-popup="true" data-title="<?php echo e(__('Create New Role')); ?>" class="btn btn-sm btn-primary btn-icon-only rounded-circle">
            <i class="fa fa-plus"></i>
        </a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center dataTable">
                <thead>
                <tr>
                    <th width="150"><?php echo e(__('Role')); ?> </th>
                    <th><?php echo e(__('Permissions')); ?> </th>
                    <?php if(Gate::check('Edit Role') || Gate::check('Delete Role')): ?>
                        <th width="150" class="text-right"><?php echo e(__('Action')); ?> </th>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody class="list">
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="font-style">
                        <td width="150"><?php echo e($role->name); ?></td>
                        <td class="Permission">
                            <div class="badges">
                                <?php for($j=0;$j<count($role->permissions()->pluck('name'));$j++): ?>
                                    <span class="badge badge-primary"><?php echo e($role->permissions()->pluck('name')[$j]); ?></span>
                                <?php endfor; ?>
                            </div>
                        </td>
                        <?php if(Gate::check('Edit Role') || Gate::check('Delete Role')): ?>
                            <td class="action text-right">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Role')): ?>
                                    <a href="#" class="action-item" data-url="<?php echo e(route('role.edit',$role->id)); ?>" data-size="xl" data-ajax-popup="true" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>" data-title="<?php echo e(__('Edit Role')); ?>">
                                        <i class="far fa-edit"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Role')): ?>
                                    <a href="#" class="action-item" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').' | '.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($role->id); ?>').submit();"><i class="fas fa-trash"></i></a>

                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['role.destroy', $role->id],'id'=>'delete-form-'.$role->id]); ?>

                                    <?php echo Form::close(); ?>

                                <?php endif; ?>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/nobsbackend/resources/views/role/index.blade.php ENDPATH**/ ?>