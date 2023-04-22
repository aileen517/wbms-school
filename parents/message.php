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
                  <li class="nav-item"><a href="history" class="nav-link text-uppercase font-weight-bold shadow-sm"><i class="fa fa-history nav-icon fs-8"></i><p> History</p></a></li>
                  <li class="nav-item"><a href="mission" class="nav-link text-uppercase font-weight-bold shadow-sm"><i class="fa fa-binoculars nav-icon"></i><p> Mission</p></a></li>
                  <li class="nav-item"><a href="vision" class="nav-link text-uppercase font-weight-bold shadow-sm"><i class="fa fa-eye nav-icon fa-2x"></i><p> Vision</p></a></li>
                </ul>
              </li>
              <li class="nav-item"><a href="enrollment" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-user-plus"></i><p> Enrollment </p></a></li>
              <li class="nav-item"><a href="schedule" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-calendar"></i><p> My Schedule</p></a></li>
              <li class="nav-item"><a href="reports" class="nav-link text-uppercase font-weight-bold shadow-sm p-3"><i class="nav-icon fa fa-tasks"></i><p> My Grades</p></a></li>

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
                  <li class="breadcrumb-item">Message</li>
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
                        <i class="far fa-comments"></i> Message List
                      </div>
                      <div class="col-sm-6 text-right">
                        <a href='new-message'><span class='badge bg-info rounded p-2'><i class='fas fa-plus'></i> Create New Messaage</span></a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="card direct-chat direct-chat-warning">
                          <div class="card-header">
                            <h3 class="card-title">Inbox</h3>
                          </div>
                          <div class="card-body" style="height: 463px;">
                            <div class="direct-chat-messages" style="height: 463px;">
                              <div class="table-responsive">
                                <table id="zero_config" class="table table-striped h6">
                                  <thead>
                                    <tr>
                                      <th class="cell">Date/Time</th>
                                      <th class="cell">Sender</th>
                                      <th class="cell">Message</th>
                                      <th class="cell">Replies</th>
                                      <th class="cell">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                        include("db_connect.php");
                                        date_default_timezone_set("Asia/Manila");
                                        $msg_view = mysqli_query($conn, "SELECT * FROM $chatbx WHERE (touser='".$_SESSION['SESS_STUDENT_LRN']."' AND remarks='msg' AND scode='0') OR (tofrom='".$_SESSION['SESS_STUDENT_LRN']."' AND remarks='msg' AND scode='0')");
                                        if(mysqli_num_rows($msg_view)<1) {
                                            echo "<tr>";
                                          echo "<td colspan='6'>No message found.</td>";
                                        echo "</tr>";
                                        }
                                        else {
                                            while($row_msg_view = mysqli_fetch_array($msg_view)) {
                                              echo "<tr>";
                                                echo "<td>".date("m/d/Y", $row_msg_view['mdate'])." / ".date("h:i A", $row_msg_view['mtime'])."</td>";
                                                echo "<td>";
                                                  $tofaculty = mysqli_query($conn, "SELECT * FROM $faculty WHERE facode='".$row_msg_view['tofrom']."'");
                                                  if(mysqli_num_rows($tofaculty)>0) {
                                                    while($row_tofaculty = mysqli_fetch_array($tofaculty)) {
                                                      echo "<a href='message?msgid=".$row_msg_view['chatID']."' class='text-decoration-none'>".$row_tofaculty['fname']. " ".$row_tofaculty['lname']."</a>";
                                                    }
                                                  }
                                                  else {
                                                    $tostudent = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='".$row_msg_view['tofrom']."'");
                                                    if(mysqli_num_rows($tostudent)>0) {
                                                      while($row_tostudent = mysqli_fetch_array($tostudent)) {
                                                        echo "<a href='message?msgid=".$row_msg_view['chatID']."' class='text-decoration-none'>Me</a>";
                                                      }
                                                    }
                                                    else {
                                                        $toregistrar = mysqli_query($conn, "SELECT * FROM $registrar WHERE regcode='".$row_msg_view['tofrom']."'");
                                                        if(mysqli_num_rows($toregistrar)>0) {
                                                          echo "<a href='message?msgid=".$row_msg_view['chatID']."' class='text-decoration-none'>Me</a>";
                                                        }
                                                        else {
                                                            echo "<a href='message?msgid=".$row_msg_view['chatID']."' class='text-decoration-none'>Admin</a>";
                                                        }
                                                    }
                                                  }
                                                echo "</td>";
                                                echo "<td>".$row_msg_view['details']."</td>";
                                                echo "<td>";
                                                  $replies = mysqli_query($conn, "SELECT * FROM $chatbx WHERE scode='".$row_msg_view['chatID']."'");
                                                  echo mysqli_num_rows($replies);
                                                echo "</td>";
                                                echo "<td><a href='?delete_msg=".$row_msg_view['chatID']."' class='text-decoration-none' title='Delete'><i class='fa fa-times text-danger'></i></a></td>";
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
                      <div class="col-md-6">
                        <div class="card direct-chat direct-chat-warning">
                          <div class="card-header">
                            <h3 class="card-title">Conversation</h3>
                          </div>
                          <div class="card-body" style="height: 400px;">
                            <div class="direct-chat-messages" style="height: 400px;">
                              <?php
                                if(isset($_GET['msgid'])) {
                                  include("db_connect.php");
                                  mysqli_query($conn, "UPDATE $chatbx SET toread='read' WHERE scode='".$_GET['msgid']."'");
                                  $msg_info = mysqli_query($conn, "SELECT * FROM $chatbx WHERE scode='".$_GET['msgid']."'");
                                  if(mysqli_num_rows($msg_info)>0) {
                                    while($row_msginfo = mysqli_fetch_array($msg_info)) {
                                      if($row_msginfo['tofrom']<>$_SESSION['SESS_STUDENT_LRN']) {
                                        echo "<div class='direct-chat-msg'>";
                                          echo "<div class='direct-chat-infos clearfix'>";
                                            echo "<span class='direct-chat-name float-left'>";
                                              $fromstudent = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='".$row_msginfo['tofrom']."'"); 
                                              if(mysqli_num_rows($fromstudent)>0) {
                                                while($row_fromstudent = mysqli_fetch_array($fromstudent))
                                                {
                                                  echo $row_fromstudent['sfname']." ".$row_fromstudent['slname'];
                                                }
                                              }
                                              else {
                                                $fromfaculty = mysqli_query($conn, "SELECT * FROM $faculty WHERE facode='".$row_msginfo['tofrom']."'"); 
                                                if(mysqli_num_rows($fromfaculty)>0) {
                                                  while($row_fromfaculty = mysqli_fetch_array($fromfaculty))
                                                  {
                                                    echo $row_fromfaculty['fname']." ".$row_fromfaculty['lname'];
                                                  }
                                                }
                                                else {
                                                        $toregistrar = mysqli_query($conn, "SELECT * FROM $registrar WHERE regcode='".$row_msg_view['tofrom']."'");
                                                        if(mysqli_num_rows($toregistrar)>0) {
                                                            while($row_fromreg = mysqli_fetch_array($toregistrar))
                                                            {
                                                                echo $row_fromreg['fname']." ".$row_fromreg['lname'];
                                                            }
                                                        }
                                                        else {
                                                            echo "Admin";
                                                        }
                                                    }
                                              }
                                            echo "</span>";
                                            echo "<span class='direct-chat-timestamp float-right'>";
                                               echo date("m/d/Y", $row_msginfo['mdate'])." ".date("h:i A", $row_msginfo['mtime']);
                                            echo "</span>";
                                          echo "</div>";
                                          echo "<img class='direct-chat-img' src='../cnhsadmin/img/logo.png' alt='message user image'>";
                                          echo "<div class='direct-chat-text'>";
                                            echo $row_msginfo['details'];
                                          echo "</div>";
                                        echo "</div>";
                                      }
                                      else {
                                        echo "<div class='direct-chat-msg right'>";
                                          echo "<div class='direct-chat-infos clearfix'>";
                                            echo "<span class='direct-chat-name float-right'>";
                                            $fromstudent = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='".$row_msginfo['tofrom']."'"); 
                                              if(mysqli_num_rows($fromstudent)>0) {
                                                while($row_fromstudent = mysqli_fetch_array($fromstudent))
                                                {
                                                  echo $row_fromstudent['sfname']." ".$row_fromstudent['slname'];
                                                }
                                              }
                                              else {
                                                $fromfaculty = mysqli_query($conn, "SELECT * FROM $faculty WHERE facode='".$row_msginfo['tofrom']."'"); 
                                                if(mysqli_num_rows($fromfaculty)>0) {
                                                  while($row_fromfaculty = mysqli_fetch_array($fromfaculty))
                                                  {
                                                    echo $row_fromfaculty['fname']." ".$row_fromfaculty['lname'];
                                                  }
                                                }
                                              }
                                            echo "</span>";
                                            echo "<span class='direct-chat-timestamp float-left'>";
                                              echo date("m/d/Y", $row_msginfo['mdate'])." ".date("h:i A", $row_msginfo['mtime']);
                                            echo "</span>";
                                          echo "</div>";
                                          echo "<img class='direct-chat-img' src='../cnhsadmin/img/logo.png' alt='message user image'>";
                                          echo "<div class='direct-chat-text'>".$row_msginfo['details']."</div>";
                                        echo "</div>";
                                      }
                                    }
                                  }
                                  else {
                                    echo "No conversation found.";
                                  }
                                  mysqli_close($conn);
                                }
                                else {
                                  echo "Please click the title from your inbox to start conversation.";
                                }
                              ?>
                            </div>
                          </div>
                          <div class="card-footer">
                            <?php
                              if(isset($_GET['msgid'])) { 
                            ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                  <div class="input-group">
                                    <input type="text" name="msg" placeholder="Type Message ..." class="form-control" required>
                                    <input type="hidden" name="repid" value="<?php echo $_GET['msgid'];?>">
                                    <span class="input-group-append">
                                      <button type="submit" name="ReplyMessage" class="btn btn-warning"><i class="fas fa-paper-plane"></i> Send</button>
                                    </span>
                                  </div>
                                </form>
                            <?php
                              } 
                              else {
                            ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                  <div class="input-group">
                                    <input type="text" name="msg" placeholder="Type Message ..." class="form-control" required readonly>
                                    <input type="hidden" name="repid" value="<?php echo $_GET['msgid'];?>">
                                    <span class="input-group-append">
                                      <button type="button" name="ReplyMessage" class="btn btn-warning"><i class="fas fa-paper-plane"></i> Send</button>
                                    </span>
                                  </div>
                                </form>
                            <?php
                              }
                            ?>
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
  </body>
</html>
<?php
  include("pmnhs_function.php");
  ManageChatBox();
?>
<?php 
  ob_flush();
?>