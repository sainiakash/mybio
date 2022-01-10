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
                    <h2>Add Subscription Plan</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" novalidate="" action="<?php echo base_url('addsubscription'); ?>" enctype="multipart/form-data">
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Type<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name="type">
                            <option value="" selected disabled>Choose Type</option>
                            <option value="Monthly">Monthly</option>
                            <option value="Quaterly">Quaterly</option>
                            <option value="Anually">Anually</option>
                          </select>
                          <div class="text text-danger"><?php echo form_error('type'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Price<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" value="<?php echo set_value('price'); ?>" class="form-control" placeholder="Price" name="price">
                          <div class="text text-danger"><?php echo form_error('price'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Description<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea name="description" class="form-control" placeholder="Description">
                            <?php echo set_value('description'); ?>
                          </textarea>
                          <div class="text text-danger">
                            <?php echo form_error('description'); ?>
                          </div>
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
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button class="btn btn-primary" type="submit">Cancel</button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <input type="submit" class="btn btn-success" name="addsubscription" value="Submit">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <!-- /top tiles -->
          <?php $this->load->view('admin/footer-include'); ?>
          <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js">
          </script>
          <script>
            CKEDITOR.replace('description');
          </script>