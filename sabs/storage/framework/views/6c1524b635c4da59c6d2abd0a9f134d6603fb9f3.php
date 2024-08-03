<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).ready(function () {
            $('.cp_link').on('click', function () {
                var value = $(this).attr('data-link');
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val(value).select();
                document.execCommand("copy");
                $temp.remove();
                show_toastr('Success', '<?php echo e(__('Link Copy on Clipboard')); ?>', 'success')
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Form Builder')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Form Builder')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Form Builder')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <?php if(\Auth::user()->can('Create Form Builder')): ?>
        <a href="#" data-url="<?php echo e(route('form_builder.create')); ?>" data-size="md" data-ajax-popup="true" data-title="<?php echo e(__('Create New Form')); ?>" class="btn btn-sm btn-white btn-icon-only rounded-circle" data-toggle="tooltip">
            <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
        </a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center dataTable">
                <thead>
                <tr>
                    <th><?php echo e(__('Name')); ?></th>
                    <th><?php echo e(__('Response')); ?></th>
                    <?php if(\Auth::user()->can('Edit Form Builder') || \Auth::user()->can('Delete Form Builder')): ?>
                        <th class="text-right" width="200px"><?php echo e(__('Action')); ?></th>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $forms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($form->name); ?></td>
                        <td>
                            <?php echo e($form->response->count()); ?>

                        </td>
                        <?php if(\Auth::user()->can('Edit Form Builder') || \Auth::user()->can('Delete Form Builder')): ?>
                            <td class="text-right">
                                <a href="#" data-size="md" data-url="<?php echo e(route('form.field.bind',$form->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Convert Setting')); ?>" class="action-item" data-toggle="tooltip" data-original-title="<?php echo e(__('Convert Setting')); ?>"><i class="fas fa-exchange-alt"></i></a>
                                <a href="#" class="action-item cp_link" data-link="<?php echo e(url('/form/'.$form->code)); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Click to copy link')); ?>"><i class="fas fa-file"></i></a>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Form Builder')): ?>
                                    <a href="<?php echo e(route('form_builder.show',$form->id)); ?>" class="action-item" data-toggle="tooltip" data-original-title="<?php echo e(__('Form field')); ?>"><i class="fas fa-table"></i></a>
                                <?php endif; ?>
                                <a href="<?php echo e(route('form.response',$form->id)); ?>" class="action-item" data-toggle="tooltip" data-original-title="<?php echo e(__('View Response')); ?>"><i class="fas fa-eye"></i></a>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Form Builder')): ?>
                                    <a href="#" class="action-item" data-url="<?php echo e(route('form_builder.edit',$form->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit Form')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>">
                                        <i class="far fa-edit"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Form Builder')): ?>
                                    <a href="#!" class="action-item" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-<?php echo e($form->id); ?>').submit();">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['form_builder.destroy', $form->id],'id'=>'delete-form-'.$form->id]); ?>

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


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/efloq/resources/views/form_builder/index.blade.php ENDPATH**/ ?>