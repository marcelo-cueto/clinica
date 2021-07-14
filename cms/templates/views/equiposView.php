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
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Funcionalidad</th>
                                    <th scope="col">Descripci&oacute;n</th>
                                    <th scope="col">Acciones</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php if (isset($data['equipos'])) {
                                    foreach ($data['equipos'] as $e) { ?>
                                       <tr>
                                          <td><?= $e->nombre ?></td>
                                          <td><?= $e->funcionalidad ?></td>
                                          <td><?= $e->descripcion ?></td>
                                          <td>
                                             <div class="row">
                                                <div class="col col-2"><a href="<?= URL . 'equipos/editar/' . $e->id ?>"><i class="mdi mdi-18px mdi-pencil m-r-2 m-l-2"></i></a></div>
                                                <div class="col col-2"><a href="<?= URL . 'equipos/eliminar/' . $e->id ?>"><i class="mdi mdi-18px mdi-delete m-r-2 m-l-2"></i></a></div>
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
                              <a href="<?= URL . 'equipos/nuevo_equipo' ?>" class="btn btn-success mr-2"><i class="mdi mdi-18px mdi-plus m-r-2 mr-1"></i>Nuevo equipo</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- End Page Content -->

            <!-- Right sidebar -->
            <!-- End Right sidebar -->

         </div>
         <!-- End Container fluid  -->
         <?php require_once(INCLUDES . "footer.php"); ?>
      </div>
   </div>
   <?php require_once(INCLUDES . "scripts.php"); ?>
</body>

</html>