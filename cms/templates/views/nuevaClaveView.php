<?php require_once(INCLUDES . "head.php"); ?>

<body>

   <div class="main-wrapper">
      <!-- ============================================================== -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- ============================================================== -->
      <div class="preloader" style="display: none;">
         <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
         </div>
      </div>
      <!-- ============================================================== -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Login box.scss -->
      <!-- ============================================================== -->
      <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(<?= IMAGES . 'Ingresoa.jpg' ?>) no-repeat center center;">
         <div class="auth-box">
            <div id="recoverform">
               <div class="logo">
                  <span class="db"><img src="<?= IMAGES . 'logo_color.png' ?>" alt="logo"></span>
                  <h5 class="font-medium m-b-20">Cambio de clave</h5>
                  <span>Ingrese la nueva clave que utilizar&aacute;</span>
               </div>
               <div class="row m-t-20">
                  <!-- Form -->
                  <form class="col-12" action="<?= URL . 'login/nueva_clave' ?>" method="post">
                     <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']['token'] ?>">
                     <input type="hidden" name="admin-id" value="<?= $data['id'] ?>">
                     <div class="form-group row">
                        <div class="col-12">
                           <input class="form-control form-control-lg" type="password" name="nueva-clave" required placeholder="Nueva Clave">
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-12">
                           <input class="form-control form-control-lg" type="password" name="confirmacion-clave" required placeholder="Confirme Clave">
                        </div>
                     </div>
                     <div class="row m-t-20">
                        <div class="col-12">
                           <button class="btn btn-block btn-lg btn-primary" type="submit" name="action">Enviar</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- ============================================================== -->
      <!-- Login box.scss -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper scss in scafholding.scss -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper scss in scafholding.scss -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Right Sidebar -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Right Sidebar -->
      <!-- ============================================================== -->
   </div>

   <?php require_once(INCLUDES . "scripts.php"); ?>

</body>

</html>