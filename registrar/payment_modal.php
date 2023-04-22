<div class="modal fade" id="exampleModalCenter<?php echo $row_student['studID'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">Payment Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card bg-white">
          <div class="row">
            <form class="form col-md-6 h5" method="post" action="">
              <div class="card-body">
                <div class="mb-3 row">
                  <label for="pmt" class="col-sm-3 text-end control-label col-form-label">Enter Amount</label>
                  <div class="col-sm-9">
                    <input type="number" name="pmt" class="form-control fs-5" id="pmt" required />
                    <input type="hidden" name="sid" class="form-control fs-5" id="sid" required value="<?php echo $row_student['studID'];?>" />
                  </div>
                </div>
                <div class="mb-3 row">
                  <button type="submit" name="SubmitPayment" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Submit Payment</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>