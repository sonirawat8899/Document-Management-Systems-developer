<?php $__env->startSection('content'); ?>
<style>
.form-manage {
    padding: 10%;
    background-image: linear-gradient(to right, #f4f4f4 , #9cb2cc);
    border: 1px solid #dad7d7;
}
.form-manage label {
    display: inline-block;
    font-size: 16px;
}
.form-manage button {
    width: 110px;
    font-size: 16px;
    margin-top: 4%;
}
.py-5 {
    padding-top:none;
    padding-bottom:none;
    background: #eee;
}
</style>
 <section class="login py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="form-manage">
                        <h2 class="text-center mb-4">Log in to your account</h2>
                        <form action="<?php echo e(route('login')); ?>" method="POST">
                            
                            <?php echo csrf_field(); ?>
                            
                            <div class="input-effect position-relative mb-3">
                            <label>Email</label>                  
                                <input id="email" type="email" class="form-control effect-17 w-100 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                
                            
                            </div>

                            <div class="input-effect position-relative mb-3">
                            <label>Password</label>
                                <input id="password" type="password" class="form-control effect-17 w-100 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                
                            
                            </div>
                            



                            <div class="form-group row">
                                <div class="col-md-6 ">
                                    <div class="pl-2">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember_token') ? 'checked' : ''); ?>>

                                        <label class="form-check-label" for="remember">
                                            <?php echo e(__('Remember Me')); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                <?php echo e(__('Login')); ?>

                            </button>
                            </div> 
                            

                            <?php if(Route::has('password.request')): ?>
                                <p class="text-center mt-3">or 

                                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(__('Forgot Your Password?')); ?>

                                </a>
                                </p>
                            <?php endif; ?>
                            
                                <p class="text-center">Don't have an account? <a href="<?php echo e(route('register')); ?>" class="text-decoration-underline"> Sign up</a></p>
                
                                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
               

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\DMS\resources\views/auth/login.blade.php ENDPATH**/ ?>