<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="<?php echo e(url('admin/home')); ?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Notification Management</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#"> Notification List</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="flash-message">
                            <?php if($message = Session::get('success')): ?>
                                <div class="alert alert-success">
                                    <p><?php echo e($message); ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if($message = Session::get('error')): ?>
                                <div class="alert alert-danger">
                                    <p><?php echo e($message); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="<?php echo e(url('admin/notification')); ?>"><button class="btn btn-primary btn-round ml-auto"
                                    data-toggle="modal" data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add Notification
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $status = $notification->status == 1 ? 'Active' : 'InActive';
                                        ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($notification->title); ?></td>
                                            <td><?php echo $notification->description; ?></td>
                                            <td><?php echo e($status); ?></td>

                                            <td class="action_td">
                                                <div class="form-button-action">
                                                    <a href="<?php echo e(url('admin/edit_notification/' . $notification->id)); ?>"
                                                        data-toggle="tooltip" title=""
                                                        class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                                        <i class="fa fa-edit"></i>

                                                    </a>
                                                    <?php
                                                        $status = @$notification->status == 1 ? '0' : '1';
                                                        $statusicon = @$notification->status == 1 ? 'btn-danger' : 'btn-success';

                                                        $statustite = @$notification->status == 1 ? 'InActive' : 'Active';
                                                    ?>

                                                    <a href="<?php echo e(url('NotificationChangeStatus/' . $notification->id . '/' . $status)); ?>"
                                                        onclick="return confirm('Are you sure to change status?')"
                                                        data-toggle="tooltip" title=""
                                                        class="btn-link <?php echo e($statusicon); ?>"
                                                        data-original-title="<?php echo e($statustite); ?>">
                                                        <?php if($notification->status == 0): ?>
                                                            <i class="fa fa-check"></i>
                                                        <?php else: ?>
                                                            <i class="fa fa-times"></i>
                                                        <?php endif; ?>
                                                    </a>
                                                    <a href="<?php echo e(url('admin/delete_notification/' . $notification->id)); ?>"
                                                        onclick="return confirm('Are you sure you want to delete this notification ?')"
                                                        data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                                        data-original-title="Remove">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    </a>
                                                </div>
                                            </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\DMS\resources\views/admin/notification/show_notification.blade.php ENDPATH**/ ?>