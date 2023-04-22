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
    </head>
    <body class="bg-success">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card bg-white">
                  <div class="card-header">
                    <h5 class="card-title text-uppercase font-weight-bold"><i class="nav-icon fa fa-calendar"></i> 
                      Section Details
                    </h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="table-responsive">
                        <table id="zero_config" class="table table-striped h6">
                          <thead>
                            <tr>
                              <th class="fw-bold">Section Code</th>
                              <th class="fw-bold">Section Name</th>
                              <th class="fw-bold">GPA</th>
                              <th class="fw-bold">Student Limit</th>
                              <th class="fw-bold">Available</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              include("db_connect.php");
                              date_default_timezone_set("Asia/Manila");
                              $display_section = mysqli_query($conn, "SELECT * FROM $section WHERE glevel='".$_GET['section']."' ORDER BY scode ASC");
                              if(mysqli_num_rows($display_section)<1) {
                                echo "<tr>";
                                  echo "<td colspan='5'>No schedule found.</td>";
                                echo "</tr>";
                              } 
                              else {
                                while($row_section = mysqli_fetch_array($display_section)) {
                                  echo "<tr>";
                                    echo "<td>".$row_section['scode']."</td>";
                                    echo "<td>".$row_section['secname']."</td>";
                                    echo "<td>".$row_section['gpafrom']."-".$row_section['gpato']."</td>";
                                    echo "<td>".$row_section['studlimit']."</td>";
                                    echo "<td>".$row_section['limitavail']."</td>";
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
    ob_flush();
?>