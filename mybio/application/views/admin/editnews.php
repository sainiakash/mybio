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
                ?>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit News</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <?php
                    $lang = $this->uri->segment('3');
                    if($lang=='EN')
                    {
                    ?>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" novalidate="" action="<?php echo base_url('updatenews/').$news->n_id.'/'.$lang; ?>">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Language<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name="language">
                            <option value="<?php echo $news->n_language; ?>" selected><?php echo $news->n_language; ?></option>
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
                          <input type="text" class="form-control" name="name" value="<?php echo $news->n_name; ?>">
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
                            <option selected value="<?php echo $news->c_id; ?>"><?php echo $news->c_name; ?></option>
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Long Description<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea name="longdescription" class="form-control"><?php echo $news->n_long_description; ?></textarea>
                          <div class="text text-danger">
                            <?php echo form_error('longdescription'); ?>
                          </div>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Short Description<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea name="shortdescription" class="form-control"><?php echo $news->n_short_description; ?></textarea>
                          <div class="text text-danger">
                            <?php echo form_error('shortdescription'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Image<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="file" name="image" class="form-control" value="">
                          <input type="hidden" name="image" value="<?php echo $news->n_image; ?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <input type="submit" class="btn btn-primary" value="Cancel">
                          <input type="submit" class="btn btn-success" name="updatenews" value="Submit">
                        </div>
                      </div>
                    </form>
                    <?php
                    }
                    elseif($lang=='KR')
                    {
                      ?>
                      <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" novalidate="" action="<?php echo base_url('updatenews/').$news->n_kr_id.'/'.$lang; ?>">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Language<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name="language">
                            <option value="<?php echo $news->n_kr_language; ?>" selected><?php echo $news->n_kr_language; ?></option>
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
                          <input type="text" class="form-control" name="name" value="<?php echo $news->n_kr_name; ?>">
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
                            <option selected value="<?php echo $news->c_kr_id; ?>"><?php echo $news->c_kr_name; ?></option>
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Long Description<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea name="longdescription" class="form-control"><?php echo $news->n_kr_long_description; ?></textarea>
                          <div class="text text-danger">
                            <?php echo form_error('longdescription'); ?>
                          </div>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Short Description<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea name="shortdescription" class="form-control"><?php echo $news->n_kr_short_description; ?></textarea>
                          <div class="text text-danger">
                            <?php echo form_error('shortdescription'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Image<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="file" name="image" class="form-control" value="">
                          <input type="hidden" name="image" value="<?php echo $news->n_kr_image; ?>">
                        </div>
                      </div>
                      <div class="ln_kr_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <input type="submit" class="btn btn-primary" value="Cancel">
                          <input type="submit" class="btn btn-success" name="updatenews" value="Submit">
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
            CKEDITOR.replace('shortdescription');
            CKEDITOR.replace('longdescription');
          </script>
        <?php $this->load->view('admin/footer-include'); ?>
      </div>
    </div>