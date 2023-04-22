<?php ob_start();?>
<?php include("auth.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Commonwealth National High School</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" href="dist/css/font_awsome.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
  </head>
  <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
      <?php include("nav.php");?>
      <aside class="main-sidebar sidebar-dark-warning elevation-4">
        <span class="brand-link bg-danger">
          <img src="img/logo.png" alt="CNHS Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-bold">Commonwealth NHS</span>
        </span>
        <div class="sidebar bg-success">
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item"><a href="dashboard" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a></li>
              <li class="nav-item"><a href="announcement" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-bullhorn"></i><p> Announcement</p></a></li>
              <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-info-circle"></i><p> About Us<i class="fas fa-angle-left right"></i></p></a>
                <ul class="nav nav-treeview">
                  <li class="nav-item"><a href="events" class="nav-link text-uppercase font-weight-bold shadow-sm"><i class="fa fa-volume-off nav-icon fs-8"></i><p> Events</p></a></li>
                  <li class="nav-item"><a href="history" class="nav-link text-uppercase font-weight-bold shadow-sm"><i class="fa fa-history nav-icon fs-8"></i><p> History</p></a></li>
                  <li class="nav-item"><a href="mission" class="nav-link text-uppercase font-weight-bold shadow-sm"><i class="fa fa-binoculars nav-icon"></i><p> Mission</p></a></li>
                  <li class="nav-item"><a href="vision" class="nav-link text-uppercase font-weight-bold shadow-sm"><i class="fa fa-eye nav-icon fa-2x"></i><p> Vision</p></a></li>
                </ul>
              </li>
              <li class="nav-item"><a href="enrollment" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-user-plus"></i><p> Enrollment <span class="badge badge-info right">
                <?php
                  include("db_connect.php");
                  $count_enrollment = mysqli_query($conn, "SELECT * FROM $student WHERE status='pending'");
                  echo mysqli_num_rows($count_enrollment); 
                  mysqli_close($conn);
                ?>
              </span></p></a></li>
              <li class="nav-item"><a href="schedule" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-calendar"></i><p> Schedule</p></a></li>
              <li class="nav-item"><a href="monitoring" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-hourglass"></i><p> Monitoring</i></p></a></li>
              <li class="nav-item"><a href="students" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-users"></i><p> Students<span class="badge badge-info right">
                <?php
                  include("db_connect.php");
                  $count_student = mysqli_query($conn, "SELECT * FROM $student WHERE status='active'");
                  echo mysqli_num_rows($count_student); 
                  mysqli_close($conn);
                ?>
              </span></p></a></li>
              <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-cogs"></i><p> Settings<i class="fas fa-angle-left right"></i></p></a>
                <ul class="nav nav-treeview">
                  <li class="nav-item"><a href="school-year" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="fa fa-bars nav-icon"></i><p> School Year</p></a></li>
                  <li class="nav-item"><a href="faculty" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="fa fa-bars nav-icon"></i><p> Faculty</p></a></li>
                  <li class="nav-item"><a href="grade-level" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="fa fa-bars nav-icon"></i><p> Grade Level</p></a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </aside>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <ol class="breadcrumb text-uppercase">
                  <li class="breadcrumb-item">Registrar</li>
                </ol>
              </div><!-- /.col -->
              <div class="col-sm-6">&nbsp;</div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card bg-white">
                  <div class="card-header">
                    <h5 class="card-title text-uppercase font-weight-bold"><i class="nav-icon fa fa-bars"></i> Registrar List</h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <a href='#' data-toggle="modal" data-target="#addNewRegistrar" class="mb-2 text-uppercase"><span class='badge bg-info rounded p-2'><i class="fas fa-user-plus"></i> Add New Registar</span></a>
                      <div class="table-responsive">
                        <table id="zero_config" class="table table-striped h6">
                          <thead>
                            <tr>
                              <th class="fw-bold">First Name</th>
                              <th class="fw-bold">Last Name</th>
                              <th class="fw-bold">Title</th>
                              <th class="fw-bold">Education</th>
                              <th class="fw-bold">Office/School</th>
                              <th class="fw-bold">Address</th>
                              <th class="fw-bold">Contact #</th>
                              <th class="fw-bold">Status</th>
                              <th class="fw-bold">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              include("db_connect.php");
                              $display_registrar = mysqli_query($conn, "SELECT * FROM $registrar ORDER BY fname ASC");
                              if(mysqli_num_rows($display_registrar)<1) {
                                echo "<tr>";
                                  echo "<td colspan='8'>No record found.</td>";
                                echo "</tr>";
                              } 
                              else {
                                while($row_registrar = mysqli_fetch_array($display_registrar)) {
                                  echo "<tr>";
                                    echo "<td><span id='fnamer".$row_registrar['regID']."'>".ucfirst($row_registrar['fname'])."</span></td>";
                                    echo "<td><span id='lnamer".$row_registrar['regID']."'>".ucfirst($row_registrar['lname'])."</span></td>";
                                    echo "<td><span id='titler".$row_registrar['regID']."'>".ucfirst($row_registrar['title'])."</span></td>";
                                    echo "<td><span id='educr".$row_registrar['regID']."'>".ucfirst($row_registrar['educ'])."</span></td>";
                                    echo "<td><span id='ofcr".$row_registrar['regID']."'>".ucfirst($row_registrar['ofc'])."</span></td>";
                                    echo "<td><span id='addrr".$row_registrar['regID']."'>".ucfirst($row_registrar['addr'])."</span></td>";
                                    echo "<td><span id='conr".$row_registrar['regID']."'>".ucfirst($row_registrar['con'])."</span></td>";
                                    echo "<td><span id='emailr".$row_registrar['regID']."'>".ucfirst($row_registrar['email'])."</span></td>";
                                    echo "<td>";
                                      if($row_registrar['status']=="active") {
                                        echo "<button type='button' class='btn btn-success rounded-pill btn-xs editregstrar text-white' value='".$row_registrar['regID']."'><i class='fas fa-pencil-alt text-dark p-1'></i> Edit</button> <a href='?deactivate_registrar=".$row_registrar['regID']."'><span class='badge bg-danger rounded-pill'><i class='fas fa-times text-dark p-1'></i> Deactivate</span></a>";
                                      }
                                      else if($row_registrar['status']=="inactive") {
                                        echo "<button type='button' class='btn btn-success rounded-pill btn-xs editregstrar text-white' value='".$row_registrar['regID']."'><i class='fas fa-pencil-alt text-dark p-1'></i> Edit</button> <a href='?activate_registrar=".$row_registrar['regID']."'><span class='badge bg-primary rounded-pill'><i class='fas fa-check text-dark p-1'></i> Activate</span></a>";
                                      }
                                    echo "</td>";
                                  echo "</tr>";
                                }
                              }
                              mysqli_close($conn);
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><!--/. container-fluid -->
        </section>
      </div>
      <?php include ("faculty_modal.php"); ?>
      <aside class="control-sidebar control-sidebar-dark"></aside>
      <footer class="main-footer">
        <div class="float-right d-none d-sm-inline-block">
          Copyright &copy; 2021-<?php date_default_timezone_set("Asia/Manila");echo date("Y");?> Commonwealth National High School.
        All rights reserved.
        </div>
      </footer>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="dist/js/adminlte.js"></script>
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <script src="plugins/chart.js/Chart.min.js"></script>
    <script src="dist/js/pages/dashboard2.js"></script>
    <script>
      $(document).on('click', '.delete_faculty', function(){
        var id = $(this).data('id');
     
        swal.fire({
            title: 'Are you sure you want to delete?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.value){
              $.ajax({
                url: 'delete_function.php?action=delete_faculty',
                type: 'POST',
                  data: 'id='+id,
                  dataType: 'json'
              })
              .done(function(response){
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Success',
                    text: 'Faculty was successfully deleted',
                    footer: '',
                    showConfirmButton: false,
                    timer: 2000
                  }).then(function() {
                    window.location = 'faculty';
                });
              fetch();
              })
              .fail(function(){
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    position: 'top-end',
                    title: 'Failed',
                    text: 'Faculty was not successfully deleted',
                    footer: '',
                    showConfirmButton: false,
                    timer: 2000
                  }).then(function() {
                    window.location = 'faculty';
                });
              });
            }
     
        })
     
      });
  </script>
  <script>
      $(document).ready(function () {
        $('#addRegistrar').click(function (e) {
          e.preventDefault();
          var fname = $('#rfname').val();
          var lname = $('#rlname').val();
          var title = $('#rtitle').val();
          var educ = $('#reduc').val();
          var ofc = $('#rofc').val();
          var email = $('#remail').val();
          var con = $('#rcon').val();
          var addr = $('#raddr').val();
          $.ajax
            ({
              type: "POST",
              url: "add_registrar.php",
              data: { "fname": fname, "lname": lname, "title": title, "educ": educ, "ofc": ofc, "email": email, "con": con, "addr": addr },
              success: function (data) {
                $('.result').html(data);
                $('#registrarform')[0].reset();
              }
            });
        });
      });
    </script>
    <script>
      $(document).ready(function(){
        $(document).on('click', '.editregstrar', function(){
          var id=$(this).val();
          var fname=$('#fnamer'+id).text();
          var lname=$('#lnamer'+id).text();
          var title=$('#titler'+id).text();
          var educ=$('#educr'+id).text();
          var ofc=$('#ofcr'+id).text();
          var email=$('#emailr'+id).text();
          var addr=$('#addrr'+id).text();
          var con=$('#conr'+id).text();
          
          $('#editRegistrar').modal('show');
          $('#refname').val(fname);
          $('#relname').val(lname);
          $('#retitle').val(title);
          $('#reeduc').val(educ);
          $('#reofc').val(ofc);
          $('#reemail').val(email);
          $('#recon').val(con);
          $('#readdr').val(addr);
          $('#reid').val(id);
        });
      });
    </script>
  </body>
</html>
<?php
  include("pmnhs_function.php");
  ManageRegistrar();
?>
<?php 
  ob_flush();
?>