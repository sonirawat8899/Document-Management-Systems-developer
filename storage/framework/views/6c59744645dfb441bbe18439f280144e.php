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
                    <a href="<?php echo e(url('admin/view_company')); ?>">Company Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Company</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Company</div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(url('admin/edit_company')); ?>" id="edit_company" method="POST"  enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" id="id" value="<?php echo e($company_data->id); ?>">
                            <input type="hidden" name="user_id" value="<?php echo e($company_data->user_id); ?>">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Coampany Name</label>
                                    <input type="text" name="company_name" id="company_name" class="form-control" value="<?php echo e($company_data->company_name); ?>">
                                    <span class="text-danger" id="company_err">
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
                                    <label>Owner Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="<?php echo e($company_data->name); ?>">
                                    <span class="text-danger" id="company_err">
                                        <?php $__errorArgs = ['owner_name'];
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
                                    <label>Email</label>
                                    <input type="email" name="email" id="company_email" class="form-control" value="<?php echo e($company_data->email); ?>">
                                    <span class="text-danger" id="email_err">
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
                                    <label>Mobile No</label>
                                    <input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo e($company_data->mobile); ?>">
                                    <span class="text-danger" id="mobile_err">
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
                                    <label for="name">Logo</label>
                                    <div class="upload-img-box mb-25">
                                        <input type="file" class="form-control" name="logo" id="file"
                                            accept="image/*"  value="<?php echo e($company_data->logo); ?>">
                                    </div>
                                    <div class="clear"></div>
                                    <div id="previewimage">
                                        <img src="<?php echo e(asset('images/logo/'.@$company_data->logo)); ?>"
                                            width="100px" />
                                    </div>
                                    <p><?php echo e(__('Accepted Image Files')); ?>: JPEG, JPG, PNG <br><?php echo e(__('Accepted Size')); ?>: 300 x                300 (1MB)</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success" id="submit">Update</button>
                                <a href="<?php echo e(url('admin/view_company')); ?>" class="mt-4 btn btn-danger">Cancel</a>
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
        $("#edit_company").validate({
            rules: {

                company_name: "required",
            },
            messages: {
                company_name: "Update  company name",
            }

        });
    });
    function filePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#company_name + img').remove();
                $('#previewimage').after('<img src="'+e.target.result+'" width="100" height="100"/>');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#company_name").blur(function(){
        var company_name = $(this).val();
        id = <?php echo $company_data->id ?>;
        console.log(id);
        $.ajax({
            type: "GET",
            url: "/admin/checkCompany",
            data: {'company_name':company_name,'id':id},
            success: function(response) 
            { 
                console.log(response);
                if(response == 1){
                $('#company_err').text('This company is already exist');
                $('#submit').attr('disabled','disabled');
                }
                else{
                $('#company_err').text('');
                $('#submit').removeAttr('disabled');
                }
            },
            error: function(response) 
            {
                
            }
        });
    });
        

        $("#mobile").blur(function(){
        var mobile = $(this).val();
        id = <?php echo $company_data->id ?>;
        console.log(id);
        $.ajax({
            type: "GET",
            url: "/admin/checkMobile",
            data: {'mobile':mobile,'id':id},
            success: function(response) 
            { 
                console.log(response);
                if(response == 1){
                $('#mobile_err').text('This mobile number is already exist');
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


  
  $("#company_email").blur(function(){
        var email = $(this).val();
        id = <?php echo $company_data->id ?>;
        console.log(id);
        $.ajax({
            type: "GET",
            url: "/admin/checkEmail",
            data: {'email':email,'id':id},
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
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\DMS\resources\views/admin/company/update_company.blade.php ENDPATH**/ ?>