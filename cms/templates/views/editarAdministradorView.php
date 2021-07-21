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
            <form class="form-horizontal form-material" action="<?= URL . 'administradores/insertar' ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?= $data['administrador']->id ?>">   
            <div class="row">

                  <!-- Column -->
                  <div class="col-lg-12 col-xlg-12 col-md-12">
                     <div class="card">
                        <div class="card-body">
                           <div class="form-group">
                              <label for="administrador-nombres" class="col-md-12">Nombres</label>
                              <div class="col-md-12">
                                 <input type="text" class="form-control form-control-line" name="administrador-nombres" id="administrador-nombres" value="<?= $data['administrador']->nombres ?>" required>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="administrador-apellidos" class="col-md-12">Apellidos</label>
                              <div class="col-md-12">
                                 <input type="text" class="form-control form-control-line" name="administrador-apellidos" id="administrador-apellidos" value="<?= $data['administrador']->apellidos ?>" required>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="administrador-email" class="col-md-12">Email</label>
                              <div class="col-md-12">
                                 <input type="email" class="form-control form-control-line" name="administrador-email" id="administrador-email" value="<?= $data['administrador']->email ?>" required>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="administrador-clave" class="col-md-12">Clave</label>
                              <div class="col-md-12">
                                 <input type="password" class="form-control form-control-line" name="administrador-clave" id="administrador-clave" value="<?= $data['administrador']->clave ?>" required>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="administrador-superadmin" class="col-md-12">¿Es Superadmin?</label>
                              <div class="col-md-12">
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="administrador-superadmin" id="administrador-superadmin" <?= $data['administrador']->superadmin == 1 ? 'checked' : '' ?>>
                                    <label class="custom-control-label" for="administrador-superadmin">Sí</label>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-12">
                                 <button class="btn btn-primary mt-2">Guardar</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Column -->

               </div>
            </form>
            <!-- End Page Content -->

            <!-- Right sidebar -->
            <!-- End Right sidebar -->

            <div><?= Alert::catch_msg() ?></div>
         </div>
         <!-- End Container fluid  -->

         <?php require_once(INCLUDES . "footer.php"); ?>
      </div>
   </div>
   <?php require_once(INCLUDES . "scripts.php"); ?>
</body>

</html>