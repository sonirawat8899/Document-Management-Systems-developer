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
                        <a href="#">Permission</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Module Permission</a>
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
                                <a><button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                        data-target="#addRowModal">
                                        <i class="fa fa-show"></i>
                                        Module Permission
                                    </button></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive ">
                                <form action="<?php echo e(url('/admin/module_permission')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <h2>User:</h2>
                                        </div>
                                        <div>
                                            <select name="user_id" class="form-control input-solid">

                                                <option value="">Please Select</option>
                                                <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modules): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($modules->id); ?>"><?php echo e($modules->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <table id="" class="display table table-striped table-hover">

                                        <thead>
                                            <tr>
                                                <th>Module Id</th>
                                                <th>Module Name</th>
                                                <th>Add</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                <th>Change Status</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <tr>
                                                    <td> <?php echo e($users->id); ?></td>
                                                    <td> <?php echo e($users->module_name); ?></td>
                                                    <input type="hidden" name="id[]" value="<?php echo e($users->id); ?>">
                                                    
                                                    <td>
                                                        <input class="form-check-input permission viewall-<?php echo e($users->id); ?>" type="checkbox"  data-view="view-<?php echo e($users->id); ?>"  
                                                            name="permission[<?php echo e($users->id); ?>][add_permission]"
                                                             id="" />
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input permission viewall-<?php echo e($users->id); ?>" type="checkbox"  data-view="view-<?php echo e($users->id); ?>" 
                                                            name="permission[<?php echo e($users->id); ?>][edit_permission]"
                                                            id="" />
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input permission viewall-<?php echo e($users->id); ?> " type="checkbox"  data-view="view-<?php echo e($users->id); ?>" 
                                                            name="permission[<?php echo e($users->id); ?>][delete_permission]"
                                                            id="" />
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input permission viewall-<?php echo e($users->id); ?>" type="checkbox"  data-view="view-<?php echo e($users->id); ?>"  type="checkbox"
                                                            name="permission[<?php echo e($users->id); ?>][status_permission]"
                                                           id=""/>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input view_assumption view-<?php echo e($users->id); ?>" type="checkbox" data-subfield="viewall-<?php echo e($users->id); ?>"
                                                        data-id="<?php echo e($users->id); ?>"
                                                            name="permission[<?php echo e($users->id); ?>][view_permission]"
                                                             id="" />
                                                    </td>
                                                      
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <div class="text-right">
                                        <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                        <a href="<?php echo e(url('admin/module_permission')); ?>"
                                            class="mt-4 btn btn-danger">Cancel</a>
                                        <div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    $('.permission').on('click', function(){
            var view = $(this).data('view');
             $( "."+view ).prop( "checked", true );
        });

    $('.view_assumption').on('click', function(){

        var view = $(this).data('id');
            if (!$(".view-"+view).is(':checked')) {
                var view = $(".view-"+view).data('subfield');
                     $( "."+view ).prop( "checked", false ); 
            }
        });
  </script>
    
<?php $__env->stopSection(); ?>


 
 
<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\DMS\resources\views/admin/permission/module_permission.blade.php ENDPATH**/ ?>