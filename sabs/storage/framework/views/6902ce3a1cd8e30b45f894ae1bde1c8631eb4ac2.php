<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Task')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0 "><?php echo e(__('Task')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Task')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('task.grid')); ?>" class="btn btn-sm btn-primary bor-radius ml-4">
        <?php echo e(__('Grid View')); ?>

    </a>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Task')): ?>
        <a href="#" data-size="lg" data-url="<?php echo e(route('task.create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Task')); ?>" class="btn btn-sm btn-primary btn-icon-only rounded-circle">
            <i class="fa fa-plus"></i>
        </a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <!-- Table -->
        <div class="table-responsive">
            <table class="table align-items-center dataTable">
                <thead>
                <tr>
                    <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                    <th scope="col" class="sort" data-sort="budget"><?php echo e(__('Parent')); ?></th>
                    <th scope="col" class="sort" data-sort="status"><?php echo e(__('Stage')); ?></th>
                    <th scope="col" class="sort" data-sort="completion"><?php echo e(__('Date Start')); ?></th>
                    <th scope="col" class="sort" data-sort="completion"><?php echo e(__('Assigned User')); ?></th>
                    <?php if(Gate::check('Show Task') || Gate::check('Edit Task') || Gate::check('Delete Task')): ?>
                        <th scope="col" class="text-right"><?php echo e(__('Action')); ?></th>
                    <?php endif; ?>

                </tr>
                </thead>
                <tbody class="list">
                <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <a href="#" data-size="lg" data-url="<?php echo e(route('task.show',$task->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Task Details')); ?>" class="action-item">
                                 <?php echo e(ucfirst($task->name)); ?></a>
                        </td>
                        <td class="budget">
                            <?php echo e(ucfirst($task->parent)); ?>

                        </td>
                        <td>
                            <span class="badge badge-dot"><?php echo e(ucfirst(!empty($task->stages)?$task->stages->name:'')); ?></span>
                        </td>
                        <td>
                            <span class="badge badge-dot"><?php echo e(\Auth::user()->dateFormat($task->start_date)); ?></span>
                        </td>
                        <td>
                            <span class="badge badge-dot"><?php echo e(ucfirst(!empty($task->assign_user)?$task->assign_user->name:'')); ?></span>
                        </td>
                        <?php if(Gate::check('Show Task') || Gate::check('Edit Task') || Gate::check('Delete Task')): ?>
                            <td class="text-right">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Task')): ?>
                                    <a href="#" data-size="lg" data-url="<?php echo e(route('task.show',$task->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Task Details')); ?>" class="action-item">
                                        <i class="far fa-eye"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Task')): ?>
                                    <a href="<?php echo e(route('task.edit',$task->id)); ?>" class="action-item" data-title="<?php echo e(__('Task Edit ')); ?>"><i class="far fa-edit"></i></a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Task')): ?>
                                    <a href="#" class="action-item " data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').' | '.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($task->id); ?>').submit();">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['task.destroy', $task->id],'id'=>'delete-form-'.$task ->id]); ?>

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/efloq/resources/views/task/index.blade.php ENDPATH**/ ?>