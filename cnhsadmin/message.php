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
    <script>tinymce.init({selector:'textarea'});</script>
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
                                    <nav class="mt-2">
                                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                    <?php
                                        include("db_connect.php");
                                        date_default_timezone_set("Asia/Manila");
                                        mysqli_query($conn, "UPDATE $chatbx SET toread='read'  WHERE touser='".$_SESSION['SESS_ADMIN_ID']."' OR tofrom='".$_SESSION['SESS_ADMIN_ID']."'");
                                        $msg_view = mysqli_query($conn, "SELECT * FROM $chatbx WHERE (touser='".$_SESSION['SESS_ADMIN_ID']."' and remarks='msg' AND scode='0') OR (tofrom='".$_SESSION['SESS_ADMIN_ID']."' and remarks='msg' AND scode='0')");
                                        if(mysqli_num_rows($msg_view)<1) {
                                            echo "<h6>No message found.</h6>";
                                        }
                                            else {
                                                while($row_msg_view = mysqli_fetch_array($msg_view)) {
                                                    echo "<h6>";
                                                        if($row_msg_view['touser']=="1"){
                                                            $fromfaculty = mysqli_query($conn, "SELECT * FROM $faculty WHERE facode='".$row_msg_view['tofrom']."'");
                                                            if(mysqli_num_rows($fromfaculty)>0) {
                                                                while($row_fromfaculty = mysqli_fetch_array($fromfaculty)) {
                                                                    echo "<div class='d-flex'>";
                                                                        echo "<div class='col-md-1 shadow-sm'><img src='img/user_fac.png' width='40'></div>";
                                                                        echo "<div class='col-md-11 shadow-sm'>";
                                                                            echo "<li class='nav-item m-1'><a href='message?msgid=".$row_msg_view['chatID']."' class='text-decoration-none'> ".$row_fromfaculty['fname']. " ".$row_fromfaculty['lname']."</a></li>";
                                                                            echo "<li class='nav-item m-1'>";
                                                                                $msg_details = mysqli_query($conn, "SELECT * FROM $chatbx WHERE scode='".$row_msg_view['chatID']."' ORDER BY chatID DESC LIMIT 1");
                                                                                if(mysqli_num_rows($msg_details)<1) {
                                                                                    $date1 = $row_msg_view['mdate']." ".$row_msg_view['mtime'];
                                                                                    $date2 = strtotime(date("m/d/Y")." ".date("h:i A"));
                                                                                    $diff = abs($date2 - $date1); 
                                                                                    $years   = floor($diff / (365*60*60*24)); 
                                                                                    $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
                                                                                    $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                                                                    $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
                                                                                    $minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
                                                                                    $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 
                                                                                    if($days<1) {
                                                                                        echo  substr($row_msg_view['details'],0,50)."...<span class='text-secondary'>-today</span>"; 
                                                                                    }
                                                                                    else {
                                                                                        echo  substr($row_msg_view['details'],0,50)."...<span class='text-secondary'>-".$days." day/s ago</span>"; 
                                                                                    }
                                                                                }
                                                                                else {
                                                                                    while($row_details = mysqli_fetch_array($msg_details)) {
                                                                                        $date1 = $row_details['mdate']." ".$row_details['mtime'];
                                                                                        $date2 = strtotime(date("m/d/Y")." ".date("h:i A"));
                                                                                        $diff = abs($date2 - $date1); 
                                                                                        $years   = floor($diff / (365*60*60*24)); 
                                                                                        $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
                                                                                        $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                                                                        $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
                                                                                        $minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
                                                                                        $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 
                                                                                        echo $row_details['details'];
                                                                                        if($days<1) {
                                                                                           echo substr($row_details['details'],0,50)."...<span class='text-secondary'> - today</span>";
                                                                                        }
                                                                                        else {
                                                                                            echo substr($row_details['details'],0,50)."...<span class='text-secondary'> - ".$days." day/s ago</span>"; 
                                                                                        }
                                                                                    }
                                                                                }
                                                                            echo "</li>";
                                                                        echo "</div>";
                                                                    echo "</div>";  
                                                                }
                                                            }
                                                            else {
                                                                $fromstudent = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='".$row_msg_view['touser']."'");
                                                                if(mysqli_num_rows($fromstudent)>0) {
                                                                    while($row_fromstudent = mysqli_fetch_array($fromstudent)) {
                                                                        echo "<div class='d-flex'>";
                                                                            echo "<div class='col-md-1 shadow-sm'><img src='img/user_stud.png' width='40'></div>";
                                                                            echo "<div class='col-md-11 shadow-sm'>";
                                                                                echo "<li class='nav-item m-1'><a href='message?msgid=".$row_msg_view['chatID']."' class='text-decoration-none'> ".$row_fromstudent['sfname']. " ".$row_fromstudent['slname']."</a></li>";
                                                                                echo "<li class='nav-item m-1'>";
                                                                                    $msg_details = mysqli_query($conn, "SELECT * FROM $chatbx WHERE scode='".$row_msg_view['chatID']."' ORDER BY chatID DESC LIMIT 1");
                                                                                    if(mysqli_num_rows($msg_details)<1) {
                                                                                        $date1 = $row_msg_view['mdate']." ".$row_msg_view['mtime'];
                                                                                        $date2 = strtotime(date("m/d/Y")." ".date("h:i A"));
                                                                                        $diff = abs($date2 - $date1); 
                                                                                        $years   = floor($diff / (365*60*60*24)); 
                                                                                        $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
                                                                                        $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                                                                        $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
                                                                                        $minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
                                                                                        $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 
                                                                                        if($days<1) {
                                                                                            echo  substr($row_msg_view['details'],0,50)."...<span class='text-secondary'>-today</span>"; 
                                                                                        }
                                                                                        else {
                                                                                            echo  substr($row_msg_view['details'],0,50)."...<span class='text-secondary'>-".$days." day/s ago</span>"; 
                                                                                        }
                                                                                    }
                                                                                    else {
                                                                                        while($row_details = mysqli_fetch_array($msg_details)) {
                                                                                            $date1 = $row_details['mdate']." ".$row_details['mtime'];
                                                                                            $date2 = strtotime(date("m/d/Y")." ".date("h:i A"));
                                                                                            $diff = abs($date2 - $date1); 
                                                                                            $years   = floor($diff / (365*60*60*24)); 
                                                                                            $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
                                                                                            $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                                                                            $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
                                                                                            $minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
                                                                                            $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 
                                                                                            echo $row_details['details'];
                                                                                            if($days<1) {
                                                                                                echo substr($row_details['details'],0,50)."...<span class='text-secondary'> - today</span>";
                                                                                            }
                                                                                            else {
                                                                                                echo substr($row_details['details'],0,50)."...<span class='text-secondary'> - ".$days." day/s ago</span>"; 
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                echo "</li>";
                                                                            echo "</div>";
                                                                        echo "</div>"; 
                                                                     }
                                                                }
                                                                else {
                                                                    $fromregistrar = mysqli_query($conn, "SELECT * FROM $registrar WHERE regcode='".$row_msg_view['touser']."'");
                                                                    if(mysqli_num_rows($fromregistrar)>0) {
                                                                        while($row_fromregistrar = mysqli_fetch_array($fromregistrar)) {
                                                                            echo "<div class='d-flex'>";
                                                                                echo "<div class='col-md-1 shadow-sm'><img src='img/user_reg.png' width='40'></div>";
                                                                                echo "<div class='col-md-11 shadow-sm'>";
                                                                                    echo "<li class='nav-item m-1'><a href='message?msgid=".$row_msg_view['chatID']."' class='text-decoration-none'> ".$row_fromregistrar['fname']. " ".$row_fromregistrar['lname']."</a></li>";
                                                                                    echo "<li class='nav-item m-1'>";
                                                                                        $msg_details = mysqli_query($conn, "SELECT * FROM $chatbx WHERE scode='".$row_msg_view['chatID']."' ORDER BY chatID DESC LIMIT 1");
                                                                                        if(mysqli_num_rows($msg_details)<1) {
                                                                                            $date1 = $row_msg_view['mdate']." ".$row_msg_view['mtime'];
                                                                                            $date2 = strtotime(date("m/d/Y")." ".date("h:i A"));
                                                                                            $diff = abs($date2 - $date1); 
                                                                                            $years   = floor($diff / (365*60*60*24)); 
                                                                                            $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
                                                                                            $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                                                                            $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
                                                                                            $minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
                                                                                            $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 
                                                                                            if($days<1) {
                                                                                                echo  substr($row_msg_view['details'],0,50)."...<span class='text-secondary'>-today</span>"; 
                                                                                            }
                                                                                            else {
                                                                                                echo  substr($row_msg_view['details'],0,50)."...<span class='text-secondary'>-".$days." day/s ago</span>"; 
                                                                                            }
                                                                                        }
                                                                                        else {
                                                                                            while($row_details = mysqli_fetch_array($msg_details)) {
                                                                                                $date1 = $row_details['mdate']." ".$row_details['mtime'];
                                                                                                $date2 = strtotime(date("m/d/Y")." ".date("h:i A"));
                                                                                                $diff = abs($date2 - $date1); 
                                                                                                $years   = floor($diff / (365*60*60*24)); 
                                                                                                $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
                                                                                                $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                                                                                $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
                                                                                                $minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
                                                                                                $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 
                                                                                                echo $row_details['details'];
                                                                                                if($days<1) {
                                                                                                    echo substr($row_details['details'],0,50)."...<span class='text-secondary'> - today</span>";
                                                                                                }
                                                                                                else {
                                                                                                    echo substr($row_details['details'],0,50)."...<span class='text-secondary'> - ".$days." day/s ago</span>"; 
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    echo "</li>";
                                                                                echo "</div>";
                                                                            echo "</div>"; 
                                                                        //echo "<a href='message?msgid=".$row_msg_view['chatID']."' class='text-decoration-none'>".$row_tostudent['sfname']. " ".$row_tostudent['slname']."</a>";
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        else {
                                                            $tofaculty = mysqli_query($conn, "SELECT * FROM $faculty WHERE facode='".$row_msg_view['touser']."'");
                                                            if(mysqli_num_rows($tofaculty)>0) {
                                                                while($row_tofaculty = mysqli_fetch_array($tofaculty)) {
                                                                    echo "<div class='d-flex'>";
                                                                        echo "<div class='col-md-1 shadow-sm'><img src='img/user_fac.png' width='40'></div>";
                                                                        echo "<div class='col-md-11 shadow-sm'>";
                                                                            echo "<li class='nav-item m-1'><a href='message?msgid=".$row_msg_view['chatID']."' class='text-decoration-none'> ".$row_tofaculty['fname']. " ".$row_tofaculty['lname']."</a></li>";
                                                                            echo "<li class='nav-item m-1'>";
                                                                                $msg_details = mysqli_query($conn, "SELECT * FROM $chatbx WHERE scode='".$row_msg_view['chatID']."' ORDER BY chatID DESC LIMIT 1");
                                                                                if(mysqli_num_rows($msg_details)<1) {
                                                                                    $date1 = $row_msg_view['mdate']." ".$row_msg_view['mtime'];
                                                                                    $date2 = strtotime(date("m/d/Y")." ".date("h:i A"));
                                                                                    $diff = abs($date2 - $date1); 
                                                                                    $years   = floor($diff / (365*60*60*24)); 
                                                                                    $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
                                                                                    $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                                                                    $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
                                                                                    $minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
                                                                                    $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 
                                                                                    if($days<1) {
                                                                                        echo substr($row_msg_view['details'],0,50)."...<span class='text-secondary'>-today</span>"; 
                                                                                    }
                                                                                    else {
                                                                                       echo substr($row_msg_view['details'],0,50)."...<span class='text-secondary'>-".$days." day/s ago</span>"; 
                                                                                    }
                                                                                }
                                                                                else {
                                                                                    while($row_details = mysqli_fetch_array($msg_details)) {
                                                                                        $date1 = $row_details['mdate']." ".$row_details['mtime'];
                                                                                        $date2 = strtotime(date("m/d/Y")." ".date("h:i A"));
                                                                                        $diff = abs($date2 - $date1); 
                                                                                        $years   = floor($diff / (365*60*60*24)); 
                                                                                        $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
                                                                                        $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                                                                        $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
                                                                                        $minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
                                                                                        $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 
                                                                                        //echo $row_details['details'];
                                                                                        if($days<1) {
                                                                                            echo substr($row_details['details'],0,50)."...<span class='text-secondary'> - today</span>";
                                                                                        }
                                                                                        else {
                                                                                            echo substr($row_details['details'],0,50)."...<span class='text-secondary'> - ".$days." day/s ago</span>"; 
                                                                                        }
                                                                                    }
                                                                                }
                                                                            echo "</li>";
                                                                        echo "</div>";
                                                                    echo "</div>";  
                                                                  //echo "<li class='nav-item'><a href='message?msgid=".$row_msg_view['chatID']."' class='text-decoration-none'><img src='img/user_fac.png' width='40'> ".$row_tofaculty['fname']. " ".$row_tofaculty['lname']."</a></li>";
                                                                }
                                                            }
                                                            else {
                                                                $tostudent = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='".$row_msg_view['touser']."'");
                                                                if(mysqli_num_rows($tostudent)>0) {
                                                                    while($row_tostudent = mysqli_fetch_array($tostudent)) {
                                                                        echo "<div class='d-flex'>";
                                                                            echo "<div class='col-md-1 shadow-sm'><img src='img/user_stud.png' width='40'></div>";
                                                                            echo "<div class='col-md-11 shadow-sm'>";
                                                                                echo "<li class='nav-item m-1'><a href='message?msgid=".$row_msg_view['chatID']."' class='text-decoration-none'> ".$row_tostudent['sfname']. " ".$row_tostudent['slname']."</a></li>";
                                                                                echo "<li class='nav-item m-1'>";
                                                                                    $msg_details = mysqli_query($conn, "SELECT * FROM $chatbx WHERE scode='".$row_msg_view['chatID']."' ORDER BY chatID DESC LIMIT 1");
                                                                                    if(mysqli_num_rows($msg_details)<1) {
                                                                                        $date1 = $row_msg_view['mdate']." ".$row_msg_view['mtime'];
                                                                                        $date2 = strtotime(date("m/d/Y")." ".date("h:i A"));
                                                                                        $diff = abs($date2 - $date1); 
                                                                                        $years   = floor($diff / (365*60*60*24)); 
                                                                                        $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
                                                                                        $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                                                                        $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
                                                                                        $minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
                                                                                        $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 
                                                                                        if($days<1) {
                                                                                            echo  substr($row_msg_view['details'],0,50)."...<span class='text-secondary'>-today</span>"; 
                                                                                        }
                                                                                        else {
                                                                                            echo  substr($row_msg_view['details'],0,50)."...<span class='text-secondary'>-".$days." day/s ago</span>"; 
                                                                                        }
                                                                                    }
                                                                                    else {
                                                                                        while($row_details = mysqli_fetch_array($msg_details)) {
                                                                                            $date1 = $row_details['mdate']." ".$row_details['mtime'];
                                                                                            $date2 = strtotime(date("m/d/Y")." ".date("h:i A"));
                                                                                            $diff = abs($date2 - $date1); 
                                                                                            $years   = floor($diff / (365*60*60*24)); 
                                                                                            $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
                                                                                            $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                                                                            $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
                                                                                            $minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
                                                                                            $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 
                                                                                            //echo $row_details['details'];
                                                                                            if($days<1) {
                                                                                                echo substr($row_details['details'],0,50)."...<span class='text-secondary'> - today</span>";
                                                                                            }
                                                                                            else {
                                                                                                echo substr($row_details['details'],0,50)."...<span class='text-secondary'> - ".$days." day/s ago</span>"; 
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                echo "</li>";
                                                                            echo "</div>";
                                                                        echo "</div>"; 
                                                                    //echo "<a href='message?msgid=".$row_msg_view['chatID']."' class='text-decoration-none'>".$row_tostudent['sfname']. " ".$row_tostudent['slname']."</a>";
                                                                    }
                                                                }
                                                                else {
                                                                    $toregistrar = mysqli_query($conn, "SELECT * FROM $registrar WHERE regcode='".$row_msg_view['touser']."'");
                                                                    if(mysqli_num_rows($toregistrar)>0) {
                                                                        while($row_toregistrar = mysqli_fetch_array($toregistrar)) {
                                                                            echo "<div class='d-flex'>";
                                                                                echo "<div class='col-md-1 shadow-sm'><img src='img/user_reg.png' width='40'></div>";
                                                                                echo "<div class='col-md-11 shadow-sm'>";
                                                                                    echo "<li class='nav-item m-1'><a href='message?msgid=".$row_msg_view['chatID']."' class='text-decoration-none'> ".$row_toregistrar['fname']. " ".$row_toregistrar['lname']."</a></li>";
                                                                                    echo "<li class='nav-item m-1'>";
                                                                                        $msg_details = mysqli_query($conn, "SELECT * FROM $chatbx WHERE scode='".$row_msg_view['chatID']."' ORDER BY chatID DESC LIMIT 1");
                                                                                        if(mysqli_num_rows($msg_details)<1) {
                                                                                            $date1 = $row_msg_view['mdate']." ".$row_msg_view['mtime'];
                                                                                            $date2 = strtotime(date("m/d/Y")." ".date("h:i A"));
                                                                                            $diff = abs($date2 - $date1); 
                                                                                            $years   = floor($diff / (365*60*60*24)); 
                                                                                            $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
                                                                                            $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                                                                            $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
                                                                                            $minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
                                                                                            $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 
                                                                                            if($days<1) {
                                                                                                echo  substr($row_msg_view['details'],0,50)."...<span class='text-secondary'>-today</span>"; 
                                                                                            }
                                                                                            else {
                                                                                                echo  substr($row_msg_view['details'],0,50)."...<span class='text-secondary'>-".$days." day/s ago</span>"; 
                                                                                            }
                                                                                        }
                                                                                        else {
                                                                                            while($row_details = mysqli_fetch_array($msg_details)) {
                                                                                                $date1 = $row_details['mdate']." ".$row_details['mtime'];
                                                                                                $date2 = strtotime(date("m/d/Y")." ".date("h:i A"));
                                                                                                $diff = abs($date2 - $date1); 
                                                                                                $years   = floor($diff / (365*60*60*24)); 
                                                                                                $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
                                                                                                $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                                                                                $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
                                                                                                $minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
                                                                                                $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 
                                                                                                echo $row_details['details'];
                                                                                                if($days<1) {
                                                                                                    echo substr($row_details['details'],0,50)."...<span class='text-secondary'> - today</span>";
                                                                                                }
                                                                                                else {
                                                                                                    echo substr($row_details['details'],0,50)."...<span class='text-secondary'> - ".$days." day/s ago</span>"; 
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    echo "</li>";
                                                                                echo "</div>";
                                                                            echo "</div>"; 
                                                                        //echo "<a href='message?msgid=".$row_msg_view['chatID']."' class='text-decoration-none'>".$row_tostudent['sfname']. " ".$row_tostudent['slname']."</a>";
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                    echo "</h6>";
                                                }
                                                mysqli_close($conn);
                                            ?>
                                        </ul>
                                        </nav>
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
                                  $msg_info = mysqli_query($conn, "SELECT * FROM $chatbx WHERE scode='".$_GET['msgid']."'");
                                  if(mysqli_num_rows($msg_info)>0) {
                                    while($row_msginfo = mysqli_fetch_array($msg_info)) {
                                        if($row_msginfo['tofrom']<>$_SESSION['SESS_ADMIN_ID']) {
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
                                                        $fromregistrar = mysqli_query($conn, "SELECT * FROM $registrar WHERE regcode='".$row_msginfo['tofrom']."'"); 
                                                        if(mysqli_num_rows($fromregistrar)>0) {
                                                          while($row_fromregistrar = mysqli_fetch_array($fromregistrar))
                                                          {
                                                            echo $row_fromregistrar['fname']." ".$row_fromregistrar['lname'];
                                                          }
                                                        }
                                                    }
                                                  }
                                                echo "</span>";
                                                echo "<span class='direct-chat-timestamp float-right'>";
                                                   echo date("m/d/Y", $row_msginfo['mdate'])." ".date("h:i A", $row_msginfo['mtime']);
                                                echo "</span>";
                                              echo "</div>";
                                                $imgstudent = mysqli_query($conn, "SELECT * FROM $student WHERE lrnno='".$row_msginfo['tofrom']."'"); 
                                                if(mysqli_num_rows($imgstudent)>0) {
                                                    echo "<img class='direct-chat-img' src='img/user_stud.png' alt='message user image'>";
                                                }
                                                else {
                                                    $imgfaculty = mysqli_query($conn, "SELECT * FROM $faculty WHERE facode='".$row_msginfo['tofrom']."'"); 
                                                    if(mysqli_num_rows($imgfaculty)>0) {
                                                        echo "<img class='direct-chat-img' src='img/user_fac.png' alt='message user image'>";
                                                    }
                                                    else {
                                                        $imgregistrar = mysqli_query($conn, "SELECT * FROM $registrar WHERE regcode='".$row_msginfo['tofrom']."'");
                                                        if(mysqli_num_rows($imgregistrar)>0) {
                                                            echo "<img class='direct-chat-img' src='img/user_reg.png' alt='message user image'>";
                                                        }
                                                    }
                                                }
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
                                              echo "<img class='direct-chat-img' src='img/user_adm.png' alt='message user image'>";
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
  ManageChatBox();
?>
<?php 
  ob_flush();
?>