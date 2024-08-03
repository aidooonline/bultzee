<?php echo e(Form::open(array('url'=>'document_type','method'=>'post'))); ?>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Document Type'),'required'=>'required'))); ?>

        </div>
    </div>
    <div class="w-100 text-right">
        <?php echo e(Form::submit(__('Save'),array('class'=>'btn btn-sm btn-primary rounded-pill mr-auto'))); ?>

    </div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Applications/MAMP/htdocs/efloq/resources/views/document_type/create.blade.php ENDPATH**/ ?>