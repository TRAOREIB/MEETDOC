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

</head>

<?php $__env->stopSection(); ?>
<?php if(isset($message)): ?>
<div class="col-sm-6" style="margin-left: 250px">
    <div class="alert alert-success" >
        <label style="margin-left: 30px"> <?php echo e($message); ?></label>
    </div>
</div>
<br>
<?php endif; ?>
<br>
<body>

    <div class="col-sm-10" style="margin-top: 0px">
        <h3 style="margin: 0px; padding-top: 0px; color: #0044cc; font-weight: normal"> Gerer les Rendez-Vous de <?php echo e($nom); ?> <?php echo e($prenom); ?> </h3>
    </div>
    <br>
    <form class="" method="POST" action=" <?php echo e(url('rendezvous')); ?> " enctype="application/x-www-form-urlencoded" >
        <?php echo e(csrf_field()); ?>


        <div class="col-sm-12 col-xs-12">
            <br>
            <div class="col-md-8 col-sm-8 col-xs-12" style="background-color: blue;border-radius:30px;"><b><h2><label class="offset-1 col-xs-12" style="font-family:  sans-serif;color: white;"><i>Etape 1: Renseigner les informations complementaires</i></label></h2></b></div>
            <div class="x_content"> 
                <br>
                <div class="x_panel">
                    <div class="x_title"><b>INFORMATIONS COMPLEMENTAIRES </b></div> 

                    <div class="row">
                        <label for="antecedants" class="col-sm-2">Antecedants </label> 
                        <div class="col-sm-9 col-xs-12"> 
                            <input type="text" class="form-control" name="antecedants" id="symptome"  value="">
                            <small class="text-danger"><?php echo e($errors->first('antecedants',':message')); ?></small> 
                        </div> 
                    </div>
                    <br>
                    <div class="row">
                        <label for="symptomes" class="col-sm-2">Symptomes </label> 
                        <div class="col-sm-9 col-xs-12"> 
                            <input type="text" class="form-control" name="symptomes" id="symptome"  value="">
                            <small class="text-danger"><?php echo e($errors->first('symptomes',':message')); ?></small> 
                        </div> 
                    </div>
                    <br>
                    <div class="row">
                        <label for="examensfait" class="col-sm-2">Examens Fait </label> 
                        <div class="col-sm-9 col-xs-12"> 
                            <input type="text" class="form-control" name="examensfait" id="symptome"  value="">
                            <small class="text-danger"><?php echo e($errors->first('examensfait',':message')); ?></small> 
                        </div> 
                    </div>

                </div>
            </div> 
        </div>
        <br><br>


        
            <br>
            <div class="col-md-4 col-xs-12 col-sm-9" style="background-color: blue;border-radius:30px">
                <b><h2><label class="offset-1" style="font-family:  sans-serif;color: white;"><i>Etape 2: Choisir la disponibilité </i></label></h2></b>
            </div>
         
            <div class="table-responsive">               
                <table class="table table-striped table-condensed" id="table">
                    <br>
                    <thead>
                        <tr style="background-color:#2a6496;color: #FFFFFF;">
                            <th>Nom Structure</th>
                            <th>Specialite</th>
                            <th>Jour Disponible</th>
                            <th>Heure Debut</th>
                            <th>Heure Fin</th>
                            <th>Titre</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Prix (CFA)</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $disponible; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dispo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($dispo->nomstructure); ?></td>
                            <td><?php echo e($dispo->libellespecialite); ?></td>
                            <td><?php echo e($dispo->jourdispo); ?></td>
                            <td><?php echo e($dispo->heuredebut); ?></td>
                            <td><?php echo e($dispo->heurefin); ?></td>
                            <td><?php echo e($dispo->titremedecin); ?></td>
                            <td><?php echo e($dispo->nommedecin); ?></td>
                            <td><?php echo e($dispo->prenommedecin); ?></td>
                            <td><?php echo e($dispo->prix); ?></td>

                            <td title="Disponibilite">
                                <button type="submit" style="border: 0px;background-color:" class="btn btn-primary" value="<?php echo e($dispo->id); ?>|<?php echo e($idpatient); ?>|<?php echo e($dispo->jourdispo); ?>|<?php echo e($dispo->heuredebut); ?>|<?php echo e($dispo->heurefin); ?>|<?php echo e($dispo->iddispo); ?>|<?php echo e($dispo->prix); ?>" name="dispo">Choisir</button>
                                <input type="hidden" value="<?php echo e($dispo->id); ?>" name="idmedecin"> 
                                <input type="hidden" value="<?php echo e($nom); ?>" name="nom">
                                <input type="hidden" value="<?php echo e($prenom); ?>" name="prenom">
                                <input type="hidden" value="<?php echo e($dispo->prix); ?>" name="prix"> 

                            </td>

                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                    </tbody>
                </table>
            </div>   
       
      

    </form>

    <br><br>
    <div class="col-sm-10 col-xs-12 col-md-10">
        <br>
        <div class="" style="margin: 0px; padding-top: 0px; color: #0044cc; font-weight: normal"><b><h4><i>LISTE DES RENDEZ-VOUS DE <?php echo e($nom); ?> <?php echo e($prenom); ?></i></h4></b> </div>
        <div class="table-responsive">
            <table class="table table-striped table-condensed" id="table2">
                <thead>
                    <tr style="background-color:#2a6496;color: #FFFFFF;">
                        <th>Specialite</th>
                        <th>Titre</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Jour</th>
                        <th>Heure Debut</th>
                        <th>Heure Fin</th>
                        <th>Etat</th>
                        <th>Prix</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $rendezvous; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rdv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($rdv->specialitemedecin); ?></td>
                        <td><?php echo e($rdv->titremedecin); ?></td>
                        <td><?php echo e($rdv->nommedecin); ?></td>
                        <td><?php echo e($rdv->prenommedecin); ?></td>
                        <td><?php echo e($rdv->jourrendezvous); ?></td>
                        <td><?php echo e($rdv->heuredebut); ?></td>
                        <td><?php echo e($rdv->heurefin); ?></td>                   
                        <td> <?php if($rdv->paye==0): ?>
                            <label class="label" style="color: red;font-size: 12px"><i><b>Non Payé</b></i></label>
                            <?php else: ?>
                            <label class="label" style="color: blue;font-size: 12px"><i><b>Payé</b></i></label>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($rdv->prix); ?></td>


                        <td title="rendezvous">
                            <?php if($rdv->effectue==0 && $rdv->paye==0): ?>
                            <form method="POST" action="<?php echo e(route('rendezvous.destroy', [$rdv->idrdv])); ?>">
                                <?php echo e(method_field('DELETE')); ?>

                                <?php echo e(csrf_field()); ?>


                                <input type="hidden" value="<?php echo e($idpatient); ?>" name="idpatient">
                                <input type="hidden" value="<?php echo e($nom); ?>" name="nom">
                                <input type="hidden" value="<?php echo e($prenom); ?>" name="prenom">
                                <input type="submit" style="border: 0px;background-color:" class="btn btn-primary" value="Retrait">

                            </form>

                            <form method="GET" action="<?php echo e(route('payerconsult')); ?>">
                                <input type="submit" style="border: 0px;background-color:" class="btn btn-warning" value="Payer">
                                <input type="hidden" value="<?php echo e($rdv->idrdv); ?>" name="idrdv">
                                <input type="hidden" value="<?php echo e($rdv->prix); ?>" name="prix">
                                <input type="hidden" value="consultation" name="type">
                            </form>

                            <?php else: ?>
                            <?php if($rdv->paye==1 && $rdv->effectue==0): ?>
                            <form method="POST" action="">
                                <input type="submit" style="border: 0px;background-color:" class="btn btn-warning" value="Reprogrammer">
                            </form>
                            <?php endif; ?>

                            <?php endif; ?>
                        </td>

                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                </tbody>
            </table>
        </div>
    </div>

     <script>
        $(document).ready(function () {
        $('#table').DataTable();
        });
    </script>
    <script>
        $(document).ready(function () {
        $('#table2').DataTable();
        });
    </script>
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('gentelella-master2.production.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\montest6\resources\views/rendezvous/form_rdv.blade.php ENDPATH**/ ?>