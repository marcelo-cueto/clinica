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
            <form class="form-horizontal form-material" action="<?= URL . 'profesionales/reemplazar' ?>" method="post" enctype="multipart/form-data">
               <input type="hidden" name="profesional-id" value="<?= $data['profesional']->id ?>">
               <div class="row">
                  <!-- Column -->
                  <div class="col-lg-4 col-xlg-3 col-md-5">
                     <div class="card">
                        <div class="card-body">
                           <center class="m-t-30">
                              <img src="<?= isset($data['profesional']->foto) ? IMAGES . 'profesionales/' . $data['profesional']->foto : IMAGES . 'profesionales/default_prof.jpg' ?>" class="rounded-circle img-preview" id="preview" width="150">
                              <div class="row text-center justify-content-md-center mt-2">
                                 <div class="form-group">
                                    <label class="col-md-12">Foto</label>
                                    <div class="col-md-12">
                                       <input type="file" class="form-control img-input" name="profesional-foto" id="profesional-foto">
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
                              <label for="profesional-nombres" class="col-md-12">Nombres</label>
                              <div class="col-md-12">
                                 <input type="text" class="form-control form-control-line" name="profesional-nombres" id="profesional-nombres" value="<?= $data['profesional']->nombres ?>" required>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="profesional-apellidos" class="col-md-12">Apellidos</label>
                              <div class="col-md-12">
                                 <input type="text" class="form-control form-control-line" name="profesional-apellidos" id="profesional-apellidos" value="<?= $data['profesional']->apellidos ?>" required>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-md-4">
                                 <label for="profesional-dni" class="col-md-12">DNI</label>
                                 <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="profesional-dni" id="profesional-dni" value="<?= $data['profesional']->dni ?>">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <label for="profesional-grado" class="col-md-12">Grado Academico</label>
                                 <div class="col-md-12">
                                    <input type="text" placeholder="Ej. Dr. / Klgo. / Lic." class="form-control form-control-line" name="profesional-grado" id="profesional-grado" value="<?= $data['profesional']->grado_academico ?>">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <label class="col-md-12" for="profesional-director">¿Es director?</label>
                                 <div class="custom-control custom-checkbox ml-2 mt-1">
                                    <input type="checkbox" class="custom-control-input" name="profesional-director" id="profesional-director" <?php if ($data['profesional']->director == 1) echo 'checked' ?>>
                                    <label class="custom-control-label" for="profesional-director">Sí</label>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="especialidades" class="col-md-12">Especialidades</label>
                              <div class="col-md-12">
                                 <select id="especialidades" name="especialidades[]" class="select2 form-control" multiple="multiple">
                                    <?php foreach ($data['especialidades'] as $e) { ?>
                                       <option value="<?= $e->id ?>" <?php foreach ($data['esp_prof'] as $ep) if ($ep->especialidad_id == $e->id) echo 'selected' ?>><?= $e->nombre ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <a href="<?= URL . 'profesionales/eliminar_especialidades/' . $data['profesional']->id ?>" class="btn btn-sm btn-danger delete-element" data-toggle="modal" data-target="#exampleModal">
                                    Eliminar especialidades
                                 </a>
                              </div>
                           </div>
                           <div class="form-group" id="grupo-cargos">
                              <label for="nombres" class="col-md-12">T&iacute;tulos o cargos que desempe&ntilde;a</label>
                              <div class="col-md-12">
                                 <?php foreach ($data['cargos'] as $c) { ?>
                                    <input type="text" class="form-control form-control-line mt-2" value="<?= $c->nombre ?>" disabled>
                                 <?php } ?>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-12 row">
                                 <div class="col-sm-4 col-md-3">
                                    <button class="btn btn-sm btn-secondary" id="tit-agregar">Agregar otro cargo/t&iacute;tulo</button>
                                 </div>
                                 <div class="col-sm-4 col-md-3">
                                    <a href="<?= URL . 'profesionales/eliminar_cargos/' . $data['profesional']->id ?>" class="btn btn-sm btn-danger ml-3 delete-element" data-toggle="modal" data-target="#exampleModal">Eliminar cargos/t&iacute;tulos</a>
                                 </div>
                              </div>

                           </div>
                           <div class="form-group">
                              <div class="col-sm-12">
                                 <button class="btn btn-primary mt-3">Guardar</button>
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

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Est&aacute; seguro de eliminar todos estos elementos?</h5>
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