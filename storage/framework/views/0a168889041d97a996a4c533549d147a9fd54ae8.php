<?php $__env->startSection('title'); ?>
    <title><?php echo e(get_string('currencies') . ' - ' . get_setting('site_name', 'site')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_title'); ?>
    <h3 class="page-title mbot10"><?php echo e(get_string('currencies')); ?></h3>
<?php $__env->stopSection(); ?>
<div class="col l12 m12 s12 right right-align mbot10">
    <a href="#feature-modal" data-toggle="modal" class="add-button btn waves-effect"> <?php echo e(get_string('add_currency')); ?> <i class="material-icons small">add_circle</i></a>
</div>
<div class="col s12">
    <?php if(!$errors->isEmpty()): ?>
        <span class="wrong-error">* <?php echo e(get_string('validation_error')); ?></span>
    <?php endif; ?>
    <?php if($currencies): ?>
        <div class="table-responsive">
            <table class="table bordered striped">
                <thead class="thead-inverse">
                <tr>
                    <th>
                        <input type="checkbox" class="filled-in primary-color" id="select-all" />
                        <label for="select-all"></label>
                    </th>
                    <th><?php echo e(get_string('currency')); ?></th>
                    <th><?php echo e(get_string('currency_code')); ?></th>
                    <th><?php echo e(get_string('currency_symbol')); ?></th>
                    <th><?php echo e(get_string('exchange_rate_label')); ?></th>
                    <th class="icon-options"><?php echo e(get_string('options')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        <td>
                            <input type="checkbox" class="filled-in primary-color" id="<?php echo e($currency['id']); ?>" />
                            <label for="<?php echo e($currency['id']); ?>"></label>
                        </td>
                        <td><?php echo e($currency['name']); ?></td>
                        <td><?php echo e($currency['code']); ?></td>
                        <td><?php echo e($currency['symbol']); ?></td>
                        <td><?php echo e($currency['exchange_rate']); ?></td>
                        <td>
                            <div class="icon-options">
                                <?php if($currency['id'] > 1): ?>
                                    <a href="#" class="delete-button" data-id="<?php echo e($currency['code']); ?>" title="<?php echo e(get_string('delete_currency')); ?>"><i class="small material-icons color-red">delete</i></a>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <strong class="center-align"><?php echo e(get_string('no_results')); ?></strong>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
        <!-- Modal -->
<div id="feature-modal" class="modal not-summernote fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <a href="#!" class="close" data-dismiss="modal" aria-label="Close"><i class="material-icons">clear</i></a>
                <strong class="modal-title"><?php echo e(get_string('add_currency')); ?></strong>
            </div>
            <?php echo Form::open(['method' => 'post', 'url' => route('admin_currency_store')]); ?>

            <div class="modal-body">
                <div class="row mbot0">
                    <div class="col s12">
                        <div class="form-group">
                            <?php echo e(Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => ''])); ?>

                            <?php echo e(Form::label('name', get_string('currency'))); ?>

                        </div>
                    </div>
                    <div class="col s12">
                        <div class="form-group">
                            <?php echo e(Form::text('code', null, ['class' => 'form-control', 'required', 'placeholder' => ''])); ?>

                            <?php echo e(Form::label('code', get_string('currency_code'))); ?>

                        </div>
                    </div>
                    <div class="col s12">
                        <div class="form-group">
                            <?php echo e(Form::text('symbol', null, ['class' => 'form-control', 'required', 'placeholder' => ''])); ?>

                            <?php echo e(Form::label('symbol', get_string('currency_symbol'))); ?>

                        </div>
                    </div>
                    <div class="col s12">
                        <div class="form-group">
                            <?php echo e(Form::text('exchange_rate', null, ['class' => 'form-control', 'required', 'placeholder' => ''])); ?>

                            <?php echo e(Form::label('exchange_rate', get_string('exchange_rate_label'))); ?>

                        </div>
                    </div>
                </div>
                <span class="field-info">* <?php echo e(get_string('fill_all_fields')); ?></span>
            </div>
            <div class="modal-footer">
                <a href="#!" class="waves-effect btn btn-default" data-dismiss="modal"><?php echo e(get_string('close')); ?></a>
                <button type="submit" name="action" class="update-lang-form waves-effect btn btn-default"><?php echo e(get_string('create')); ?></button>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.delete-button').click(function(event){
            event.preventDefault();
            var id = $(this).data('id');
            var selector = $(this).parents('tr');
            var token = $('[name=_token]').val();
            bootbox.confirm({
                title: '<?php echo e(get_string('confirm_action')); ?>',
                message: '<?php echo e(get_string('delete_confirm')); ?>',
                onEscape: true,
                backdrop: true,
                buttons: {
                    cancel: {
                        label: 'No',
                        className: 'btn waves-effect'
                    },
                    confirm: {
                        label: 'Yes',
                        className: 'btn waves-effect'
                    }
                },
                callback: function (result) {
                    if(result){
                        $.ajax({
                            url: '<?php echo e(url('/admin/setting/currency/destroy')); ?>/'+id,
                            type: 'post',
                            data: {_token :token},
                            success:function(msg) {
                                selector.remove();
                                toastr.success(msg);
                            },
                            error:function(msg){
                                toastr.error(msg.responseJSON);
                            }
                        });
                    }
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>