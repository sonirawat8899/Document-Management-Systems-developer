<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Document Management System')); ?></title>

    <!-- Scripts -->
<link rel="icon" href="<?php echo e(asset('admin/img/icon.ico')); ?>" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?php echo e(asset('admin/js/plugin/webfont/webfont.min.js')); ?>"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../admin/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo e(asset('admin/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('admin/css/atlantis.min.css')); ?>">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?php echo e(asset('admin/css/demo.css')); ?>">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
            <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>
</html>
<?php /**PATH C:\wamp64\www\DMS\resources\views/layouts/admin-login.blade.php ENDPATH**/ ?>