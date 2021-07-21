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
            <form class="form-horizontal form-material" action="<?= URL . 'equipos/reemplazar' ?>" method="post" enctype="multipart/form-data">
               <input type="hidden" name="equipo-id" value="<?= $data['equipo']->id ?>">
               <div class="row">
                  <!-- Column -->
                  <div class="col-lg-4 col-xlg-3 col-md-5">
                     <div class="card">
                        <div class="card-body">
                           <center class="m-t-30">
                              <img src="<?= isset($data['equipo']->foto) ? IMAGES . 'equipos/' . $data['equipo']->foto : IMAGES . 'equipos/default_img.jpg' ?>" class="rounded-circle img-preview" width="150">
                              <h4 class="card-title m-t-10">Imagen Equipo</h4>
                              <h6 class="card-subtitle">Formatos: jpg, png, bmp</h6>
                              <h6 class="card-subtitle">Tama&ntilde;o maximo: 3,5 mb</h6>
                              <div class="row text-center justify-content-md-center mt-2">
                                 <div class="form-group">
                                    <div class="col-md-12">
                                       <input type="file" class="form-control img-input" name="equipo-img" id="equipo-img">
                                    </div>
                                 </div>
                              </div>
                           </center>
                        </div>
                     </div>
                  </div>
                  <!-- Column -->
                  <!-- Column -->
                  <div class="col-lg-8 col-xlg-9 col-md-7">
                     <div class="card">
                        <div class="card-body">
                           <div class="form-group">
                              <label for="equipo-nombre" class="col-md-12">Nombre del equipo</label>
                              <div class="col-md-12">
                                 <input type="text" class="form-control form-control-line" name="equipo-nombre" id="equipo-nombre" value="<?= $data['equipo']->nombre ?>" required>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="equipo-funcionalidad" class="col-md-12">Nombre de la funcionalidad</label>
                              <div class="col-md-12">
                                 <input type="text" class="form-control form-control-line" name="equipo-funcionalidad" id="equipo-funcionalidad" value="<?= $data['equipo']->funcionalidad ?>" required>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="equipo-descripcion" class="col-md-12">Descripci&oacute;n</label>
                              <div class="col-md-12">
                                 <textarea rows="5" class="form-control form-control-line" name="equipo-descripcion" id="equipo-descripcion"><?= $data['equipo']->descripcion ?></textarea>
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