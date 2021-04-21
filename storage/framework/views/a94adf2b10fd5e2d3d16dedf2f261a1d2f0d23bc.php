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

    <?php if(isset($message)): ?>
    <div class="col-sm-6" style="margin-left: 250px">
        <div class="alert alert-danger" >
            <label style="margin-left: 30px"> <?php echo e($message); ?></label>
        </div>
    </div>
    <?php endif; ?>
    <label class="control-label offset-4"><b> <?php echo e($nom); ?> &nbsp <?php echo e($prenom); ?> </b></label>
    <br>


    <form method="POST" action="<?php echo e(route('test.store')); ?>">
        <?php echo e(csrf_field()); ?>

        <div class="col-md-7 col-sm-12 col-xs-12 ">
            <div class="col-sm-9" style="background-color: blue;border-radius:30px">
                <b><h2><label class="offset-1" style="font-family:  sans-serif;color: white;"><i>Etape 1: Renseigner le jour du test</i></label></h2></b>
            </div>
            <div class="x_content">  
                <div class="x_panel">
                    <div class="x_title"><b>PROGRAMMER UN TEST </b></div> 

                    <div class="row">
                        <label for="jour" class="col-sm-3">Jour du test </label> 
                        <div class="col-sm-7 col-xs-12"> 
                            <input type="date" class="form-control" name="jour" id="jour"  value="">
                            <small class="text-danger"><?php echo e($errors->first('jour',':message')); ?></small> 
                        </div> 
                    </div>

                </div>

            </div>
        </div>
        <div class="col-md-10 col-sm-10 col-xs-12">
            <br>
            <div class="col-sm-7" style="background-color: blue;border-radius:30px">
                <b><h2><label class="offset-1" style="font-family:  sans-serif;color: white;"><i>Etape 2: Choisir le Laboratoire</i></label></h2></b>
            </div>
            
           
            <div class="col-sm-10 col-xs-12" >
            <br>
                <div class="table-responsive">
                    <table class="table table-striped table-condensed" id="table">
                        <thead>
                            <tr style="background-color:#2a6496;color: #FFFFFF;">
                                <th>Structure</th>
                                <th>Examen</th>
                                <th>Heure Debut</th>
                                <th>Heure Fin</th>
                                <th>Jours examen</th>
                                <th>Prix</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>                              
                            <?php $__currentLoopData = $examen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($exam->nomstructure); ?></td>
                                <td><?php echo e($exam->libelleexamen); ?></td>
                                <td><?php echo e($exam->heuredebut); ?></td>
                                <td><?php echo e($exam->heurefin); ?></td>
                                <td><?php echo e($exam->joursexam); ?></td>
                                <td><?php echo e($exam->prix); ?></td>
                                <td title="Ajouter">

                                    <button type="submit" style="border: 0px;background-color:" class="btn btn-primary" value="<?php echo e($idpatient); ?>|<?php echo e($exam->idexamen); ?>|<?php echo e($exam->idlabo); ?>" name="exam">Choisir</button>
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
        </div>
    </form>

    <!--  fin de la liste-->
    <br>

    <div> 


        <div class="col-sm-10 col-xs-12 col-md-10">
            <br>
            <?php if(session('profil')=='Patient'): ?> 
            <div class="" style="">
                <h3 class="titreform">Examens du Patient <?php echo e(session('nom')); ?></h3>
            </div>
            <?php else: ?>
            <div class="" style="">
                <h3 class="titreform">Examens du Patient</h3>
            </div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-striped table-condensed" id="table2">
                    <thead>
                        <tr style="background-color:#2a6496;color: #FFFFFF;">
                            <th>Examen</th>
                            <th>Jour</th>
                            <th>Heure Debut</th>
                            <th>Heure Fin</th>
                            <th>Etat</th>
                            <th>Prix</th>
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
                            <td> <?php if($expat->paye==0): ?>
                                <label class="label" style="color: red;font-size: 12px"><i><b>Non Payé</b></i></label>
                                <?php else: ?>
                                <label class="label" style="color: blue;font-size: 12px"><i><b>Payé</b></i></label>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($expat->prix); ?></td>
                            <td title="Supprimer">
                                <?php if($expat->effectue==0 && $expat->paye==0): ?>
                                <form method="POST" action="<?php echo e(route('test.destroy', [$expat->idtest])); ?>">
                                    <?php echo e(method_field('DELETE')); ?>

                                    <?php echo e(csrf_field()); ?>


                                    <input style="border: 0px;background-color:" class="btn btn-primary" type="submit" value="Retrait" onclick="return confirm('Confirmer la Suppression')">
                                    <input type="hidden" value="<?php echo e($idpatient); ?>" name="idpatient">
                                    <input type="hidden" value="<?php echo e($nom); ?>" name="nom">
                                    <input type="hidden" value="<?php echo e($prenom); ?>" name="prenom">
                                    <input type="hidden" value="<?php echo e($reprogramme); ?>" name="reprogramme">
                                    <input type="hidden" value="<?php echo e($jour); ?>" name="jour">

                                </form>   
                                <form method="GET" action="<?php echo e(route('payerconsult')); ?>">
                                    <input type="submit" style="" type="submit" class="btn btn-warning" value="Payer">
                                    <input type="hidden" value="<?php echo e($expat->prix); ?>" name="prix">
                                    <input type="hidden" value="<?php echo e($expat->idtest); ?>" name="idtest">
                                    <input type="hidden" value="<?php echo e($expat->id); ?>" name="idpatient">
                                    <input type="hidden" value="examen" name="type">
                                </form>
                                <?php else: ?>
                                <?php if($expat->paye==1 && $expat->effectue==0): ?>
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

<?php echo $__env->make('gentelella-master2.production.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\montest6\resources\views/test/frm_rdvfin.blade.php ENDPATH**/ ?>