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
    <script src="dist/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            plugins: 'paste',
            toolbar: "styleselect fontselect fontsizeselect | forecolor backcolor",
            plugins: "textcolor"
        });
    </script>
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
              <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold shadow-sm p-3 active"><i class="nav-icon fa fa-info-circle"></i><p> About Us<i class="fas fa-angle-left right"></i></p></a>
                <ul class="nav nav-treeview">
                  <li class="nav-item"><a href="events" class="nav-link text-uppercase font-weight-bold shadow-sm active"><i class="fa fa-volume-off nav-icon fs-8"></i><p> Events</p></a></li>
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
                  <li class="breadcrumb-item">Events</li>
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
                    <h5 class="card-title text-uppercase font-weight-bold"><i class="nav-icon fa fa-volume-off"></i> New Event</h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <form class="form col-md-12 h6" method="post" action="" enctype="multipart/form-data">
                        <?php
                          if(isset($_GET['update'])) {
                            include("db_connect.php");
                            $q_about = mysqli_query($conn, "SELECT * FROM $about WHERE abID='".$_GET['update']."'");
                            while($row_about = mysqli_fetch_array($q_about)) {
                        ?>
                              <div class="mb-3 row">
                                <label for="adate" class="col-sm-2 text-end control-label col-form-label">Date : </label>
                                <div class="col-sm-3">
                                  <input type="date" name="adate" class="form-control h6" id="adate" required value="<?php echo $row_about['abtdate'];?>" />
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="details" class="col-sm-3 text-end control-label col-form-label">Details : </label>
                                <div class="col-lg-12">
                                  <textarea name="details" id="details" cols="300" rows="15" class="form-control" style="resize: none;"><?php echo $row_about['details'];?></textarea>
                                  <input type="hidden" name="abid" class="form-control h6" id="abid" required value="<?php echo $row_about['abID'];?>" />
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <button type="submit" name="UpdateAnnounce" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Update Announcement</button>
                              </div>
                        <?php
                              mysqli_close($conn);
                            }
                          }
                          else {
                        ?>
                            <div class="mb-3 row">
                              <label for="title" class="col-sm-2 text-end control-label col-form-label">Title : </label>
                              <div class="col-sm-3">
                                <input type="text" name="title" class="form-control h6" id="title" required />
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="adate" class="col-sm-2 text-end control-label col-form-label">Date : </label>
                              <div class="col-sm-3">
                                <input type="date" name="adate" class="form-control h6" id="adate" required />
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="details" class="col-sm-3 text-end control-label col-form-label">Details : </label>
                              <div class="col-lg-12">
                                <textarea name="details" id="details" cols="300" rows="15" class="form-control" style="resize: none;"></textarea>
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="photo" class="col-sm-2 text-end control-label col-form-label">Photo : </label>
                              <div class="col-sm-3">
                                <input type="file" name="photo" class="form-control h6" id="photo" required />
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <button type="submit" name="SubmitEvent" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Event</button>
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
                        <table id="zero_config" class="table table-striped h6">
                          <thead>
                            <tr>
                              <th class="fw-bold">Date</th>
                              <th class="fw-bold">Details</th>
                              <th class="fw-bold">Status</th>
                              <th class="fw-bold">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              include("db_connect.php");
                              date_default_timezone_set("Asia/Manila");
                              $display_announce = mysqli_query($conn, "SELECT * FROM $about WHERE type='event'");
                              if(mysqli_num_rows($display_announce)<1) {
                                echo "<tr>";
                                  echo "<td colspan='4'>No record found.</td>";
                                echo "</tr>";
                              } 
                              else {
                                while($row_announce = mysqli_fetch_array($display_announce)) {
                                  echo "<tr>";
                                    echo "<td>".date("m/d/Y", $row_announce['abtdate'])."</td>";
                                    echo "<td>".$row_announce['details']."</a></td>";
                                    echo "<td>".ucfirst($row_announce['status'])."</td>";
                                    echo "<td><a href='?update=".$row_announce['abID']."'><span class='badge bg-success rounded-pill'><i class='fas fa-pencil-alt text-dark p-1'></i> Edit</span></a> <a href='?delete_event=".$row_announce['abID']."'><span class='badge bg-danger rounded-pill'><i class='fas fa-trash text-dark p-1'></i> Delete</span></a></td>";
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
  ManageEvent();
?>
<?php 
  ob_flush();
?>