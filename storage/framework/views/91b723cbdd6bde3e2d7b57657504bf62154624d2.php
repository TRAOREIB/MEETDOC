<?php $__env->startSection('content'); ?>
<?php $__env->startSection('script'); ?>

<head>
<!--        <script src="<?php echo e(asset('js/bootstrap.js')); ?>"></script>
    <link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel="stylesheet">-->
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/datatables.min.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('css/datatables.min.css')); ?>">
</head>

<?php $__env->stopSection(); ?> 

<body>

<div><label style="font-family: cursive"><h3>Votre compte a ete enregistré avec succès, cliquer sur <a href="<?php echo e(url('/')); ?>" style="color: red">Connecter</a></h3></label></div> 

</body>
</html>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('gentelella-master2.production.templateinscription', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\montest6\resources\views/patient/form_validecompte.blade.php ENDPATH**/ ?>