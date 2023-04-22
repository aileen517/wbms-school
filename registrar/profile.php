<?php ob_start();?>
<?php include("auth.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Commonwealth National High School</title>
    <link rel="shortcut icon" type="image/x-icon" href="../cnhsadmin/img/favicon.ico">
    <link rel="stylesheet" href="../cnhsadmin/dist/css/font_awsome.css">
    <link rel="stylesheet" href="../cnhsadmin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../cnhsadmin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../cnhsadmin/dist/css/adminlte.min.css">
    <script src="../cnhsadmin/dist/js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>
  </head>
  <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
      <?php include("nav.php");?>
      <aside class="main-sidebar sidebar-dark-warning elevation-4">
        <span class="brand-link bg-danger">
          <img src="../cnhsadmin/img/logo.png" alt="CNHS Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-bold text-uppercase">Commonwelth NHS</span>
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
              <li class="nav-item"><a href="reports" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-tasks"></i><p> Report</p></a></li>
              <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold shadow-sm p-3 "><i class="nav-icon fa fa-cogs"></i><p> Settings<i class="fas fa-angle-left right"></i></p></a>
                <ul class="nav nav-treeview">
                  <li class="nav-item"><a href="grade-level" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="fa fa-bars nav-icon"></i><p> Grade Level</p></a></li>
                  <li class="nav-item"><a href="faculty" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="fa fa-bars nav-icon"></i><p> Faculty</p></a></li>
                  <li class="nav-item"><a href="school-year" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="fa fa-bars nav-icon"></i><p> School Year</p></a></li>
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
                  <li class="breadcrumb-item">My Account</li>
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
                    <div class="d-flex">
                      <div class="col-sm-6">
                        <i class="far fa-user"></i> MyAccount
                      </div>
                      <div class="col-sm-6 text-right">&nbsp;</div>
                    </div>
                  </div>
                  <div class="card-body">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active text-uppercase border-right" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link text-uppercase border-right" id="password-tab" data-toggle="tab" data-target="#password" type="button" role="tab" aria-controls="password" aria-selected="false">Change Password</button>
                      </li>
                     </ul>
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                              <div class="table-responsive col-md-6">
                                <form method="post" action="">
                                  <table id="zero_config" class="table table-striped h6 mt-2">
                                    <?php
                                      include("db_connect.php");
                                      $profile = mysqli_query($conn, "SELECT * FROM $registrar WHERE regcode='".$_SESSION['SESS_REGISTRAR_ID']."'");
                                    while($row_student = mysqli_fetch_array($profile)) {
                                        echo "<tr>";
                                          echo "<td>First Name</td>";
                                          echo "<td>:</td>";
                                          echo "<td><input name='fname' type='text' class='form-control' value='".$row_student['fname']."'></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                          echo "<td>Last Name</td>";
                                          echo "<td>:</td>";
                                          echo "<td><input name='lname' type='text' class='form-control' value='".$row_student['lname']."'></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                          echo "<td>Title</td>";
                                          echo "<td>:</td>";
                                          echo "<td><input name='title' type='text' class='form-control' value='".$row_student['title']."'></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                          echo "<td>Education</td>";
                                          echo "<td>:</td>";
                                          echo "<td><input name='educ' type='text' class='form-control' value='".$row_student['educ']."'></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                          echo "<td>Email</td>";
                                          echo "<td>:</td>";
                                          echo "<td><input name='email' type='email' class='form-control' value='".$row_student['email']."'></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                          echo "<td>Office</td>";
                                          echo "<td>:</td>";
                                          echo "<td><input name='ofc' type='text' class='form-control' value='".$row_student['ofc']."'></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                          echo "<td>Address</td>";
                                          echo "<td>:</td>";
                                          echo "<td><input name='addr' type='text' class='form-control' value='".$row_student['addr']."'></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                          echo "<td>Contact</td>";
                                          echo "<td>:</td>";
                                          echo "<td><input name='con' type='number' class='form-control' value='".$row_student['con']."'><input name='aid' type='hidden' class='form-control' value='".$row_student['regcode']."'><button type='submit' name='UpdateProfile' class='btn btn-primary mt-1'>Update</button></td>";
                                        echo "</tr>";
                                     }
                                      mysqli_close($conn);
                                    ?>
                                  </table>
                                </form>
                              </div>  
                            </div>
                        </div>
                        <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                            <div class="row">
                              <div class="table-responsive col-md-6">
                                <form method="post" action="">
                                  <table id="zero_config" class="table table-striped h6 mt-2">
                                    <?php
                                      include("db_connect.php");
                                      $profile2 = mysqli_query($conn, "SELECT * FROM $registrar WHERE regcode='".$_SESSION['SESS_REGISTRAR_ID']."'");
                                        while($row_student2 = mysqli_fetch_array($profile2)) {
                                        echo "<tr>";
                                          echo "<td>Username</td>";
                                          echo "<td>:</td>";
                                          echo "<td>".$row_student2['email']."</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                          echo "<td>Old Password</td>";
                                          echo "<td>:</td>";
                                          echo "<td><input name='oldpassw' type='password' class='form-control' value='".$row_student2['password']."' id='id_password'><i class='far fa-eye float-right text-white' id='togglePassword' style='margin-top: -30px; margin-left:220px; position:absolute; cursor: pointer;'></i></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                          echo "<td>New Password</td>";
                                          echo "<td>:</td>";
                                          echo "<td><input name='newpassw' type='password' class='form-control' id='id_newpassword'><i class='far fa-eye float-right text-white' id='toggleNewPassword' style='margin-top: -30px; margin-left:220px; position:absolute; cursor: pointer;'></i></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                          echo "<td>Re-Enter New Password</td>";
                                          echo "<td>:</td>";
                                          echo "<td><input name='newpassw2' type='password' class='form-control' id='id_oldpassword'><i class='far fa-eye float-right text-white' id='toggleOldPassword' style='margin-top: -30px; margin-left:220px; position:absolute; cursor: pointer;'></i><button type='submit' name='UpdatePassword' class='btn btn-primary mt-1'>Update</button></td>";
                                        echo "</tr>";
                                      }
                                      mysqli_close($conn);
                                    ?>
                                  </table>
                                </form>
                              </div>  
                            </div>
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
    <script src="../cnhsadmin/plugins/jquery/jquery.min.js"></script>
    <script src="../cnhsadmin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../cnhsadmin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="../cnhsadmin/dist/js/adminlte.js"></script>
    <script src="../cnhsadmin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="../cnhsadmin/plugins/raphael/raphael.min.js"></script>
    <script src="../cnhsadmin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="../cnhsadmin/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <script src="../cnhsadmin/plugins/chart.js/Chart.min.js"></script>
    <script src="../cnhsadmin/dist/js/pages/dashboard2.js"></script>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
          const password = document.querySelector('#id_password');
        
          togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
    <script>
        const toggleNewPassword = document.querySelector('#toggleNewPassword');
          const newpassword = document.querySelector('#id_newpassword');
        
         toggleNewPassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = newpassword.getAttribute('type') === 'password' ? 'text' : 'password';
            newpassword.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
    <script>
        const toggleOldPassword = document.querySelector('#toggleOldPassword');
          const oldpassword = document.querySelector('#id_oldpassword');
        
         toggleOldPassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = oldpassword.getAttribute('type') === 'password' ? 'text' : 'password';
            oldpassword.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
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
  ManageProfile();
?>
<?php 
  ob_flush();
?>