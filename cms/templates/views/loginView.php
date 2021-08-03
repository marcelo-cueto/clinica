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
            <div id="loginform">
               <div class="logo">
                  <div class="db"><img src="<?= IMAGES . 'logo_color.png' ?>" alt="logo"></div>
                  <h5 class="font-medium m-b-20">Inicio de sesi&oacute;n</h5>
               </div>
               <!-- Form -->
               <div class="row">
                  <div class="col-12">
                     <form class="form-horizontal m-t-20" id="loginform" action="<?= URL . 'login/login' ?>" method="post">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']['token'] ?>">
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                           </div>
                           <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                           </div>
                           <input type="text" class="form-control form-control-lg" name="clave" placeholder="Clave" aria-label="Password" aria-describedby="basic-addon1">
                        </div>
                        <div class="form-group row">
                           <div class="col-md-12">
                              <div class="custom-control custom-checkbox d-flex align-items-center">
                                 <a href="<?= URL . 'login/olvide_clave' ?>" id="to-recover" class="text-dark ml-auto"><i class="fa fa-lock m-r-5"></i>Olvid&eacute; mi clave</a>
                              </div>
                           </div>
                        </div>
                        <div class="form-group text-center">
                           <div class="col-xs-12 p-b-20">
                              <button class="btn btn-block btn-lg btn-info" type="submit">Ingresar</button>
                           </div>
                        </div>
                        <div class="form-group text-center">
                           <div class="col-xs-12">
                              <?= Alert::catch_msg(); ?>
                           </div>
                        </div>
                     </form>
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