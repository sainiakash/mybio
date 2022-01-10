<?php $this->load->view('admin/header-include'); ?>

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

                  echo validation_errors();
                ?>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Kit</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <?php
                    $lang = $this->uri->segment('3');
                    if($lang=='EN')
                    {
                    ?>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" novalidate="" action="<?php echo base_url('updatekit/').$kit->k_id.'/'.$lang; ?>">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Language<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name="language">
                            <option value="<?php echo $kit->k_language; ?>" selected><?php echo $kit->k_language; ?></option>
                            <option value="EN">EN</option>
                            <option value="KR">KR</option>
                          </select>
                          <div class="text text-danger"><?php echo form_error('language'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Code<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control" placeholder="Code" name="code" value="<?php echo $kit->k_code; ?>">
                           <div class="text text-danger">
                            <?php echo form_error('code'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control" name="name" value="<?php echo $kit->k_name; ?>">
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
                            <option selected value="<?php echo $kit->c_id; ?>"><?php echo $kit->c_name; ?></option>
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
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Price<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input class="form-control" type="text" name="price" value="<?php echo $kit->k_price; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('price'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Description<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea name="description" class="form-control"><?php echo $kit->k_description; ?></textarea>
                          <div class="text text-danger">
                            <?php echo form_error('description'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Preparation<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea name="preparation" class="form-control"><?php echo $kit->k_preparation; ?></textarea>
                          <div class="text text-danger">
                            <?php echo form_error('preparation'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Test Result<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea name="test_result" class="form-control"><?php echo $kit->k_test_result; ?></textarea>
                          <div class="text text-danger">
                            <?php echo form_error('test_result'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">MRP<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input class="form-control" type="text" name="mrp" value="<?php echo $kit->k_mrp; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('mrp'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Image<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="file" name="image" class="form-control" value="">
                          <input type="hidden" name="image" value="<?php echo $kit->k_image; ?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <input type="submit" class="btn btn-primary" value="Cancel">
                          <input type="submit" class="btn btn-success" name="updatekit" value="Submit">
                        </div>
                      </div>
                    </form>
                    <?php
                    }
                    elseif($lang=='KR')
                    {
                      ?>
                      <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" novalidate="" action="<?php echo base_url('updatekit/').$kit->k_kr_id.'/'.$lang; ?>">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Language<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name="language">
                            <option value="<?php echo $kit->k_kr_language; ?>" selected><?php echo $kit->k_kr_language; ?></option>
                            <option value="EN">EN</option>
                            <option value="KR">KR</option>
                          </select>
                          <div class="text text-danger"><?php echo form_error('language'); ?></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Code<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control" placeholder="Code" name="code" value="<?php echo $kit->k_kr_code; ?>">
                           <div class="text text-danger">
                            <?php echo form_error('code'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" class="form-control" name="name" value="<?php echo $kit->k_kr_name; ?>">
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
                            <option selected value="<?php echo $kit->c_kr_id; ?>"><?php echo $kit->c_kr_name; ?></option>
                            <?php
                            foreach($category as $values)
                            {
                              ?>
                              <option value="<?php echo $values['c_kr_id']; ?>"><?php echo $values['c_kr_name']; ?></option>
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
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Price<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input class="form-control" type="text" name="price" value="<?php echo $kit->k_kr_price; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('price'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Description<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea name="description" class="form-control"><?php echo $kit->k_kr_description; ?></textarea>
                          <div class="text text-danger">
                            <?php echo form_error('description'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Preparation<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea name="preparation" class="form-control"><?php echo $kit->k_kr_preparation; ?></textarea>
                          <div class="text text-danger">
                            <?php echo form_error('preparation'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Test Result<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea name="test_result" class="form-control"><?php echo $kit->k_kr_test_result; ?></textarea>
                          <div class="text text-danger">
                            <?php echo form_error('test_result'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">MRP<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input class="form-control" type="text" name="mrp" value="<?php echo $kit->k_kr_mrp; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('mrp'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Image<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="file" name="image" class="form-control" value="">
                          <input type="hidden" name="image" value="<?php echo $kit->k_kr_image; ?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <input type="submit" class="btn btn-primary" value="Cancel">
                          <input type="submit" class="btn btn-success" name="updatekit" value="Submit">
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
          </div>
          <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
          <script>
            CKEDITOR.replace('description');
            CKEDITOR.replace('preparation');
            CKEDITOR.replace('test_result');
          </script>
         <?php $this->load->view('admin/footer-include'); ?>
      </div>
    </div>