<?php require_once(INCLUDES . "head.php"); ?>

<body>
   <?php require_once(INCLUDES . "preloader.php"); ?>
   <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
      <?php require_once(INCLUDES . "header.php"); ?>
      <?php require_once(INCLUDES . "sidebar.php"); ?>
      <div class="page-wrapper">
         <?php require_once(INCLUDES . "breadcrumb.php"); ?>
         <!-- Container fluid  -->
         <div class="container-fluid">

            <!-- Start Page Content -->
            <div class="row">
               <div class="col-12">
                  <div class="card">
                     <div class="card-body">
                        <div class="card-title"><?= Alert::catch_msg() ?></div>
                        <div class="table-responsive">
                           <table class="table">
                              <thead>
                                 <tr>
                                    <th scope="col">Nombre del tratamiento</th>
                                    <th scope="col">Descripci&oacute;n</th>
                                    <th scope="col">Acciones</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php if (isset($data['tratamientos'])) {
                                    foreach ($data['tratamientos'] as $t) { ?>
                                       <tr>
                                          <td><?= $t->nombre ?></td>
                                          <td><?= $t->descripcion ?></td>
                                          <td>
                                             <div class="row">
                                                <div class="col col-2"><a href="<?= URL . 'tratamientos/editar/' . $t->id ?>"><i class="mdi mdi-18px mdi-pencil m-r-2 m-l-2"></i></a></div>
                                                <div class="col col-2"><a href="<?= URL . 'tratamientos/eliminar/' . $t->id ?>" class="delete-element" data-toggle="modal" data-target="#exampleModal"><i class="mdi mdi-18px mdi-delete m-r-2 m-l-2"></i></a></div>
                                             </div>
                                          </td>
                                       </tr>
                                 <?php }
                                 } ?>
                              </tbody>
                           </table>
                        </div>
                        <div class="row">
                           <div class="col-sm-4">
                              <a href="<?= URL . 'tratamientos/nuevo_tratamiento' ?>" class="btn btn-primary mr-2"><i class="mdi mdi-18px mdi-plus m-r-2 mr-1"></i>Nuevo tratamiento</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- End Page Content -->

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">??Est&aacute; seguro de eliminar este elemento?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a type="button" class="btn btn-danger modal-confirm">S&iacute;</a>
                     </div>
                  </div>
               </div>
            </div>
            <!-- End Modal -->

         </div>
         <!-- End Container fluid  -->
         <?php require_once(INCLUDES . "footer.php"); ?>
      </div>
   </div>
   <?php require_once(INCLUDES . "scripts.php"); ?>
</body>

</html>