<?php $__env->startSection('content'); ?>
<?php $__env->startSection('script'); ?>

<html>
    <head>   

        <!--<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>-->
        <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/datatables.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/main.js')); ?>"></script>

        <!--<link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">-->
        <link rel="stylesheet" href="<?php echo e(asset('css/datatables.min.css')); ?>">

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
    <?php $__env->stopSection(); ?>

    <label class="control-label offset-4"><b> <?php echo e($nom); ?> &nbsp <?php echo e($prenom); ?> </b></label>
    <br>

    <div class="row col-sm-12">

        <form method="POST" action="<?php echo e(route('test.store')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="col-md-4 col-sm-4 ">
                <div class="x_content">  
                    <div class="x_panel">
                        <div class="x_title"><b>PROGRAMMER UN TEST </b></div> 
                        <div class="row">
                            <label for="reprogramme" class="col-sm-4 offset-sm-1">Reprogramme</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="reprogramme"> 
                                    <option value="true" >Oui</option>                            
                                    <option value="false" selected="selected">Non</option>                             
                                    <small class="text-danger"><?php echo e($errors->first('reprogramme',':message')); ?></small> 
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="jour" class="col-sm-4 offset-2">Jour </label> 
                            <div class="col-sm-6"> 
                                <input type="date" class="form-control" name="jour" id="jour"  value="">
                                <small class="text-danger"><?php echo e($errors->first('jour',':message')); ?></small> 
                            </div> 
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-md-8 col-sm-8">
                <div class="" style="">
                    <h3 class="titreform">Liste des Examens</h3>

                </div>


                <div class="ligneform " style="background-color: #EEE">
                    <table class="table table-striped table-condensed" id="table">
                        <thead>
                            <tr style="background-color:#2a6496;color: #FFFFFF;">
                                <th>Structure</th>
                                <th>Examen</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>                              
                            <?php $__currentLoopData = $examen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($exam->nomstructure); ?></td>
                                <td><?php echo e($exam->libelleexamen); ?></td>
                                <td title="Ajouter">

                                    <button type="submit" style="border: 0px;background-color:" class="btn btn-primary" value="<?php echo e($idpatient); ?>|<?php echo e($exam->idexamen); ?>|<?php echo e($exam->idlabo); ?>" name="exam">Ajouter</button>
                                    <input type="hidden" value="<?php echo e($nom); ?>" name="nom">
                                    <input type="hidden" value="<?php echo e($prenom); ?>" name="prenom">



                                </td>
                                </form> 

                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
                        </tbody>
                    </table>
                </div>
            </div>
        </form>

        <!--  fin de la liste-->
        <br>
        <div class="card col-sm-9">
            <div> 
                <?php if(session('profil')=='Patient'): ?> 
                <div class="" style="">
                    <h3 class="titreform">Examens du Patient <?php echo e(session('nom')); ?></h3>
                </div>
                <?php else: ?>
                <div class="" style="">
                    <h3 class="titreform">Examens du Patient</h3>
                </div>
                <?php endif; ?>
                <div class=" ligneform " style="background-color: #EEE">
                    <table class="table table-striped table-condensed" id="table2">
                        <thead>
                            <tr style="background-color:#2a6496;color: #FFFFFF;">
                                <th>Examen</th>
                                <th>Jour</th>
                                <th>Heure Debut</th>
                                <th>Heure Fin</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $exampat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($expat->libellexamen); ?></td>
                                <td><?php echo e($expat->jourtest); ?></td>
                                <td><?php echo e($expat->heuredebut); ?></td>
                                <td><?php echo e($expat->heurefin); ?></td>
                                <td title="Supprimer">
                                    <form method="POST" action="<?php echo e(route('test.destroy', [$expat->idtest])); ?>">
                                        <?php echo e(method_field('DELETE')); ?>

                                        <?php echo e(csrf_field()); ?>

                                        <a ></a>
                                        <button style="border: 0px;background-color:" class="text-danger" type="submit" onclick="return confirm('Confirmer la Suppression')"><i class="glyphicon glyphicon-remove"></i></button>
                                        <input type="hidden" value="<?php echo e($idpatient); ?>" name="idpatient">
                                        <input type="hidden" value="<?php echo e($nom); ?>" name="nom">
                                        <input type="hidden" value="<?php echo e($prenom); ?>" name="prenom">
                                        <input type="hidden" value="<?php echo e($reprogramme); ?>" name="reprogramme">
                                        <input type="hidden" value="<?php echo e($jour); ?>" name="jour">

                                    </form>   
                                    <input type="submit" style="" type="submit" class="btn btn-warning" value="Confirmer">
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    

                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
    </div>

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

<?php echo $__env->make('gentelella-master2.production.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\montest6\resources\views/test/liste2.blade.php ENDPATH**/ ?>