<?php $this->load->view('admin/header-include'); ?>
          <!-- top tiles -->
          <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Category</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <?php
                    $lang = $this->uri->segment('3');
                    if($lang=='EN')
                    {
                    ?>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" novalidate="" action="<?php echo base_url('updatecategory/').$category->c_id.'/'.$lang; ?>" enctype="multipart/form-data">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Language<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name="language">
                            <option value="<?php echo $category->c_language; ?>" selected><?php echo $category->c_language; ?></option>
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
                          <input type="text" value="<?php echo $category->c_name; ?>" class="form-control" name="name">
                          <div class="text text-danger"><?php echo form_error('name'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Type<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name="type">
                            <option value="<?php echo $category->c_type; ?>" selected><?php echo $category->c_type; ?></option>
                            <option value="Kit">Kit</option>
                            <option value="Test">Test</option>
                            <option value="Product">Product</option>
                          </select>
                          <div class="text text-danger"><?php echo form_error('type'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Image<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="file" name="image" class="form-control" value="<?php echo $category->c_image; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Order<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="order" class="form-control" value="<?php echo $category->c_order; ?>">
                          <div class="text text-danger"><?php echo form_error('order'); ?></div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button class="btn btn-primary" type="submit">Cancel</button>
                          <input type="submit" class="btn btn-success" name="updatecategory" value="Submit">
                        </div>
                      </div>
                    </form>
                    <?php
                    }
                    elseif($lang=='KR')
                    {
                      ?>
                        <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" novalidate="" action="<?php echo base_url('updatecategory/').$category->c_kr_id.'/'.$lang; ?>" enctype="multipart/form-data">
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Language<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" name="language">
                              <option value="<?php echo $category->c_kr_language; ?>" selected><?php echo $category->c_kr_language; ?></option>
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
                            <input type="text" value="<?php echo $category->c_kr_name; ?>" class="form-control" name="name">
                            <div class="text text-danger"><?php echo form_error('name'); ?></div>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Type<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" name="type">
                              <option value="<?php echo $category->c_kr_type; ?>" selected><?php echo $category->c_kr_type; ?></option>
                              <option value="Kit">Kit</option>
                              <option value="Test">Test</option>
                              <option value="Product">Product</option>
                            </select>
                            <div class="text text-danger"><?php echo form_error('type'); ?></div>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Image<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="file" name="image" class="form-control" value="<?php echo $category->c_kr_image; ?>">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Order<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="order" class="form-control" value="<?php echo $category->c_kr_order; ?>">
                            <div class="text text-danger"><?php echo form_error('order'); ?></div>
                          </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                          <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-primary" type="submit">Cancel</button>
                            <input type="submit" class="btn btn-success" name="updatecategory" value="Submit">
                          </div>
                        </div>
                      </form>
                      <?php
                    }
                    else
                    {
                      echo "";
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          <!-- /top tiles -->

          <?php $this->load->view('admin/footer-include'); ?>