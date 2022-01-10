<?php $this->load->view('branch/header-include'); ?>
          <!-- top tiles -->
          <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Change Appointment Status</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" novalidate="" action="<?php echo base_url('branch-change-appointmentstatus/').$appointment->ap_id; ?>">

                      <?php

                      if($appointment->ap_status=='0')
                        {
                      ?>

                        <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Order Status<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name="status">
                            <option >Choose Appointment Status</option>
                            <option value="1" >Appointment Confirm</option>
                            <option value="3">Appointment Cancel</option>
                          </select>
                        </div>
                      </div>
                      <?php
                      }
                      elseif ($appointment->ap_status=='1') 
                      {
                        ?>
                        <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Order Status<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name="status">
                            <option >Choose Appointment Status</option>
                            <option value="2">Appointment Processing</option>
                            <option value="3">Appointment Cancel</option>
                          </select>
                        </div>
                      </div>

                      <?php

                      }
                      elseif ($appointment->ap_status=='2')
                      {

                      ?>
                         <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Order Status<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name="status">
                            <option >Choose Appointment Status</option>
                            <option value="3">Appointment Cancel</option>
                            <option value="4">Appointment Completed</option>
                          </select>
                        </div>
                      </div>

                      <?php

                      }                     
                      else
                      {
                        echo "";

                      }
                       
                      ?>

                     <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <input type="submit" class="btn btn-success" name="changeappointmentstatus" value="Submit">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <!-- /top tiles -->

          <?php $this->load->view('branch/footer-include'); ?>