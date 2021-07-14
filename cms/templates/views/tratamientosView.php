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
                        <!--
                        <h4 class="card-title">Default Table</h4>
                        <h6 class="card-subtitle">Using the most basic table markup, here’s how <code>.table</code>-based tables look in Bootstrap. All table styles are inherited in Bootstrap 4, meaning any nested tables will be styled in the same manner as the parent.</h6>
                        -->
                        <div class="table-responsive">
                           <table class="table">
                              <thead>
                                 <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                    <th scope="col">Acci&oacute;n</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td><div class="row">
                                       <div class="col col-2"><a href=""><i class="mdi mdi-18px mdi-pencil m-r-2 m-l-2"></i></a></div>
                                       <div class="col col-2"><a href=""><i class="mdi mdi-18px mdi-delete m-r-2 m-l-2"></i></a></div>
                                    </div>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                        <div class="row">
                           <div class="col-sm-4">
                              <button class="btn btn-success mr-2"><i class="mdi mdi-18px mdi-plus m-r-2 mr-1"></i>Nuevo profesional</button>
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