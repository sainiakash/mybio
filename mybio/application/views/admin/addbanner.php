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
                ?>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Banner</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="<?php echo base_url('addbanner'); ?>" enctype="multipart/form-data">
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
                          <div class="text text-danger"><?php echo form_error('name'); ?></div>
                        </div>
                      </div> 
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Order<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="order" class="form-control" placeholder="Order" value="<?php echo set_value('order'); ?>">
                          <div class="text text-danger"><?php echo form_error('order'); ?></div>
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Type<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="type" class="form-control" placeholder="Type" value="<?php echo set_value('type'); ?>">
                          <div class="text text-danger"><?php echo form_error('type'); ?></div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <input type="submit" class="btn btn-primary" value="Cancel">
                          <input type="reset" class="btn btn-primary" value="Reset">
                          <input type="submit" class="btn btn-success" name="addbanner" value="Submit">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <!-- /top tiles -->

          <?php $this->load->view('admin/footer-include'); ?>