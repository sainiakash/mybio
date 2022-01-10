<?php $this->load->view('admin/header-include'); ?>
          <!-- top tiles -->
          <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <?php
                if(!empty($this->session->flashdata('success')))
                {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?php echo $this->session->flashdata('success'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php
                }
                elseif(!empty($this->session->flashdata('danger')))
                {
                  ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <?php echo $this->session->flashdata('danger'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                  <?php
                }
                elseif(!empty($this->session->flashdata('warning')))
                {
                  ?>
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <?php echo $this->session->flashdata('warning'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                  <?php
                }
                else
                {
                  echo "";
                }
                ?>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Change Password</h2>
                   <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="<?php echo base_url('changepassword/').$profile->a_id; ?>">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Old Password<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control" placeholder="Current Password" name="old" value="<?php echo set_value('old'); ?>">
                          <div class="text text-danger"><?php echo form_error('old'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">New Password<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="new" class="form-control" placeholder="New Password" value="<?php echo set_value('new'); ?>">
                          <div class="text text-danger"><?php echo form_error('new'); ?></div>
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Confirm Password<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="confirm" class="form-control" placeholder="Confirm Password" value="<?php echo set_value('confirm'); ?>">
                          <div class="text text-danger"><?php echo form_error('confirm'); ?></div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <input type="submit" class="btn btn-primary" value="Cancel">
                          <input type="reset" class="btn btn-primary" value="Reset">
                          <input type="submit" class="btn btn-success" name="changepassword" value="Submit">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <!-- /top tiles -->

          <?php $this->load->view('admin/footer-include'); ?>