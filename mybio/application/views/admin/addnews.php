<?php $this->load->view('admin/header'); ?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <?php $this->load->view('admin/sidebar');
          ?>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <?php $this->load->view('admin/top-header');
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
                    <h2>Add News</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" novalidate="" action="<?php echo base_url('addnews'); ?>">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Language<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name="language">
                            <option value="" selected disabled>Choose Language</option>
                            <option value="EN">EN</option>
                            <option value="KR">KR</option>
                          </select>
                          <div class="text text-danger"><?php echo form_error('language'); ?></div>
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Category<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name="category">
                            <option selected disabled value="">Choose Category</option>
                            <?php
                            foreach($category as $values)
                            {
                              ?>
                              <option value="<?php echo $values['c_id']; ?>"><?php echo $values['c_name']; ?></option>
                              <?php
                            }
                            ?>
                          </select>
                           <div class="text text-danger">
                            <?php echo form_error('category'); ?>
                          </div>
                        </div>
                      </div>                      
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Short Description<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea name="shortdescription" class="form-control"><?php echo set_value('shortdescription'); ?></textarea>
                          <div class="text text-danger">
                            <?php echo form_error('shortdescription'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Long Description<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea name="longdescription" class="form-control"><?php echo set_value('longdescription'); ?></textarea>
                          <div class="text text-danger">
                            <?php echo form_error('longdescription'); ?>
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
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <input type="submit" class="btn btn-primary" value="Cancel">
                          <input type="reset" class="btn btn-primary" value="Reset">
                          <input type="submit" class="btn btn-success" name="addnews" value="Submit">
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
            CKEDITOR.replace('shortdescription');
            CKEDITOR.replace('longdescription');
          </script>
         <?php $this->load->view('admin/footer'); ?>
      </div>
    </div>