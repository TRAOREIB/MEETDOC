<?php $__env->startSection('content'); ?>
<?php $__env->startSection('script'); ?>

<!--<link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>-->
<script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.dataTables.min.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(asset('css/jquery.dataTables.min.css')); ?>">
<?php $__env->stopSection(); ?>  

<?php if($resultat=="reussi"): ?>

<?php if($type=="consultation"): ?>
<div class="x_content">
    <div class="x_panel">
        <div class="x_title"><b>Payement du Rendez-Vous </b></div> 
        <?php $__currentLoopData = $rdvselect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        Votre payement a reussi, le rendez vous est pris avec
        le <?php echo e($rd->titremedecin); ?> <?php echo e($rd->nommedecin); ?> <?php echo e($rd->prenommedecin); ?> à la date du <?php echo e($rd->jourrendezvous); ?> de <?php echo e($rd->heuredebut); ?> à <?php echo e($rd->heurefin); ?> vous etes le patient N° <?php echo e($rd->rang); ?> sur <?php echo e($rd->nbrconsultation); ?> patient(s)
        <div class="ln_solid"></div>
        <form method="GET" action="<?php echo e(url('rendezvouspatient')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class=""><input type="submit" class="btn btn-success" value="voir la liste des consultations payés"></div>
            <input type="hidden" value="<?php echo e($rd->id); ?>" name="idpatient">
            <input type="hidden" value="lister" name="valeur">
        </form>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php endif; ?>

<?php if($type=="examen"): ?>
<div class="x_content">
    <div class="x_panel">
        <div class="x_title"><b>Payement du Rendez-Vous </b></div> 
        hello on est la
        <?php $__currentLoopData = $rdvselect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         Votre payement a reussi, le rendez vous est pris pour l'examen de 
         <?php echo e($rd->libellexamen); ?>à la date du <?php echo e($rd->jourtest); ?> de <?php echo e($rd->heuredebut); ?> à
         <?php echo e($rd->heurefin); ?>

        <div class="ln_solid"></div>
        <form method="GET" action="<?php echo e(url('examenpatient')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class=""><input type="submit" class="btn btn-success" value="voir la liste des consultations payés"></div>
            <input type="hidden" value="<?php echo e($rd->id); ?>" name="idpatient">
            <input type="hidden" value="lister" name="valeur">
        </form>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php endif; ?>

<?php endif; ?>

<?php if($resultat=="echoué"): ?>
<div class="x_content">
    <div class="x_panel">
        <div class="x_title"><b>Payement du Rendez-Vous </b></div>
        <b>Votre payement a echoué, veuillez reesayer ou prendre un
            autre rendez-vous</b>
        <div class="card-footer"><input type="submit" value="voir la liste des consultations payés"></div>
    </div>
</div>
<?php endif; ?>
<script>
    $(document).ready(function () {
    $('#table').DataTable();
    });
</script>

<?php $__env->stopSection(); ?>  
<?php echo $__env->make('gentelella-master2.production.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\montest6\resources\views/confirmpayer/confirm.blade.php ENDPATH**/ ?>