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
          <span class="brand-text font-weight-bold text-uppercase">Commonwelth NHS</span>
        </span>
        <div class="sidebar bg-success">
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item"><a href="dashboard" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a></li>
              <li class="nav-item"><a href="announcement" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-bullhorn"></i><p> Announcement</p></a></li>
              <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-info-circle"></i><p> About Us<i class="fas fa-angle-left right"></i></p></a>
                <ul class="nav nav-treeview">
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
              <li class="nav-item"><a href="payment" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-check-square"></i><p> Payment</p></a></li>
              <li class="nav-item"><a href="students" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-users"></i><p> Students<span class="badge badge-info right">
                <?php
                  include("db_connect.php");
                  $count_student = mysqli_query($conn, "SELECT * FROM $student WHERE status='active'");
                  echo mysqli_num_rows($count_student); 
                  mysqli_close($conn);
                ?>
              </span></p></a></li>
              <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold shadow-sm p-3 active"><i class="nav-icon fa fa-cogs"></i><p> Settings<i class="fas fa-angle-left right"></i></p></a>
                <ul class="nav nav-treeview">
                  <li class="nav-item"><a href="grade-level" class="nav-link text-uppercase font-weight-bold shadow-sm p-3 active"><i class="fa fa-bars nav-icon"></i><p> Grade Level</p></a></li>
                  <li class="nav-item"><a href="faculty" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="fa fa-bars nav-icon"></i><p> Faculty</p></a></li>
                  <li class="nav-item"><a href="school-year" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="fa fa-bars nav-icon"></i><p> School Year</p></a></li>
                  <li class="nav-item"><a href="subject" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="fa fa-bars nav-icon"></i><p> Subject</p></a></li>
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
                  <li class="breadcrumb-item">Settings</li>
                  <li class="breadcrumb-item active">Grade Level</li>
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
                    <h5 class="card-title text-uppercase font-weight-bold"><i class="nav-icon fa fa-bars"></i> Grade Level</h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <form class="form col-md-6 h5" method="post" action="">
                        <?php
                          if(isset($_GET['update'])) {
                            include("db_connect.php");
                            $q_glevel = mysqli_query($conn, "SELECT * FROM $gradelevel WHERE glID='".$_GET['update']."'");
                            while($row_level = mysqli_fetch_array($q_glevel)) {
                        ?>
                              <div class="mb-3 row">
                                <label for="glevel" class="col-sm-3 text-end control-label col-form-label">Grade Level : </label>
                                <div class="col-sm-6">
                                  <input type="text" name="glevel" class="form-control h5" id="glevel" value="<?php echo $row_level['level'];?>" required />
                                  <input type="hidden" name="glid" class="form-control h5" id="glevel" value="<?php echo $row_level['glID'];?>" required />
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="glpmt" class="col-sm-3 text-end control-label col-form-label">Tuition : </label>
                                <div class="col-sm-6">
                                  <input type="number" name="glpmt" class="form-control h5" id="glpmt" value="<?php echo $row_level['tuition'];?>" required />
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <button type="submit" name="UpdategLevel" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Update Grade Level</button>
                              </div>
                        <?php
                              mysqli_close($conn);
                            }
                          }
                          else {
                        ?>
                            <div class="mb-3 row">
                              <label for="glevel" class="col-sm-3 text-end control-label col-form-label">Grade Level : </label>
                              <div class="col-sm-6">
                                <input type="text" name="glevel" class="form-control h6" id="glevel" required />
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="glpmt" class="col-sm-3 text-end control-label col-form-label">Tuition : </label>
                              <div class="col-sm-6">
                                <input type="number" name="glpmt" class="form-control h6" id="glpmt" required />
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <button type="submit" name="SubmitgLevel" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Grade Level</button>
                            </div>
                        <?php
                          } 
                        ?>
                      </form>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="table-responsive">
                        <table id="zero_config" class="table table-striped h5">
                          <thead>
                            <tr>
                              <th class="fw-bold">Grade Level</th>
                              <th class="fw-bold">Tuition</th>
                              <th class="fw-bold">Total Section</th>
                              <th class="fw-bold">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              include("db_connect.php");
                              $display_glevel = mysqli_query($conn, "SELECT * FROM $gradelevel ORDER BY level ASC");
                              if(mysqli_num_rows($display_glevel)<1) {
                                echo "<tr>";
                                  echo "<td colspan='2'>No record found.</td>";
                                echo "</tr>";
                              } 
                              else {
                                while($row_glevel = mysqli_fetch_array($display_glevel)) {
                                  echo "<tr>";
                                    echo "<td><a href='section?g_level_id=".$row_glevel['glID']."'>".$row_glevel['level']."</a></td>";
                                    echo "<td>".number_format($row_glevel['tuition'], 2)."</a></td>";
                                    echo "<td>";
                                      $count_section = mysqli_query($conn, "SELECT * FROM $section WHERE glevel='".$row_glevel['glID']."'");
                                      echo mysqli_num_rows($count_section);
                                    echo "</td>";
                                    echo "<td><a href='?update=".$row_glevel['glID']."'><span class='badge bg-success rounded-pill'><i class='fas fa-pencil-alt text-warning p-1'></i> Edit</span></a></td>";
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
      $(document).on('click', '.delete_glevel', function(){
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
                url: 'delete_function.php?action=delete_level',
                type: 'POST',
                  data: 'id='+id,
                  dataType: 'json'
              })
              .done(function(response){
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Success',
                    text: 'Grade Level was successfully deleted',
                    footer: '',
                    showConfirmButton: false,
                    timer: 2000
                  }).then(function() {
                    window.location = 'grade-level';
                });
              fetch();
              })
              .fail(function(){
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    position: 'top-end',
                    title: 'Failed',
                    text: 'Grade Level was not successfully deleted',
                    footer: '',
                    showConfirmButton: false,
                    timer: 2000
                  }).then(function() {
                    window.location = 'grade-level';
                });
              });
            }
     
        })
      });
  </script>
  </body>
</html>
<?php
  include("pmnhs_function.php");
  ManageGradeLevel();
?>
<?php 
  ob_flush();
?>