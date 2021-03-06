<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<header class="topbar" data-navbarbg="skin6">
   <nav class="navbar top-navbar navbar-expand-md navbar-light">
      <div class="navbar-header" data-logobg="skin5">
         <!-- This is for the sidebar toggle which is visible on mobile only -->
         <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
            <i class="ti-menu ti-close"></i>
         </a>
         <!-- ============================================================== -->
         <!-- Logo -->
         <!-- ============================================================== -->
         <div class="navbar-brand">
            <a href="index.html" class="logo">
               <!-- Logo icon -->
               <b class="logo-icon">
                  <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                  <!-- Dark Logo icon -->
                  <img src="<?= IMAGES . 'logo.png' ?>" alt="homepage" class="dark-logo" />
                  <!-- Light Logo icon -->
                  <img src="<?= IMAGES . 'logo_blanco.png' ?>" alt="homepage" class="light-logo" />
               </b>
               <!--End Logo icon -->
               <!-- Logo text -->
               <span class="logo-text">
                  <!-- dark Logo text -->
                  <img src="<?= IMAGES . 'texto_logo.png' ?>" alt="homepage" class="dark-logo" />
                  <!-- Light Logo text -->
                  <img src="<?= IMAGES . 'texto_logo_blanco.png' ?>" class="light-logo" alt="homepage" />
               </span>
            </a>
         </div>
         <!-- ============================================================== -->
         <!-- End Logo -->
         <!-- ============================================================== -->
         <!-- ============================================================== -->
         <!-- Toggle which is visible on mobile only -->
         <!-- ============================================================== -->
         <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="ti-more"></i>
         </a>
      </div>
      <!-- ============================================================== -->
      <!-- End Logo -->
      <!-- ============================================================== -->
      <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
         <!-- ============================================================== -->
         <!-- toggle and nav items -->
         <!-- ============================================================== -->
         <ul class="navbar-nav float-left mr-auto">
            <!-- ============================================================== -->
            <!-- Search -->
            <!-- ============================================================== -->
         </ul>
         <!-- ============================================================== -->
         <!-- Right side toggle and nav items -->
         <!-- ============================================================== -->
         <ul class="navbar-nav float-right">
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
               <a class="nav-link nav-item dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span><?= 'Bienvenido ' . $_SESSION['user']['name']; ?></span>
                  <i class="mdi mdi-logout font-20"></i>
               </a>
               <div class="dropdown-menu dropdown-menu-right user-dd animated">
                  <a class="dropdown-item" href="<?= URL . 'login/logout' ?>"><i class="ti-close m-r-5 m-l-5"></i> Cerrar sesi&oacute;n</a>
                  <!--
                  <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My
                     Profile</a>
                  <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My
                     Balance</a>
                  <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i>
                     Inbox</a>
                  -->
               </div>
            </li>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
         </ul>
      </div>
   </nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->