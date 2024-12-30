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
                    <a href="#">Add User</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add User</div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(url('admin/register_user')); ?>" method="post" id="validate">
                            <?php echo csrf_field(); ?>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="name">Company Name*</label>
                                    <select name="company_name" class="form-control">
                                        <option value=""> Please Select</option>
                                        <?php $__currentLoopData = $company_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($company_name->id); ?>"> <?php echo $company_name->company_name;?>
                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    <label for="name">Name*</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                        name="name" onkeypress="return /[A-Za-z/ _-]/i.test(event.key)">
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
                                    <label for="email">Email Address*</label>
                                    <input type="email" class="form-control" id="user_email" placeholder="Enter Email"
                                        name="email">
                                    <span class="text-danger error" id="email_err">
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
                                    <label for="password">Password*</label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Enter your password" name="password">
                                    <span class="text-danger error">
                                        <?php $__errorArgs = ['password'];
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
                                    <label for="mobile">Mobile*</label>
                                    <input type="text" class="form-control" id="user_mobile" placeholder="Enter Mobile"
                                        name="mobile">
                                    <span class="text-danger error" id="mobile_err">
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
                                <div class="form-group col-md-6">
                                    <label for="user_type">User Type</label>
                                    <select name="user_type" class="form-control">
                                        <option value=""> Please Select</option>
                                        <?php $__currentLoopData = $project_manager; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project_manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($project_manager->id); ?>"> <?php echo $project_manager->name;?>
                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <button type="submit" class="mt-4 btn btn-success">Submit</button>
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

    // validate  form using jquey
    $("#validate").validate({
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
                required:true,
                number:true,
                minlength: 10,
                maxlength: 12,
                indianMobile: true,
            },
            // designation: {

            //     required: true,
            // },
            password: {

                required: true,
                minlength: 8
            },

        },
        messages: {
            name: {
                required: "Please enter your Name",
                minlength: "Enter your name at least 4 letters",
                maxlength: "Your name length should not be greater than 20 letters",
            },
            company_name: {
                required: "Please enter your company  name",
            },
            email: {
                required: "Enter a e-mail address",
            },
            mobile: {
                required: "Please enter your valid mobile no.",
                number: "Please enter mobile no. in numeric",
                minlength: "At least length should be 10",
                maxlength: "Length should not be greater than 12",
            },
            // designation: {
            //     required: "Enter a valid designation",
            // },
            password: {
                required: "Enter a valid password",
                minlength: "Password must be at least 8 characters",
            },

        }

    });
});

//check email

  $("#user_email").blur(function(){
//    alert('aaaa');
    var email = $(this).val();
    $.ajax({
      type: "GET",
      url: "/admin/checkUserEmail?email="+email,

      success: function(response)
      {
        console.log(response);
        if(response == 1){
          $('#email_err').text('This email is already exist');
          $('#submit').attr('disabled','disabled');
        }
        else{
          $('#email_err').text('');
          $('#submit').removeAttr('disabled');
        }
      },
      error: function(response)
      {

      }
    });
  });


//Check mobile

  $("#user_mobile").blur(function(){
//    alert('aaaa');
    var mobile = $(this).val();
    $.ajax({
      type: "GET",
      url: "/admin/checkUserMobile?mobile="+mobile,

      success: function(response)
      {
        console.log(response);
        if(response == 1){
        //   $('#mobile_err').text('This mobile is already exist');
          $('#submit').attr('disabled','disabled');
        }
        else{
          $('#mobile_err').text('');
          $('#submit').removeAttr('disabled');
        }
      },
      error: function(response)
      {

      }
    });
  });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\DMS\resources\views/admin/user/adduser.blade.php ENDPATH**/ ?>