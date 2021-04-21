<?php $__env->startSection('content'); ?>
<?php $__env->startSection('script'); ?>

<html>
    <head>
<!--        <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>-->
        <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/dataTables.min.js')); ?>"></script>
        <!--<script type="text/javascript" src="<?php echo e(asset('js/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>-->
        <!--<script type="text/javascript" src="<?php echo e(asset('js/main.js')); ?>"></script>-->

        <!--<link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">-->
        <link rel="stylesheet" href="<?php echo e(asset('css/dataTables.min.css')); ?>">
        <!--<link rel="stylesheet" href="<?php echo e(asset('css/all.css')); ?>">-->
    </head>
    <?php $__env->stopSection(); ?>

    <body>
        <div style="margin-left: 20px">
            <?php if(session('profil')=='Medecin'): ?>
            <label class=""><b><?php echo e(session('titre')); ?> <?php echo e(session('nom')); ?></b></label>
            <?php else: ?>
            <label class=""><b><?php echo e($titre); ?> <?php echo e($nom); ?> <?php echo e($prenom); ?></b></label>
            <?php endif; ?>
        </div>
        <div class="col-md-10 col-sm-10 col-xs-12 ">

            <form class="was-validated" novalidate role="form" method="POST" action=" <?php echo e(url('disponibilite')); ?> " enctype="application/x-www-form-urlencoded" >
                <?php echo e(csrf_field()); ?>

                <div class="x_content">  
                    <div class="x_panel">
                        <div class="x_title"><b>ENREGISTRER LA DISPONIBILITE </b></div> 

                        <div class="row">
                            <label for="specialite" class="offset-sm-1 col-sm-3">Choisir la Structure </label> 
                            <div class="col-sm-6 col-md-6 col-xs-12"> 
                                <select class="form-control" name="idstructure">
                                    <option> Choisir</option>
                                    <?php $__currentLoopData = $medecinstructure; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medstruct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($medstruct->idstructure); ?>"><?php echo e($medstruct->nomstructure); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <small class="invalid-feedback"><?php echo e($errors->first('idstructure',':message')); ?></small> 
                                </select> 
                            </div>
                        </div><br>
                        
                        <div class="row">
                            <label for="jour" class="offset-sm-1 col-sm-3">Date *</label> 
                            <div class="col-sm-5 col-xs-12"> 
                                <input type="date" class="form-control" name="jour" id="libelle"  required>
                                <small class="invalid-feedback"><?php echo e($errors->first('jour',':message')); ?></small> 
                            </div> 
                        </div>

                        <br>

                        <div class="row">
                            <label for="heure" class="offset-sm-1 col-sm-3">Heure Debut *</label> 
                            <div class="col-sm-3 col-xs-12"> 
                                <input type="time" class="form-control" name="heuredebut" id="prenom"   required>
                                <small class="invalid-feedback"><?php echo e($errors->first('heuredebut',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="titre" class="offset-sm-1 col-sm-3">Heure Fin *</label> 
                            <div class="col-sm-3 col-xs-12"> 
                                <input type="time" class="form-control" name="heurefin" id="prenom"  required>
                                <small class="invalid-feedback"><?php echo e($errors->first('heurefin',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="nombre" class="offset-sm-1 col-sm-3">Nombre de Consultations *</label> 
                            <div class="col-sm-3 col-xs-12"> 
                                <input type="number" class="form-control" name="nbrconsultation" id="prenom"  value="1" required>
                                <small class="invalid-feedback"><?php echo e($errors->first('heurefin',':message')); ?></small> 
                            </div> 
                        </div>

                        <div class="ln_solid"></div>

                        <div class="item form-group">  
                            <div style="margin:auto">
                                <input type="submit"  value="Ajouter" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px;margin-top: 0px"> 
                                <input type="button"  value="Annuler" onclick="location.href = '<?php echo e(url('disponibilite')); ?>'" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px; margin-top:0px;">
                            </div>
                        </div>

                    </div>

                    <input type="hidden" value="<?php echo e($idmedecin); ?>" name="idmedecin">
                 
                    <input type="hidden" value="<?php echo e($nom); ?>" name="nom">
                    <input type="hidden" value="<?php echo e($prenom); ?>" name="prenom">
                    <input type="hidden" value="<?php echo e($titre); ?>" name="titre">
                    <input type="hidden" value="<?php echo e($request); ?>" name="request">

                    </form>
                </div> 

                <div class="col-sm-12">
                    <div class="x_content">  
                        <div class="x_panel">
                            <div class="x_title"><b>LISTE DES DISPONIBILITES </b></div> 
                            <div class="table-responsive">
                            <table class="table table-striped col-sm-12 col-xs-12 " id="table">
                                <thead>
                                    <tr style="background-color:#2a6496;color: #FFFFFF;">
                                        <th>Jour Disponible</th>
                                        <th>Heure Debut</th>
                                        <th>Heure Fin</th>
                                        <th>Nombre Consultation</th>
                                        <th>Retirer</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $disponible; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dispo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($dispo->jourdispo); ?></td>
                                        <td><?php echo e($dispo->heuredebut); ?></td>
                                        <td><?php echo e($dispo->heurefin); ?></td>
                                        <td><?php echo e($dispo->nbrconsultation); ?></td>



                                        <td title="Disponibilite">
                                            <form method="POST" action="<?php echo e(route('disponibilite.destroy', [$dispo->iddispo])); ?>">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" value="<?php echo e($idmedecin); ?>" name="idmedecin">
                                                <input type="hidden" value="<?php echo e($idstructure); ?>" name="idstructure">
                                                <input type="hidden" value="<?php echo e($nom); ?>" name="nom">
                                                <input type="hidden" value="<?php echo e($prenom); ?>" name="prenom">
                                                <input type="hidden" value="<?php echo e($titre); ?>" name="titre">
                                                <input type="submit" style="border: 0px;background-color:" class="btn btn-primary" value="Retrait">

                                            </form>
                                        </td>

                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
               
                </div>     
                </body>
                </html>

                <script>
                    $(document).ready(function () {
                    $('#table').DataTable();
                    });

                </script>

                <?php $__env->stopSection(); ?>



<?php echo $__env->make('gentelella-master2.production.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\montest6\resources\views/disponibilite/form_disponibilite.blade.php ENDPATH**/ ?>