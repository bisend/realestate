<?php $__env->startSection('title'); ?>
    <title><?php echo e(get_string('services_settings') . ' - ' . get_setting('site_name', 'site')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_title'); ?>
    <h3 class="page-title mbot10"><?php echo e(get_string('services_settings')); ?></h3>
<?php $__env->stopSection(); ?>
<div class="panel col s12">
    <div class="row">
        <div class="panel-heading">
            <ul class="nav nav-tabs">
                <li class="tab active"><a data-toggle="tab" href="#general_settings"><?php echo e(get_string('general')); ?></a></li>
            </ul>
        </div>
        <?php echo Form::open(['url' => route('admin_service_settings_update'), 'method' => 'post', 'id' => "service_settings", 'class' => 'table-responsive', 'files' => 'true']); ?>

        <div class="panel-body">
            <div class="tab-content">
                <div id="general_settings" class="tab-pane active">
                    <div class="col l6 m6 s6">
                        <div class="form-group  <?php echo e($errors->has('services_allowed') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::select('services_allowed', ['0' => get_string('no'), '1' => get_string('yes')], get_setting('services_allowed', 'service'), ['class' => 'form-control'])); ?>

                            <?php echo e(Form::label('services_allowed', get_string('services_allowed'))); ?>

                            <?php if($errors->has('services_allowed')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('services_allowed')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col l6 m6 s6">
                        <div class="form-group  <?php echo e($errors->has('services_approved_by_admin') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::select('services_approved_by_admin', ['0' => get_string('no'), '1' => get_string('yes')], get_setting('services_approved_by_admin', 'service'), ['class' => 'form-control'])); ?>

                            <?php echo e(Form::label('services_approved_by_admin', get_string('services_approved_by_admin'))); ?>

                            <?php if($errors->has('services_approved_by_admin')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('properties_approved_by_admin')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col l6 m6 s6">
                        <div class="form-group  <?php echo e($errors->has('allow_featured_services') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::select('allow_featured_services', ['0' => get_string('no'), '1' => get_string('yes')], get_setting('allow_featured_services', 'service'), ['class' => 'form-control'])); ?>

                            <?php echo e(Form::label('allow_featured_services', get_string('allow_featured_services'))); ?>

                            <?php if($errors->has('allow_featured_services')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('allow_featured_services')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col clearfix l4 m4 s12 mtop10">
                <div class="form-group">
                    <button class="btn waves-effect" type="submit" name="action"><?php echo e(get_string('update')); ?></button></div>
            </div>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>