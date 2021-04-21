<?php $__env->startSection('content'); ?>
<?php $__env->startSection('script'); ?>

<html>
    <head>   

              <!--<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>-->
        <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/datatables.min.js')); ?>"></script>
<!--        <script type="text/javascript" src="<?php echo e(asset('js/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/main.js')); ?>"></script>-->

        <!--<link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">-->
        <link rel="stylesheet" href="<?php echo e(asset('css/datatables.min.css')); ?>">


        <script>
            $(document).ready(function () {
            $('#table').DataTable();
            });
        </script>

    </head> 
    <?php $__env->stopSection(); ?>

    <body>

        <form method="POST" class="was-validated" novalidate role='' action="<?php echo e(route('laboexam.store')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="col-md-10 col-sm-10 col-xs-12 ">
                <div class="x_content">  
                    <div class="x_panel">
                        <div class="x_title"><b>ENREGISTRER EXAMEN </b></div> 
                        <div class="row">
                            <label for="laboratoire" class="offset-sm-1 col-sm-2">Laboratoire </label> 
                            <div class="col-sm-6 col-xs-12"> 
                                <select class="form-control" name="idlabo" required>
                                    <option></option>
                                    <?php $__currentLoopData = $laboratoires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $labo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($labo->idlabo); ?>"><?php echo e($labo->nom); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <small class="invalid-feedback"><?php echo e($errors->first('idlabo',':message')); ?></small> 
                                </select> 
                            </div></div><br>

                        <div class="row">
                            <label for="examen" class="offset-sm-1 col-sm-2">Examen </label> 
                            <div class="col-sm-5 col-xs-12"> 
                                <select class="form-control" name="idexamen" required> 
                                    <option></option>
                                    <?php $__currentLoopData = $examen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($exam->idexamen); ?>"><?php echo e($exam->libelle); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <small class="invalid-feedback"><?php echo e($errors->first('idexamen',':message')); ?></small> 
                                </select> 
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="heuredebut" class="offset-sm-1 col-sm-2 col-xs-12">Heure Debut </label> 
                            <div class="col-sm-4 col-xs-5"> 
                                <input type="time" class="form-control" name="heuredebut" id="heuredebut"  value="" required>
                                <small class="invalid-feedback"><?php echo e($errors->first('heuredebut',':message')); ?></small> 
                            </div> 
                        </div><br>

                        <div class="row">
                            <label for="heurefin" class="offset-sm-1 col-sm-2 col-xs-12">Heure Fin </label> 
                            <div class="col-sm-4 col-xs-5"> 
                                <input type="time" class="form-control" name="heurefin" id="heurefin"  value="" required>
                                <small class="invalid-feedback"><?php echo e($errors->first('heurefin',':message')); ?></small> 
                            </div> 
                        </div><br>

                        <div class="row">
                            <label for="prix" class="offset-sm-1 col-sm-2">Jours de l'examen</label> 
                            <div class="col-sm-7 col-xs-12"> 
                                <input type="text" class="form-control" name="joursexam" id="joursexam"  value="" required>
                                <small class="invalid-feedback"><?php echo e($errors->first('joursexam',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>
                        <div class="row">
                            <label for="prix" class="offset-sm-1 col-sm-2">Prix</label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <input type="text" class="form-control" name="prix" id="prix"  value="" required>
                                <small class="invalid-feedback"><?php echo e($errors->first('prix',':message')); ?></small> 
                            </div> 
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item row">
                            <div style="margin:auto"> 
                                <input type="submit"  value="Ajouter" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px;margin-top: 0px"> 
                                <input type="button"  value="Annuler" onclick="location.href = " class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px; margin-top:0px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="col-md-10 col-sm-10 col-xs-12 ">
            <div class="x_content">  
                <div class="x_panel">
                    <div class="x_title"><b>LISTE DES EXAMENS </b></div> 
                    <div class="table-responsive">
                        <table class="table table-striped table-condensed" id="table">
                            <thead>
                                <tr style="background-color:#2a6496;color: #FFFFFF;">
                                    <th>Laboratoire</th>
                                    <th>Examen</th>
                                    <th>Heure Debut</th>
                                    <th>Heure Fin</th>
                                    <th>Prix</th>
                                    <th>Action</th> 
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $laboexam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $labex): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($labex->nomlabo); ?></td>
                                    <td><?php echo e($labex->libelleexamen); ?></td>
                                    <td><?php echo e($labex->laboouverture); ?></td>
                                    <td><?php echo e($labex->labofermeture); ?></td>
                                    <td><?php echo e($labex->prix); ?></td>
                                    <td title="Retirer">
                                        <form method="POST" action="<?php echo e(route('laboexam.destroy', [$labex->idlaboexam])); ?>">
                                            <?php echo e(method_field('DELETE')); ?>

                                            <?php echo e(csrf_field()); ?>

                                            <a ></a>
                                            <button style="border: 0px;background-color:" class="invalid-feedback" type="submit" onclick="return confirm('Confirmer la Suppression')"><i class="glyphicon glyphicon-remove"></i></button> 
                                            <input type="hidden" value="<?php echo e($labex->idlabo); ?>" name="idlabo">
                                            <input type="hidden" value="<?php echo e($labex->idexamen); ?>" name="idexamen"> 
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
<?php echo $__env->make('gentelella-master2.production.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\montest6\resources\views/laboexam/liste.blade.php ENDPATH**/ ?>