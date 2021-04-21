<html>
    <head>
        <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/datatables.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/main.js')); ?>"></script>

        <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('css/datatables.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/all.css')); ?>">

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
        
    </head>

    <body>
        <div class="col-sm-10" style="margin-top: 0px">
            <h3 style="margin: 0px; padding-top: 0px; color: #0044cc; font-weight: normal"> Gerer les Rendez-Vous </h3>
        </div>
        <br>
        <label class="label control-label"><b><?php echo e($titre); ?> <?php echo e($nom); ?> <?php echo e($prenom); ?></b></label>


        <form class="" role="form" method="POST" action=" <?php echo e(url('disponibilite')); ?> " enctype="application/x-www-form-urlencoded" >
            <?php echo e(csrf_field()); ?>

            <div class="row col-sm-12">


                <div class="card col-sm-4">  

                    <div class="card-header"><b>Informations Complementaires</b></div>
                    <div class="card-body">

                        <br>

                        <div class="">
                            <label for="antecedants" class="offset-sm-1">Antecedants </label> 
                            <div class="col-sm-12"> 
                                <input type="text" class="form-control" name="antecedants" id="symptome"  value="">
                                <small class="text-danger"><?php echo e($errors->first('antecedants',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>
                        <div class="">
                            <label for="symptomes" class="offset-sm-1">Symptomes </label> 
                            <div class="col-sm-12"> 
                                <input type="text" class="form-control" name="symptome" id="symptome"  value="">
                                <small class="text-danger"><?php echo e($errors->first('symptome',':message')); ?></small> 
                            </div> 
                        </div>

                    </div>


                    <input type="hidden" value="<?php echo e($idmedecin); ?>" name="idmedecin">
                    <input type="hidden" value="<?php echo e($idstructure); ?>" name="idstructure">
                    <input type="hidden" value="<?php echo e($nom); ?>" name="nom">
                    <input type="hidden" value="<?php echo e($prenom); ?>" name="prenom">
                    <input type="hidden" value="<?php echo e($titre); ?>" name="titre">
                    <input type="hidden" value="<?php echo e($request); ?>" name="request">


                </div> 




                <div class="card col-sm-8">
                    <div class="card-header">Liste des disponibilités</div>
                    <div class="card-body">

                        <table class="table table-striped table-condensed" id="table">
                            <thead>
                                <tr style="background-color:#2a6496;color: #FFFFFF;">
                                    <th>Specialite</th>
                                    <th>Jour Disponible</th>
                                    <th>Heure Debut</th>
                                    <th>Heure Fin</th>
                                    <th>Titre</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $disponible; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dispo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($dispo->libellespecialite); ?></td>
                                    <td><?php echo e($dispo->jourdispo); ?></td>
                                    <td><?php echo e($dispo->heuredebut); ?></td>
                                    <td><?php echo e($dispo->heurefin); ?></td>
                                    <td><?php echo e($dispo->titremedecin); ?></td>
                                    <td><?php echo e($dispo->nommedecin); ?></td>
                                    <td><?php echo e($dispo->prenommedecin); ?></td>

                                    <td title="Disponibilite">
                                        <form method="POST" action="<?php echo e(route('disponibilite.destroy', [$dispo->iddispo])); ?>">
                                            <?php echo e(method_field('DELETE')); ?>

                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" value="<?php echo e($idmedecin); ?>" name="idmedecin">
                                            <input type="hidden" value="<?php echo e($idstructure); ?>" name="idstructure">
                                            <input type="hidden" value="<?php echo e($nom); ?>" name="nom">
                                            <input type="hidden" value="<?php echo e($prenom); ?>" name="prenom">
                                            <input type="hidden" value="<?php echo e($titre); ?>" name="titre">
                                            <input type="submit" style="border: 0px;background-color:" class="btn btn-primary" value="Choisir">

                                        </form>
                                    </td>

                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>     
        </form>
        <br>
        <div class="card col-sm-8 offset-2">
            <div class="card-header"><b>Liste des Rendez-Vous de <?php echo e($nom); ?> <?php echo e($prenom); ?></b> </div>
            <div class="card-body">

                <table class="table table-striped table-condensed" id="table2">
                    <thead>
                        <tr style="background-color:#2a6496;color: #FFFFFF;">
                            <th>Specialite</th>
                            <th>Titre</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Jour</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $rendezvous; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rdv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($rdv->libellespecialite); ?></td>
                            <td><?php echo e($rdv->titremedecin); ?></td>
                            <td><?php echo e($rdv->nommedecin); ?></td>
                            <td><?php echo e($rdv->prenommedecin); ?></td>
                            <td><?php echo e($rdv->jourdispo); ?></td>
                            
                            <td></td>
                           

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


    </body>
</html>



<?php /**PATH C:\xampp\htdocs\montest6\resources\views/rendezvous/form_disponibilite.blade.php ENDPATH**/ ?>