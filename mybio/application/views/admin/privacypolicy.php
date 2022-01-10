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
                    <h2>Privacy Policy</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" novalidate="" action="<?php echo base_url('updateprivacypolicy/').$privacy->pp_id; ?>">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Language<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name="language">
                            <option value="<?php echo $privacy->pp_language; ?>" selected><?php echo $privacy->pp_language; ?></option>
                            <option value="EN">EN</option>
                            <option value="KR">KR</option>
                          </select>
                          <div class="text text-danger"><?php echo form_error('language'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Message<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea name="message" class="form-control"><?php echo $privacy->pp_message; ?></textarea>
                          <div class="text text-danger">
                            <?php echo form_error('message'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <input class="btn btn-primary" type="submit" value="Cancel">
                          <input class="btn btn-primary" type="reset" value="Reset">
                          <input type="submit" class="btn btn-success" name="updateprivacypolicy" value="Submit">
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
         <?php $this->load->view('admin/footer'); ?>
      </div>
    </div>