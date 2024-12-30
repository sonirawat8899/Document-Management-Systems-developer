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
                    <a href="<?php echo e(url('admin/userManagement')); ?>">User Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit User</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
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

                        <div class="card-title">Edit User</div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(url('admin/update_user')); ?>" method="post" id="form">

                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($users->id); ?>">
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">   
                                    <label for="name">Company Name *</label>
                                    <select name="company_name" class="form-control">
                                        <option value=""> Please Select</option>
                                        {{}}
                                        <?php foreach($company_name as $company_name){?>

                                            
                                        <option <?php if(@$users->company_id == $company_name->id){?>selected
                                            <?php } ?> value="<?php echo e($company_name->id); ?>"><?php echo e(@$company_name->company_name); ?>

                                        </option>
                                        <?php }?>

                                    </select>
                                    <span class="text-danger  ">
                                        <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Name *</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                        value="<?php echo e($users->name); ?>" name="name"
                                        onkeypress="return /[A-Za-z/ _-]/i.test(event.key)">
                                    <span class="text-danger  ">
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email Address *</label>
                                    <input type="email" class="form-control" id="user_email" placeholder="Enter Email"
                                        value="<?php echo e($users->email); ?>" name="email">
                                    <span class="text-danger  " id="email_err">
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </span>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="mobile">Mobile *</label>
                                    <input type="text" class="form-control" id="user_mobile" placeholder="Enter Mobile"
                                        value="<?php echo e($users->mobile); ?>" name="mobile">
                                    <span class="text-danger  " id="mobile_err">
                                        <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="designation">User Type</label>
                                    <select name="user_type" class="form-control">
                                        <option value=""> Please Select</option>
                                        <?php foreach($project_manager as $project_manager){?>
                                        <option <?php if($users->user_type == $project_manager->id){?>selected
                                            <?php } ?> value="<?php echo e($project_manager->id); ?>"><?php echo e($project_manager->name); ?>

                                        </option>
                                        <?php }?>
                                    </select>
                                    <span class="text-danger  ">
                                        <?php $__errorArgs = ['user_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </span>
                                </div>

                            </div>
                            <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success">Update</button>
                                <a href="<?php echo e(url('admin/userManagement')); ?>" class="mt-4 btn btn-danger">Cancel</a>
                                <div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

    $.validator.addMethod("indianMobile", function(value, element) {
        return this.optional(element) || /^[6789]\d{9}$/.test(value);
    }, "Please enter a valid  mobile number");

    $.validator.addMethod("customEmail", function(value, element) {
        return /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(value);
    }, "Please enter a valid email address");

    $("#form").validate({
        rules: {
            name: {
                required: true,
                minlength: 4,
                maxlength: 20,
            },
            company_name: {
                required: true,
            },
            email: {
                required: true,
                customEmail: true,
            },

            mobile: {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 12,
                indianMobile: true,
            },
            // user_type: {
            //     required: true,
            // },


        },
        messages: {
            name: {
                required: "Please enter your name",
            },
            company_name: {
                required: "Please enter your company  name",
                // minlength: "Enter your commpany name atleast 4 letters",
                // maxlength: "Your commpany name length should not be greater than 20 letters",
            },
            email: {
                required: "Enter a valid email address",
            },
            mobile: {
                required: "Please enter your valid mobile no.",
                number :"Mobile number should be number only",
            },
            // user_type: {
            //     required: "*Enter a valid user type",
            // },


        }

    });
});

//check email

$("#user_email").blur(function() {
    // alert('aaaa');
    var email = $(this).val();
    id = <?php echo $users->id ?>;
    console.log(id);
    $.ajax({
        type: "GET",
        url: "/admin/checkUserEmail",
        data: {
            'email': email,
            'id': id
        },
        success: function(response) {
            console.log(response);
            if (response == 1) {
                $('#email_err').text('This email is already exist');
                $('#subit').attr('disabled', 'disabled');
            } else {
                $('#email_err').text('');
                $('#submit').removeAttr('disabled');
            }
        },
        error: function(response) {

        }
    });
});

//check mobile


$("#user_mobile").blur(function() {
    // alert('aaaa');
    var mobile = $(this).val();
    id = <?php echo $users->id ?>;
    console.log(id);
    $.ajax({
        type: "GET",
        url: "/admin/checkUserMobile",
        data: {
            'mobile': mobile,
            'id': id
        },
        success: function(response) {
            console.log(response);
            if (response == 1) {
            
                $('#submit').attr('disabled', 'disabled');
            } else {
                $('#mobile_err').text('');
                $('#submit').removeAttr('disabled');
            }
        },
        error: function(response) {

        }
    });
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\DMS\resources\views/admin/user/edit.blade.php ENDPATH**/ ?>