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
      <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(../../assets/images/big/auth-bg.jpg) no-repeat center center;">
         <div class="auth-box">
            <div id="recoverform">
               <div class="logo">
                  <span class="db"><img src="../../assets/images/logo-icon.png" alt="logo"></span>
                  <h5 class="font-medium m-b-20">Recover Password</h5>
                  <span>Enter your Email and instructions will be sent to you!</span>
               </div>
               <div class="row m-t-20">
                  <!-- Form -->
                  <form class="col-12" action="index.html">
                     <!-- email -->
                     <div class="form-group row">
                        <div class="col-12">
                           <input class="form-control form-control-lg" type="email" required="" placeholder="Username">
                        </div>
                     </div>
                     <!-- pwd -->
                     <div class="row m-t-20">
                        <div class="col-12">
                           <button class="btn btn-block btn-lg btn-danger" type="submit" name="action">Reset</button>
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