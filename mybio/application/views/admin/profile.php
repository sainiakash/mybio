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
                  else
                  {
                    echo "";
                  }
                ?>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Profile</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" novalidate="" action="<?php echo base_url('updateprofile/').$profile->a_id; ?>">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control" name="name" value="<?php echo $profile->a_name; ?>">
                          <div class="text text-danger"><?php echo form_error('name'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Email<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="email" name="email" class="form-control" value="<?php echo $profile->a_email; ?>">
                          <div class="text text-danger"><?php echo form_error('email'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Mobile<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="mobile" class="form-control" value="<?php echo $profile->a_mobile; ?>">
                          <div class="text text-danger"><?php echo form_error('mobile'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Address<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea name="address" class="form-control"><?php echo $profile->a_address; ?></textarea>
                          <div class="text text-danger"><?php echo form_error('address'); ?></div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button class="btn btn-primary" type="submit">Cancel</button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <input type="submit" class="btn btn-success" name="updateprofile" value="Submit">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <!-- /top tiles -->

          <?php $this->load->view('admin/footer-include'); ?>