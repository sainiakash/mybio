<?php $this->load->view('branch/header-include'); ?>

             <div class="row">
              <div class="col-md-12 col-sm-12">
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
                ?>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Profile</h2>
                    <div class="clearfix"></div>
                  </div>
                     <div class="x_content">
                <br>
                  <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" novalidate="" action="<?php echo base_url('branch-update-profile/').$profile->b_id; ?>">
                  <div class="row">
                    <div class="col-md-6">
                      <h2>Basic Information
                      </h2>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align text-left" for="last-name">Language
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-12 ">
                          <select class="form-control" name="language">
                            <option value="<?php echo $profile->b_language; ?>" selected><?php echo $profile->b_language; ?>
                            </option>
                            <option value="EN">EN
                            </option>
                            <option value="KR">KR
                            </option>
                          </select>
                          <div class="text text-danger">
                            <?php echo form_error('language'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align  text-left" for="first-name">Name
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $profile->b_name; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('name'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align text-left" for="last-name">Email
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="email" name="email" placeholder="Email" class="form-control" value="<?php echo $profile->b_email; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('email'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align text-left" for="last-name">SSN
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="text" name="ssn" placeholder="SSN" class="form-control" value="<?php echo $profile->b_ssn; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('ssn'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align text-left" for="last-name">SSN Image
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="file" name="ssn_image" class="form-control" value="<?php echo $profile->b_ssn_image; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align text-left" for="last-name">Profile Picture
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="file" name="profile" class="form-control" value="<?php echo $profile->b_image; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align text-left" for="last-name">Telephone
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="text" name="telephone" placeholder="Telephone" class="form-control" value="<?php echo $profile->b_telephone; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('telephone'); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <h2>Bank Information
                      </h2>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align text-left" for="last-name">Account Number
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="text" name="account_number" placeholder="Account Number" class="form-control" value="<?php echo $profile->b_account_number; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('account_number'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align text-left" for="last-name">Routing Number
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="text" name="routing_number" placeholder="Routing Number" class="form-control" value="<?php echo$profile->b_routing_number; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('routing_number'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align text-left" for="last-name">Account Name
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="text" name="account_name" placeholder="Account Name" class="form-control" value="<?php echo $profile->b_account_name; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('account_name'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align text-left" for="last-name">Account Mobile Number
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="text" name="account_mobile_number" placeholder="Account Mobile Number" class="form-control" value="<?php echo $profile->b_account_mobile_number; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('account_mobile_number'); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 mt-2">
                      <h2>Address Information
                      </h2>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align  text-left" for="first-name">Street
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="text" class="form-control" placeholder="Street" name="street" value="<?php echo $profile->b_street; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('street'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align  text-left" for="first-name">City
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo $profile->b_city; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('city'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align  text-left" for="first-name">State
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="text" class="form-control" placeholder="State" name="state" value="<?php echo $profile->b_state; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('state'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align  text-left" for="first-name">Country
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="text" class="form-control" placeholder="Country" name="country" value="<?php echo $profile->b_country; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('country'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align  text-left" for="first-name">Postal Code
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="text" class="form-control" placeholder="Postal Code" name="postalcode" value="<?php echo $profile->b_postalcode; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('postalcode'); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="ln_solid">
                  </div>
                  <div class="item form-group text-center">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                      <input class="btn btn-primary" type="submit" value="Cancel">
                      <input type="submit" class="btn btn-success" name="updateprofile" value="Submit">
                    </div>
                  </div>
                </form>
              </div>
                </div>
              </div>
            </div>
          </div>
          <?php $this->load->view('branch/footer-include'); ?>
      </div>
    </div>