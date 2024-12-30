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
                    <a href="#">User Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">User List</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
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
                            <a href="<?php echo e(url('admin/adduser')); ?>"><button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add User
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table id="datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th> S. No</th>
                                        <th> Name</th>
                                        <th>Company Name</th>
                                        <th> Email </th>
                                        <th> Mobile </th>
                                        <th> Status</th>
                                        <th> Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $status = $users->status == 1 ? 'Active' : 'InActive';
                                        ?>
                                        <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                            <td> <?php echo e($users->name); ?></td>
                                            <td> <?php echo e($users->company_name); ?></td>
                                            <td> <?php echo e($users->email); ?></td>
                                            <td> <?php echo e($users->mobile); ?></td>
                                            <td><?php echo e($status); ?></td>
                                            <td class="action_td">
                                               
                                                    <a href='/admin/edit_user/<?php echo e($users->id); ?>' data-toggle="tooltip" title=""
                                                            class="btn-link btn-primary" data-original-title="Edit Task">
                                                            <i class="fa fa-edit"></i>
                                                    </a>
                                                    <?php
                                                        $status = @$users->status == 1 ? '0' : '1';
                                                        $statusicon = @$users->status == 1 ? 'btn-danger' : 'btn-success';

                                                        $statustite = @$users->status == 1 ? 'InActive' : 'Active';
                                                    ?> 
                                                                                             
                                                     <a href="<?php echo e(url('UserChangeStatus/'. $users->id.'/'. $status)); ?>"
                                                        onclick="return confirm('Are you sure to change status?')"   data-toggle="tooltip" title=""
                                                            class="btn-link <?php echo e($statusicon); ?>" data-original-title="<?php echo e($statustite); ?>">
                                                            <?php if($users->status==0): ?>
                                                            <i class="fa fa-check"></i>
                                                            <?php else: ?>
                                                            <i class="fa fa-times"></i>
                                                            <?php endif; ?>
                                                    </a>
                                                    <a href="/admin/delete_user/<?php echo e($users->id); ?>"
                                                        onclick="return confirm('Are you sure you want to delete this user ?')"  data-toggle="tooltip" title=""
                                                            class="btn-link btn-danger" data-original-title="Remove">
                                                            <i class="fa fa-trash"></i>
                                                    </a>
                                             
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\DMS\resources\views/admin/user/userManagement.blade.php ENDPATH**/ ?>