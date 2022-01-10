<?php $this->load->view('admin/header'); ?>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <?php $this->load->view('admin/sidebar'); ?>
      </div>
      <!-- top navigation -->
      <div class="top_nav">
        <?php $this->load->view('admin/top-header'); ?>
      </div>
      <div class="right_col" role="main">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <?php
            if(!empty($this->session->flashdata('success')))
            {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?php echo $this->session->flashdata('success'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;
                </span>
              </button>
            </div>
            <?php
            }
            ?>
            <div class="x_panel">
              <div class="x_title">
                <h2>Add Branch
                </h2>
                <div class="clearfix">
                </div>
              </div>
              <div class="x_content">
                <br>
                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" novalidate="" action="<?php echo base_url('addbranch'); ?>">
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
                            <option value="" selected disabled>Choose Language
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
                          <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo set_value('name'); ?>">
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
                          <input type="email" name="email" placeholder="Email" class="form-control" value="<?php echo set_value('email'); ?>">
                          <div class="text text-danger">
                            <?php echo form_error('email'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align text-left" for="first-name">Password
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="text" class="form-control" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>">
                          <div class="text text-danger">
                            <?php echo form_error('password'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align text-left" for="last-name">SSN
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="text" name="ssn" placeholder="SSN" class="form-control" value="<?php echo set_value('ssn'); ?>">
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
                          <input type="file" name="ssn_image" class="form-control" value="">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align text-left" for="last-name">Profile Picture
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="file" name="profile" class="form-control" value="">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align text-left" for="last-name">Telephone
                          <span class="required">*
                          </span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                          <input type="text" name="telephone" placeholder="Telephone" class="form-control" value="<?php echo set_value('telephone'); ?>">
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
                          <input type="text" name="account_number" placeholder="Account Number" class="form-control" value="<?php echo set_value('account_number'); ?>">
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
                          <input type="text" name="routing_number" placeholder="Routing Number" class="form-control" value="<?php echo set_value('routing_number'); ?>">
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
                          <input type="text" name="account_name" placeholder="Account Name" class="form-control" value="<?php echo set_value('account_name'); ?>">
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
                          <input type="text" name="account_mobile_number" placeholder="Account Mobile Number" class="form-control" value="<?php echo set_value('account_mobile_number'); ?>">
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
                          <input type="text" class="form-control" placeholder="Street" name="street" value="<?php echo set_value('street'); ?>">
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
                          <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo set_value('city'); ?>">
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
                          <input type="text" class="form-control" placeholder="State" name="state" value="<?php echo set_value('state'); ?>">
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
                          <input type="text" class="form-control" placeholder="Country" name="country" value="<?php echo set_value('country'); ?>">
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
                          <input type="text" class="form-control" placeholder="Postal Code" name="postalcode" value="<?php echo set_value('postalcode'); ?>">
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
                      <input type="submit" class="btn btn-primary" value="Cancel">
                      <input type="reset" class="btn btn-primary" value="Reset">
                      <input type="submit" class="btn btn-success" name="addbranch" value="Submit">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php $this->load->view('admin/footer'); ?>
    </div>
  </div>
