<?php $__env->startSection('content'); ?>
<?php $__env->startSection('script'); ?>

<head>   

        <!--<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>-->
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/datatables.min.js')); ?>"></script>
<!--        <script type="text/javascript" src="<?php echo e(asset('js/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/main.js')); ?>"></script>-->

    <!--<link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">-->
    <link rel="stylesheet" href="<?php echo e(asset('css/datatables.min.css')); ?>">
    <!--<link rel="stylesheet" href="<?php echo e(asset('css/all.css')); ?>">-->

    <script>
        $(document).ready(function () {
        $('#table').DataTable();
        });
    </script>

</head> 
<?php $__env->stopSection(); ?>
<body>

    <form class="was-validated" role="form" method="POST" action="<?php echo e(url('rechercherconsult')); ?>" enctype="application/x-www-form-urlencoded" >
        <?php echo e(csrf_field()); ?>

        <div class="col-md-8 col-sm-8 col-xs-12 ">
            <div class="x_content">  
                <div class="x_panel">
                    <div class="x_title"><b>CRITERES DE RECHERCHE </b></div> 
                    
                    <?php if(session('profil')!='Medecin'): ?>
                    <div class="row">
                        <div class=" col-sm-1">
                            <label for="medecin" class="" style="margin-left: 50px">Medecin </label> 
                        </div>
                        <div class="col-sm-7 col-xs-12 offset-1"> 
                            <select class="form-control" name="id" required=""> 
<!--                                <option selected="selected">Choisir...</option>-->
                                <?php $__currentLoopData = $medecin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $med): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($med->id); ?>"><?php echo e($med->nom); ?> <?php echo e($med->prenom); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <small class="text-danger"><?php echo e($errors->first('id',':message')); ?></small> 
                            </select> 
                        </div>
                    </div>
                    <?php endif; ?>
                    <br>
                    <div class="row">
                        <div class="col-sm-1">
                            <label for="jour" class="" style="margin-left: 70px">Jour </label> 
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-12 offset-1"> 
                            <input type="date" class="form-control" name="jourrendezvous" id="jourrendezvous" required="required"  value="">
                            <small class="text-danger"><?php echo e($errors->first('jourrendezvous',':message')); ?></small> 
                        </div>
                    </div> 

                    <br>
                    <div class="col-xs-12 col-sm-12 offset-4">                         
                        <input type="submit"  value="Rechercher" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px;margin-top: 0px"> 
                    </div>
                </div>
            </div>
        </div>
    </form>      



    <div class="col-md-12 col-sm-12 col-xs-12 ">
        <div class="x_content">  
            <div class="x_panel">
                <div class="x_title"><b>LISTE DES RENDEZ-VOUS </b></div> 
                <div class="table-responsive">
                    <table class="table col-sm-12 table-striped table-condensed" id="table">
                        <thead>
                            <tr style="background-color:#2a6496;color: #FFFFFF;">

                                <th>CNIB</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Age</th>
                                <th>Antecedent</th>
                                <th>Symptome</th>
                                <th>Examen Fait</th>
                                <th>Jour</th>
                                <th>Ordre de Passage</th>


                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $rendezvous; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rdv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($rdv->cnibpatient); ?></td>
                                <td><?php echo e($rdv->nompatient); ?></td>
                                <td><?php echo e($rdv->prenompatient); ?></td>
                                <td><?php echo e($rdv->agepatient); ?></td>
                                <td><?php echo e($rdv->antecedants); ?></td>
                                <td><?php echo e($rdv->symptomes); ?></td>
                                <td><?php echo e($rdv->examensfait); ?></td>
                                <td><?php echo e($rdv->jourrendezvous); ?></td>
                                <td><?php echo e($rdv->ordrepassage); ?></td>

                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     

                        </tbody>
                    </table>
                </div>   

            </div>
        </div>
    </div>
    <!--  fin de la liste-->

</body>

<div class="modal" id="confirmationta">
    <div class="modal-dialog modal-xs">
        <div class="modal-content" style="background-color :">
            <div class="modal-body">
                <span class="glyphicon glyphicon-exclamation-sign" style="color: #f0ad4e"><label > Supprimer cet &eacutelement ? </label></span>
            </div>
            <div class="modal-footer">
                <a href="#"  class="btn btn-success" data-di  xsiss="modal"><span class="glyphicon glyphicon-ok-sign"></span> OUI</a>
                <a href="#"  class="btn btn-danger" data-di  xsiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> NON</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('gentelella-master2.production.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\montest6\resources\views/rendezvous/liste_consult_med.blade.php ENDPATH**/ ?>