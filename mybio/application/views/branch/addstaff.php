<?php $this->load->view('branch/header'); ?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <?php $this->load->view('branch/sidebar');
          ?>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
          <?php $this->load->view('branch/top-header');
          ?>
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
                          <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php
                  }
                ?>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Staff</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" novalidate="" action="<?php echo base_url('branch-add-staff'); ?>">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Language<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name="language">
                            <option value="" selected disabled>Choose Language</option>
                            <option value="EN">EN</option>
                            <option value="KR">KR</option>
                          </select>
                          <div class="text text-danger">
                            <?php echo form_error('language'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Staff Id<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control" placeholder="Staff Id" name="staff_id" value="<?php echo set_value('staff_id'); ?>">
                           <div class="text text-danger">
                            <?php echo form_error('staff_id'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Image<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="file" name="image" class="form-control" value="">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo set_value('name'); ?>">
                           <div class="text text-danger">
                            <?php echo form_error('name'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Email<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="email" name="email" placeholder="Email" class="form-control" value="<?php echo set_value('email'); ?>">
                          <div class="text text-danger"><?php echo form_error('email'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Phone<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="phone" placeholder="Phone" class="form-control" value="<?php echo set_value('phone'); ?>">
                          <div class="text text-danger"><?php echo form_error('phone'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">DOB<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input class="form-control" type="date" name="dob" value="<?php echo set_value('dob'); ?>">
                          <div class="text text-danger">
                            <?php echo form_error('dob'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Position<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text"  class="form-control" placeholder="Position" name="position" value="<?php echo set_value('position'); ?>">
                           <div class="text text-danger">
                            <?php echo form_error('position'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Degree<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text"  class="form-control" placeholder="Degree" name="degree" value="<?php echo set_value('degree'); ?>">
                           <div class="text text-danger">
                            <?php echo form_error('degree'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Degree Image<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="file" name="degree_image" class="form-control" value="">
                        </div>
                      </div>  
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Experience<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text"  class="form-control" placeholder="Experience" name="experience" value="<?php echo set_value('experience'); ?>">
                           <div class="text text-danger">
                            <?php echo form_error('experience'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">SSN<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text"  class="form-control" placeholder="SSN" name="ssn" value="<?php echo set_value('ssn'); ?>">
                           <div class="text text-danger">
                            <?php echo form_error('ssn'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <input type="submit" class="btn btn-primary" value="Cancel">
                          <input type="submit" class="btn btn-primary" value="Reset">
                          <input type="submit" class="btn btn-success" name="addstaff" value="Submit">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
         <?php $this->load->view('branch/footer'); ?>
      </div>
    </div>