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
                    <h2>Add Ticket</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" novalidate="" action="<?php echo base_url('branch-add-ticket'); ?>">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Title<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control" placeholder="Title" name="title" value="<?php echo set_value('title'); ?>">
                           <div class="text text-danger">
                            <?php echo form_error('title'); ?>
                          </div>
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Message<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea name="message" class="form-control"><?php echo set_value('message'); ?></textarea>
                          <div class="text text-danger">
                            <?php echo form_error('message'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <input type="submit" class="btn btn-primary" value="Cancel">
                          <input type="reset" class="btn btn-primary" value="Reset">
                          <input type="submit" class="btn btn-success" name="addticket" value="Submit">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
          <script>
            CKEDITOR.replace( 'message' );
          </script>
         <?php $this->load->view('branch/footer'); ?>
      </div>
    </div>