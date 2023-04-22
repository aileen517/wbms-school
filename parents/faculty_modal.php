<!-- Add Modal-->
<div class="modal fade" id="addFaculty" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded modal-xl"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus"></i> Add New Faculty</h5>
        <button type="button" onclick="javascript:window.location.reload()" class="close " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="result"></div>
        <form class="add-new-post" id="facultyform" action="" method="post">
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">First Name : </label>
            <div class="col-sm-9">
              <input type="text" name="fname" class="form-control col-sm-6 h5" id="fname" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">Last Name : </label>
            <div class="col-sm-9">
              <input type="text" name="lname" class="form-control col-sm-6 h5" id="lname" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">Title : </label>
            <div class="col-sm-9">
              <input type="text" name="title" class="form-control col-sm-6 h5" id="title" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">Education : </label>
            <div class="col-sm-9">
              <input type="text" name="educ" class="form-control col-sm-6 h5" id="educ" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">Office/School : </label>
            <div class="col-sm-9">
              <input type="text" name="ofc" class="form-control col-sm-6 h5" id="ofc" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">Email : </label>
            <div class="col-sm-9">
              <input type="email" name="email" class="form-control col-sm-6 h5" id="email" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">Contact No. : </label>
            <div class="col-sm-9">
              <input type="text" name="con" class="form-control col-sm-6 h5" id="con" required onkeypress="return onlyNumberKey(event)" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11"/>
            </div>
          </div>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">Address : </label>
            <div class="col-sm-9">
              <input type="text" name="addr" class="form-control col-sm-6 h5" id="addr" required />
            </div>
          </div>
          <div class="form-group row">
            <button class="btn btn-sm btn-info float-right" id="AddFaculty" name="AddFaculty" type="submit"><i class="fa fa-check"></i> Submit Faculty</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
      </div>
      <div class="modal-body">
        ...
      </div>
    </div>
  </div>
</div>
<!-- End of Add Modal -->
<!-- Edit Employee Modal-->
<div class="modal fade" id="editFaculty" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded modal-xl"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title font-weight-bold" id="editEmployeeLabel"><i class="fas fa-pencil-alt"></i> Update Faculty Record</h6>
        <button type="button" onclick="javascript:window.location.reload()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form class="add-new-post" id="employeeform" action="" method="post" enctype='multipart/form-data'>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">First Name : </label>
            <div class="col-sm-9">
              <input class="form-control form-control-lg mb-3" type="text" name="fname" id="efname" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">Last Name : </label>
            <div class="col-sm-9">
              <input class="form-control form-control-lg mb-3" type="text" name="lname" id="elname" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">Title : </label>
            <div class="col-sm-9">
              <input class="form-control form-control-lg mb-3" type="text" name="title" id="etitle" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">Education : </label>
            <div class="col-sm-9">
              <input class="form-control form-control-lg mb-3" type="text" name="educ" id="eeduc" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">Office/School : </label>
            <div class="col-sm-9">
              <input class="form-control form-control-lg mb-3" type="text" name="ofc" id="eofc" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">Email : </label>
            <div class="col-sm-9">
              <input class="form-control form-control-lg mb-3" type="email" name="email" id="eemail" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">Contact No. : </label>
            <div class="col-sm-9">
              <input class="form-control form-control-lg mb-3" type="text" name="con" id="econ" required onkeypress="return onlyNumberKey(event)" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11">
            </div>
          </div>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">Address : </label>
            <div class="col-sm-9">
              <input class="form-control form-control-lg mb-3" type="text" name="addr" id="eaddr" required>
              <input class="form-control form-control-lg mb-3" type="hidden" name="fid" id="eid" required>
            </div>
          </div>
          <div class="form-group row">
            <button class="btn btn-sm btn-info float-right" id="UpdateFaculty" name="UpdateFaculty" type="submit"><i class="fas fa-edit"></i> Update Faculty</button>
          </div>
        </form>
      </div>  
    </div>
  </div>
</div>
<!-- End of Edit Employee Modal -->

<!--Add Student Modal -->
<div class="modal fade rounded" id="addStudent" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded modal-xl"  role="document">
    <div class="modal-content rounded">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus"></i> Enrollment Form</h5>
        <button type="button" onclick="javascript:window.location.reload()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="result"></div>
        <form class="add-new-post" id="enrollmentform" action="" method="post">
          <div class="form-group row">
            <label for="syear" class="col-sm-3 text-end control-label col-form-label">School Year : </label>
            <div class="col-sm-9">
              <input type="text" name="syear" class="form-control h5 col-sm-6" id="syear" readonly value="<?php include("db_connect.php"); $q_syear = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'"); while($row_syear = mysqli_fetch_array($q_syear)) {echo $row_syear['syear'];}mysqli_close($conn); ?>" />
              <input type="hidden" name="syear1" class="form-control fs-5" id="syear1" readonly value="<?php include("db_connect.php"); $q_syear1 = mysqli_query($conn, "SELECT * FROM $schoolyear WHERE status='activated'"); while($row_syear1 = mysqli_fetch_array($q_syear1)) {echo $row_syear1['syID'];}mysqli_close($conn); ?>" />
            </div>
          </div>
          <div class="form-group row">
            <label for="glevel" class="col-sm-3 text-end control-label col-form-label">Grade level to Enroll : </label>
            <div class="col-sm-6">
              <select name="glevel" id="glevel" class="form-control col-sm-6 h5">
                <?php
                  include("db_connect.php");
                  $q_glevel = mysqli_query($conn, "SELECT * FROM $gradelevel ORDER BY level ASC");
                  while($row_glevel = mysqli_fetch_array($q_glevel)) {
                    echo "<option value='".$row_glevel['glID']."'>".$row_glevel['level']."</option>";
                  }
                  mysqli_close($conn);
                ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="etype" class="col-sm-3 text-end control-label col-form-label">Check the appropriate box only : </label>
            <div class="col-sm-6">
              <select name="etype" id="etype" class="form-control col-sm-6 fs-5">
                <option value="no">No LRN</option>
                <option value="with">With LRN</option>
                <option value="returning">Returning</option>
              </select>
            </div>
          </div>
          <h5 class="text-center fw-bold p-2 border-top border-bottom">STUDENT INFORMATION</h5>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">PSA Birth Certificate No. : </label>
            <div class="col-sm-9">
              <input type="text" name="psano" class="form-control col-sm-6 h5" id="psano" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="lrnno" class="col-sm-3 text-end control-label col-form-label">Learner Reference No. (LRN). : </label>
            <div class="col-sm-9">
              <input type="text" name="lrnno" class="form-control col-sm-6 h5" id="lrnno" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="gpano" class="col-sm-3 text-end control-label col-form-label">GPA : </label>
            <div class="col-sm-9">
              <input type="number" name="gpano" class="form-control col-sm-6 h5" id="gpano" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="fname" class="col-sm-3 text-end control-label col-form-label">First Name : </label>
            <div class="col-sm-9">
              <input type="text" name="sfname" class="form-control col-sm-6 h5" id="sfname" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Last Name : </label>
            <div class="col-sm-9">
              <input type="text" name="slname" class="form-control col-sm-6 h5" id="slname" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="mname" class="col-sm-3 text-end control-label col-form-label">Middle Name : </label>
            <div class="col-sm-9">
              <input type="text" name="mname" class="form-control col-sm-6 h5" id="mname" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="bdate" class="col-sm-3 text-end control-label col-form-label">Date of Birth : </label>
            <div class="col-sm-9">
              <input type="date" name="bdate" class="form-control col-sm-6 h5" id="bdate" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="gender" class="col-sm-3 text-end control-label col-form-label">Sex : </label>
            <div class="col-sm-6">
              <select name="gender" id="gender" class="form-control col-sm-6 h5">
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="pppp" class="col-sm-3 text-end control-label col-form-label">Belonging to Indigenous Peoples (IP) Community/Indigenous Cultural Community? : </label>
            <div class="col-sm-6">
              <select name="pppp" id="pppp" class="form-control col-sm-6 h5">
                <option value="no">No</option>
                <option value="yes">Yes</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="ipconf" class="col-sm-3 text-end control-label col-form-label">If Yes, please specify : </label>
            <div class="col-sm-9">
              <input type="text" name="ipconf" class="form-control col-sm-6 h5" id="ipconf" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="mton" class="col-sm-3 text-end control-label col-form-label">Mother Tongue : </label>
            <div class="col-sm-9">
              <input type="text" name="mton" class="form-control col-sm-6 h5" id="mton" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="cpnum" class="col-sm-3 text-end control-label col-form-label">Cellphone No. : </label>
            <div class="col-sm-9">
              <input class="form-control col-sm-6 h5 form-control-lg mb-3" type="text" name="cpnum" id="cpnum" required onkeypress="return onlyNumberKey(event)" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11">
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-3 text-end control-label col-form-label">Email Address. : </label>
            <div class="col-sm-9">
              <input class="form-control col-sm-6 h5 form-control-lg mb-3" type="email" name="semail" id="semail" />
            </div>
          </div>
          <div class="form-group row">
            <label for="addr" class="col-sm-3 text-end control-label col-form-label">Complete Address : </label>
            <div class="col-sm-9">
              <input type="text" name="saddr" class="form-control col-sm-6 h5" id="saddr" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="zip" class="col-sm-3 text-end control-label col-form-label">Zip Code : </label>
            <div class="col-sm-9">
              <input type="number" name="zip" class="form-control col-sm-6 h5" id="zip" required />
            </div>
          </div>
          <h5 class="text-center fw-bold p-2 border-top border-bottom">PARENTS/GUARDIANS INFORMATION</h5>
          <div class="form-group row">
            <label for="faname" class="col-sm-3 text-end control-label col-form-label">Father's Name : </label>
            <div class="col-sm-9">
              <input type="text" name="faname" class="form-control col-sm-6 h5" id="faname" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="moname" class="col-sm-3 text-end control-label col-form-label">Mother's Maiden Name : </label>
            <div class="col-sm-9">
              <input type="text" name="moname" class="form-control col-sm-6 h5" id="moname" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="mnum" class="col-sm-3 text-end control-label col-form-label">Cellphone No. : </label>
            <div class="col-sm-9">
              <input class="form-control col-sm-6 h5 form-control-lg mb-3" type="text" name="mnum" id="mnum" required onkeypress="return onlyNumberKey(event)" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11">
            </div>
          </div>
          <h5 class="text-center fw-bold p-2 border-top border-bottom">FOR RETURNING LEARNERS (BALIK-ARAL) AND THOSE WHO SHALL TRANSFER/MOVE IN</h5>
          <div class="form-group row">
            <label for="lyear" class="col-sm-3 text-end control-label col-form-label">Last School Year Completed : </label>
            <div class="col-sm-9">
              <input type="text" name="lyear" class="form-control col-sm-6 h5" id="lyear" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="scname" class="col-sm-3 text-end control-label col-form-label">School Name : </label>
            <div class="col-sm-9">
              <input type="text" name="scname" class="form-control col-sm-6 h5" id="scname" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="scid" class="col-sm-3 text-end control-label col-form-label">School ID : </label>
            <div class="col-sm-9">
              <input type="text" name="scid" class="form-control col-sm-6 h5" id="scid" />
            </div>
          </div>
          <div class="form-group row">
            <label for="scaddr" class="col-sm-3 text-end control-label col-form-label">School Address : </label>
            <div class="col-sm-9">
              <input type="text" name="scaddr" class="form-control col-sm-6 h5" id="scaddr" />
            </div>
          </div>
          <div class="form-group row">
            <label for="dlearning" class="col-sm-3 text-end control-label col-form-label">Preferred Distance Learning Modality/ies : </label>
            <div class="col-sm-9">
              <select name="dlearning" id="dlearning" class="form-control h5">
                <option value="mprint">Modular (Print)</option>
                <option value="mdigital">Modular (Digital)</option>
                <option value="onl">Online</option>
                <option value="etv">Educational TV</option>
                <option value="radio">Radio-based instruction</option>
                <option value="home">Homeschooling</option>
                <option value="blended">Blended</option>
              </select>
            </div>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="agree" id="agree" value="agree" required>&nbsp;I hereby certify that the above information given are true and correct to the best of my knowledge and I allow the Department of Education to use my child's details to create and/or update his/her learner profile in the Learner Information System. The information herein shall be treated as confidential in compliance with the Data Privacy Act of 2012.
          </div>
          <div class="border-top">
            <div class="card-body">
              <button type="submit" id="AddStudent" name="SubmitEnroll" class="btn btn-primary"><i class="fa fa-check"></i> Submit Enrollment</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End of student modal -->

<div class="modal fade" id="StudentSchedule" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded modal-xl"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title font-weight-bold" id="editEmployeeLabel"><i class="fas fa-pencil-alt"></i> Update Faculty Record</h6>
        <button type="button" onclick="javascript:window.location.reload()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form class="add-new-post" id="employeeform" action="" method="post" enctype='multipart/form-data'>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">First Name : </label>
            <div class="col-sm-9">
              <input class="form-control form-control-lg mb-3" type="text" name="fname" id="efname" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">Last Name : </label>
            <div class="col-sm-9">
              <input class="form-control form-control-lg mb-3" type="text" name="lname" id="elname" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">Title : </label>
            <div class="col-sm-9">
              <input class="form-control form-control-lg mb-3" type="text" name="title" id="etitle" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">Education : </label>
            <div class="col-sm-9">
              <input class="form-control form-control-lg mb-3" type="text" name="educ" id="eeduc" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">Office/School : </label>
            <div class="col-sm-9">
              <input class="form-control form-control-lg mb-3" type="text" name="ofc" id="eofc" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">Email : </label>
            <div class="col-sm-9">
              <input class="form-control form-control-lg mb-3" type="email" name="email" id="eemail" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">Contact No. : </label>
            <div class="col-sm-9">
              <input class="form-control form-control-lg mb-3" type="text" name="con" id="econ" required onkeypress="return onlyNumberKey(event)" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11">
            </div>
          </div>
          <div class="form-group row">
            <label for="psano" class="col-sm-3 text-end control-label col-form-label">Address : </label>
            <div class="col-sm-9">
              <input class="form-control form-control-lg mb-3" type="text" name="addr" id="eaddr" required>
              <input class="form-control form-control-lg mb-3" type="text" name="fid" id="eid" required>
            </div>
          </div>
          <div class="form-group row">
            <button class="btn btn-sm btn-info float-right" id="UpdateFaculty" name="UpdateFaculty" type="submit"><i class="fas fa-edit"></i> Update Faculty</button>
          </div>
        </form>
      </div>  
    </div>
  </div>
</div>

<!-- Edit Attendance Modal-->
<div class="modal fade" id="editAttendance" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title font-weight-bold" id="editEmployeeLabel"><i class="fas fa-pencil-alt"></i> Update Employee Record</h6>
        <button type="button" onclick="javascript:window.location.reload()" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="add-new-post" id="employeeform" action="" method="post" enctype='multipart/form-data'>
          <label for="eempl" class="font-weight-bold">Employee Name :</label>
          <input class="form-control form-control-lg mb-3 font-weight-bold" type="text" name="eempl" id="eempl" required readonly>
          <label for="etimein" class="font-weight-bold">Time In :</label>
          <input class="form-control form-control-lg mb-3 font-weight-bold" type="time" name="etimein" id="etimein" required>
          <label for="etimeout" class="font-weight-bold">Time Out. :</label>
          <input class="form-control form-control-lg mb-3 font-weight-bold" type="time" name="etimeout" id="etimeout" required>
          <input class="form-control form-control-lg mb-3 font-weight-bold" type="hidden" name="aid" id="aid" required>
          <button class="btn btn-sm btn-accent float-right font-weight-bold" id="UpdateAttendance" name="UpdateAttendance" type="submit"><i class="fas fa-edit"></i> Update Attendance</button>
        </form>
      </div>  
    </div>
  </div>
</div>
<!-- End of Edit Attendance Modal -->
<!-- Fetch Ca Record Modal -->
<div class="modal fade" id="caRecord">
  <div class="modal-dialog modal-lg modal-dialog-centered"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title font-weight-bold" id="editEmployeeLabel"><i class="fas fa-history"></i> CA History</h6>
        <button type="button" onclick="javascript:window.location.reload()" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="fetched-data">&nbsp;</div>
      </div>
    </div>
  </div>
</div>
<!-- End of Fetch Ca Record Modal -->
<!-- Add Employee Loan Modal-->
<div class="modal fade" id="addEmployeeLoan" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus"></i> Add New Loan</h5>
        <button type="button" onclick="javascript:window.location.reload()" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="loanresult"></div>
        <form class="add-new-post" id="employeeloanform" action="" method="post">
          <label for="empl" class="font-weight-bold">Employee Name :</label>
          <select class="form-control form-control-lg font-weight-bold mb-3" name="empl" id="empl" required>
            <?php
              include("db_connect.php");
              $q_empl = mysqli_query($conn, "SELECT * FROM $empl WHERE remarks='active' ORDER BY lname ASC");
              while($row_empl = mysqli_fetch_array($q_empl)) {
                echo "<option value='".$row_empl['eID']."'>".ucfirst($row_empl['lname']).", ".ucfirst($row_empl['fname'])."</option>";
              }
              mysqli_close($conn);
            ?>
          </select>
          <label for="l_amt" class="font-weight-bold">Loan Amount : <em>(required)</em></label>
          <div class="input-group mb-3">
            <span class="input-group-text font-weight-bold">&#8369;</span>
            <input class="form-control form-control-lg font-weight-bold text-right" type="text" name="l_amt" id="l_amt" onkeypress="return onlyNumberKey(event)" required="required">
            <span class="input-group-text font-weight-bold">.00</span>
          </div>
          <label for="l_int" class="font-weight-bold">Loan Interest : <em>(required)</em></label>
          <div class="input-group mb-3">
            <input class="form-control form-control-lg font-weight-bold" type="text" name="l_int" id="l_int" onkeypress="return onlyNumberKey(event)" required>
            <span class="input-group-text font-weight-bold">%</span>
          </div>
          <label for="l_term" class="font-weight-bold">Payment Terms : <em>(required)</em></label>
          <div class="input-group mb-3">
            <input class="form-control form-control-lg font-weight-bold" type="text" name="l_term" id="l_term" onkeypress="return onlyNumberKey(event)" required>
            <span class="input-group-text font-weight-bold">months</span>
          </div>
          <button class="btn btn-sm btn-accent float-right font-weight-bold" id="AddEmployeeLoan" name="AddEmployeeLoan" type="submit"><i class="material-icons">add_task</i> Submit Employee Loan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Edit Employee Loan Modal-->
<div class="modal fade" id="editEmployeeLoan" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title font-weight-bold" id="editEmployeeLabel"><i class="fas fa-pencil-alt"></i> Update Employee Loan</h6>
        <button type="button" onclick="javascript:window.location.reload()" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="add-new-post" id="employeeform" action="" method="post" enctype='multipart/form-data'>
          <label for="empl" class="font-weight-bold">Employee Name :</label>
          <select class="form-control form-control-lg font-weight-bold mb-3" name="empl" id="eempl" required>
            <?php
              include("db_connect.php");
              $q_empl = mysqli_query($conn, "SELECT * FROM $empl WHERE remarks='active' ORDER BY lname ASC");
              while($row_empl = mysqli_fetch_array($q_empl)) {
                echo "<option value='".$row_empl['eID']."'>".ucfirst($row_empl['lname']).", ".ucfirst($row_empl['fname'])."</option>";
              }
              mysqli_close($conn);
            ?>
          </select>
          <label for="e_amt" class="font-weight-bold">Loan Amount :</label>
          <div class="input-group mb-3">
            <span class="input-group-text font-weight-bold">&#8369;</span>
            <input class="form-control form-control-lg font-weight-bold text-right" type="text" name="e_amt" id="eamt" required onkeypress="return onlyNumberKey(event)">
            <span class="input-group-text font-weight-bold">.00</span>
          </div>
          <label for="e_int" class="font-weight-bold">Loan Interest :</label>
          <div class="input-group mb-3">
            <input class="form-control form-control-lg font-weight-bold" type="text" name="e_int" id="eint" required onkeypress="return onlyNumberKey(event)">
            <span class="input-group-text font-weight-bold">%</span>
          </div>
          <label for="e_term" class="font-weight-bold">Payment Terms :</label>
          <div class="input-group mb-3">
            <input class="form-control form-control-lg font-weight-bold" type="text" name="e_term" id="eterm" required onkeypress="return onlyNumberKey(event)">
            <input class="form-control form-control-lg font-weight-bold" type="hidden" name="elid" id="elid" required onkeypress="return onlyNumberKey(event)">
            <span class="input-group-text font-weight-bold">months</span>
          </div>
          <button class="btn btn-sm btn-accent float-right font-weight-bold" id="UpdateEmployeeLoan" name="UpdateEmployeeLoan" type="submit"><i class="fas fa-edit"></i> Update Employee Loan</button>
        </form>
      </div>  
    </div>
  </div>
</div>
<!-- Fetch Ca Record Modal -->
<div class="modal fade" id="loanRecord" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered"  role="document" style="min-width:65%;">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title font-weight-bold" id="editEmployeeLabel"><i class="fas fa-history"></i> Loan History</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="fetched-loan">&nbsp;</div>
      </div>
    </div>
  </div>
</div>
<!-- End of Fetch Ca Record Modal -->