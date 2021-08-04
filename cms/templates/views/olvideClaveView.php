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
                  <h5 class="font-medium m-b-20">Olvid&eacute; mi clave</h5>
                  <span>Ingrese su email para recibir una clave provisoria</span>
               </div>
               <div class="row m-t-20">
                  <!-- Form -->
                  <form class="col-12" action="<?= URL . 'login/enviar_provisoria' ?>" method="post">
                     <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']['token'] ?>">
                     <!-- email -->
                     <div class="form-group row">
                        <div class="col-12">
                           <input class="form-control form-control-lg" type="email" name="email" required placeholder="Email">
                        </div>
                     </div>
                     <div class="row m-t-20">
                        <div class="col-12">
                           <button class="btn btn-block btn-lg btn-primary" type="submit" name="action">Enviar</button>
                        </div>
                     </div>
                  </form>
                  <div class="col-12">
                     <div class="row m-t-20">
                        <div class="col-12">
                           <?= Alert::catch_msg(); ?>
                        </div>
                     </div>
                  </div>
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