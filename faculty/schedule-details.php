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
    <body class="bg-success">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card bg-white">
                  <div class="card-header">
                    <h5 class="card-title text-uppercase font-weight-bold"><i class="nav-icon fa fa-calendar"></i> 
                      Schedule Details
                    </h5>
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
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              include("db_connect.php");
                              date_default_timezone_set("Asia/Manila");
                              $display_schedule = mysqli_query($conn, "SELECT * FROM $schedule WHERE section_id='".$_GET['grade_level']."' ORDER BY section_id ASC");
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
    </body>
</html>
<?php
    ob_flush();
?>