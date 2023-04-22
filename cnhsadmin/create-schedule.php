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
              <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold shadow-sm p-3 active"><i class="nav-icon fa fa-cogs"></i><p> Settings<i class="fas fa-angle-left right"></i></p></a>
                <ul class="nav nav-treeview">
                  <li class="nav-item"><a href="school-year" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="fa fa-bars nav-icon"></i><p> School Year</p></a></li>
                  <li class="nav-item"><a href="faculty" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="fa fa-bars nav-icon"></i><p> Faculty</p></a></li>
                  <li class="nav-item"><a href="grade-level" class="nav-link text-uppercase font-weight-bold shadow-sm p-3 active"><i class="fa fa-bars nav-icon"></i><p> Grade Level</p></a></li>
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
                  <li class="breadcrumb-item active">Section</li>
                  <li class="breadcrumb-item active">Schedule</li>
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
                    <h5 class="card-title text-uppercase font-weight-bold"><i class="nav-icon fa fa-bars"></i> 
                      <?php
                        include("db_connect.php");
                        $glevel_name = mysqli_query($conn, "SELECT * FROM $gradelevel WHERE glID='".$_GET['g_level_id']."'");
                        while($row_level_name = mysqli_fetch_array($glevel_name)) {
                          echo "Grade ".$row_level_name['level']."&nbsp;";
                        } 
                        $section_name = mysqli_query($conn, "SELECT * FROM $section WHERE secID='".$_GET['section_id']."'");
                        while($row_section_name = mysqli_fetch_array($section_name)) {
                          echo $row_section_name['secname']."&nbsp; Schedule";
                        }
                        mysqli_close($conn);
                      ?>
                    </h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <form class="col-md-7 h6" method="post" action="">
                        <?php
                          if(isset($_GET['update'])) {
                            include("db_connect.php");
                            date_default_timezone_set("Asia/Manila");
                            $q_schedule = mysqli_query($conn, "SELECT * FROM $schedule WHERE schID='".$_GET['update']."'");
                            while($row_schedule = mysqli_fetch_array($q_schedule)) {
                        ?>
                              <div class="mb-3 row">
                                <label for="subj" class="col-sm-3 text-end control-label col-form-label">Subject : </label>
                                <div class="col-sm-6">
                                  <select class="form-control h5" name="subj" id="subj">
                                    <?php 
                                      $subject_q = mysqli_query($conn, "SELECT * FROM $subject WHERE glevel='".$_GET['g_level_id']."'");
                                      while($row_subj = mysqli_fetch_array($subject_q)) {
                                        echo "<option value='".$row_subj['suID']."'>".$row_subj['sucode']."-".$row_subj['descr']."</option>";
                                      }
                                    ?>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="stime" class="col-sm-3 text-end control-label col-form-label">Start Time : </label>
                                <div class="col-sm-6">
                                  <input type="time" name="stime" class="form-control h5" id="stime" required value="<?php echo date("h:i A", $row_schedule['time_start']);?>" />
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="etime" class="col-sm-3 text-end control-label col-form-label">End Time : </label>
                                <div class="col-sm-6">
                                  <input type="time" name="etime" class="form-control h5" id="etime" required value="<?php echo date("h:i A", $row_schedule['time_end']);?>" />
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="schday" class="col-sm-3 text-end control-label col-form-label">Schedule Day : </label>
                                <div class="col-sm-6">
                                  <input type="text" name="schday" id="schday" class="form-control h5" required value="<?php echo $row_schedule['sch_day'];?>" />
                                  <input type="hidden" name="secid" id="secid" class="form-control h5" value="<?php echo $_GET['section_id'];?>" />
                                  <input type="hidden" name="gid" id="gid" class="form-control h5" value="<?php echo $_GET['g_level_id'];?>" />
                                  <input type="hidden" name="schid" id="schid" class="form-control h5" value="<?php echo $_GET['update'];?>" />
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="teacher" class="col-sm-3 text-end control-label col-form-label">Teacher : </label>
                                <div class="col-sm-6">
                                  <select class="form-control h6" name="teacher" id="teacher" required>
                                    <?php
                                      include("db_connect.php");
                                      $q_teacher = mysqli_query($conn, "SELECT * FROM $faculty WHERE status='active'");
                                      while($row_teacher = mysqli_fetch_array($q_teacher)) {
                                        echo "<option value='".$row_teacher['facode']."'>".$row_teacher['fname']." ".$row_teacher['lname']."</option>";
                                      }
                                    ?>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <button type="submit" name="UpdateSchedule" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Update Section</button>
                              </div>
                        <?php
                            }
                            mysqli_close($conn);
                          }
                          else {
                        ?>
                            <div class="mb-3 row">
                              <label for="subj" class="col-sm-3 text-end control-label col-form-label">Subject : </label>
                              <div class="col-sm-6">
                                <select class="form-control h5" name="subj" id="subj">
                                  <?php 
                                    include("db_connect.php");
                                    $subject_q = mysqli_query($conn, "SELECT * FROM $subject WHERE glevel='".$_GET['g_level_id']."'");
                                    while($row_subj = mysqli_fetch_array($subject_q)) {
                                      echo "<option value='".$row_subj['suID']."'>".$row_subj['sucode']."-".$row_subj['descr']."</option>";
                                    }
                                    mysqli_close($conn);
                                  ?>
                                </select>
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="stime" class="col-sm-3 text-end control-label col-form-label">Start Time : </label>
                              <div class="col-sm-6">
                                <input type="time" name="stime" class="form-control h5" id="stime" required />
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="etime" class="col-sm-3 text-end control-label col-form-label">End Time : </label>
                              <div class="col-sm-6">
                                <input type="time" name="etime" class="form-control h5" id="etime" required />
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="schday" class="col-sm-3 text-end control-label col-form-label">Schedule Day : </label>
                              <div class="col-sm-6">
                                <input type="text" name="schday" id="schday" class="form-control h5" required />
                                <input type="hidden" name="secid" id="secid" class="form-control h5" value="<?php echo $_GET['section_id'];?>" />
                                <input type="hidden" name="gid" id="gid" class="form-control h5" value="<?php echo $_GET['g_level_id'];?>" />
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="teacher" class="col-sm-3 text-end control-label col-form-label">Teacher : </label>
                              <div class="col-sm-6">
                                <select class="form-control h6" name="teacher" id="teacher" required>
                                  <?php
                                    include("db_connect.php");
                                    $q_teacher = mysqli_query($conn, "SELECT * FROM $faculty WHERE status='active'");
                                    while($row_teacher = mysqli_fetch_array($q_teacher)) {
                                      echo "<option value='".$row_teacher['facode']."'>".$row_teacher['fname']." ".$row_teacher['lname']."</option>";
                                    }
                                    mysqli_close($conn);
                                  ?>
                                </select>
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <button type="submit" name="SubmitSchedule" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Schedule</button>
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
                              <th class="fw-bold">Subject</th>
                              <th class="fw-bold">Start Time</th>
                              <th class="fw-bold">End Time</th>
                              <th class="fw-bold">Schedule Day</th>
                              <th class="fw-bold">Teacher</th>
                              <th class="fw-bold">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              include("db_connect.php");
                              date_default_timezone_set("Asia/Manila");
                              $display_schedule = mysqli_query($conn, "SELECT * FROM $schedule WHERE section_id='".$_GET['section_id']."' ORDER BY section_id ASC");
                              if(mysqli_num_rows($display_schedule)<1) {
                                echo "<tr>";
                                  echo "<td colspan='5'>No schedule found.</td>";
                                echo "</tr>";
                              } 
                              else {
                                while($row_schedule = mysqli_fetch_array($display_schedule)) {
                                  echo "<tr>";
                                    echo "<td>";
                                      $subj_q = mysqli_query($conn, "SELECT * FROM $subject WHERE suID='".$row_schedule['subj']."'");
                                      while($row_subj_q = mysqli_fetch_array($subj_q)) {
                                        echo $row_subj_q['sucode']."-".$row_subj_q['descr'];
                                      }
                                    echo "</td>";
                                    echo "<td>".date("h:i A", $row_schedule['time_start'])."</td>";
                                    echo "<td>".date("h:i A", $row_schedule['time_end'])."</td>";
                                    echo "<td>".$row_schedule['sch_day']."</td>";
                                    echo "<td>";
                                      $adviser = mysqli_query($conn, "SELECT * FROM $faculty WHERE facode='".$row_schedule['faculty']."'");
                                      while($row_adviser = mysqli_fetch_array($adviser)) {
                                        echo $row_adviser['fname']." ".$row_adviser['lname'];
                                      }
                                    echo "</td>";
                                    echo "<td><a href='?update=".$row_schedule['schID']."&&section_id=".$_GET['section_id']."&&g_level_id=".$_GET['g_level_id']."'><span class='badge bg-success rounded-pill'><i class='fas fa-pencil-alt text-dark p-1'></i> Edit</span></a> <a href='?delete_schedule=".$row_schedule['schID']."&&section_id=".$_GET['section_id']."&&g_level_id=".$_GET['g_level_id']."'><span class='badge bg-danger rounded-pill'><i class='fas fa-trash text-dark p-1'></i> Delete</span></a></td>";
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
    <?php echo $gid = $_GET['g_level_id'];?>
    <script>
      $(document).on('click', '.delete_section', function(){
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
                url: 'delete_function.php?action=delete_section',
                type: 'POST',
                  data: 'id='+id,
                  dataType: 'json'
              })
              .done(function(response){
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Success',
                    text: 'Section was successfully deleted',
                    footer: '',
                    showConfirmButton: false,
                    timer: 2000
                  }).then(function() {
                    window.location = 'section';
                });
              fetch();
              })
              .fail(function(){
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    position: 'top-end',
                    title: 'Failed',
                    text: 'Section was not successfully deleted',
                    footer: '',
                    showConfirmButton: false,
                    timer: 2000
                  }).then(function() {
                    window.location = 'section';
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
  ManageSchedule();
?>
<?php 
  ob_flush();
?>