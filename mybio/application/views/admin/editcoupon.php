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
                    <h2>Edit Coupon</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <?php
                    $lang = $this->uri->segment('3');
                    if($lang=='EN')
                    {
                    ?>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" novalidate="" action="<?php echo base_url('updatecoupon/').$coupon->co_id.'/'.$lang; ?>">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Language<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name="language">
                            <option value="<?php echo $coupon->co_language; ?>" selected><?php echo $coupon->co_language; ?></option>
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
                          <input type="text" class="form-control" name="name" value="<?php echo $coupon->co_name; ?>">
                           <div class="text text-danger">
                            <?php echo form_error('name'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Code<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input class="form-control" type="text" name="code" value="<?php echo $coupon->co_code; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('code'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Coupon Type<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input class="form-control" type="text" name="coupon_type" value="<?php echo $coupon->co_coupon_type; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('coupon_type'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Description<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea name="description" class="form-control"><?php echo $coupon->co_description; ?></textarea>
                          <div class="text text-danger">
                            <?php echo form_error('description'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Start Date<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                         <input type="date" name="start_date" class="form-control" value="<?php echo $coupon->co_start_date; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('start_date'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Expiry Date<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                         <input type="date" name="expiry_date" class="form-control" value="<?php echo $coupon->co_expiry_date; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('expiry_date'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <input type="submit" class="btn btn-primary" value="Cancel">
                          <input type="submit" class="btn btn-success" name="updatecoupon" value="Submit">
                        </div>
                      </div>
                    </form>
                    <?php
                    }
                    elseif($lang=='KR')
                    {
                      ?>
                      <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" novalidate="" action="<?php echo base_url('updatecoupon/').$coupon->co_kr_id.'/'.$lang; ?>">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Language<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name="language">
                            <option value="<?php echo $coupon->co_kr_language; ?>" selected><?php echo $coupon->co_kr_language; ?></option>
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
                          <input type="text" class="form-control" name="name" value="<?php echo $coupon->co_kr_name; ?>">
                           <div class="text text-danger">
                            <?php echo form_error('name'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Code<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input class="form-control" type="text" name="code" value="<?php echo $coupon->co_kr_code; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('code'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Coupon Type<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <input class="form-control" type="text" name="coupon_type" value="<?php echo $coupon->co_kr_coupon_type; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('coupon_type'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Description<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea name="description" class="form-control"><?php echo $coupon->co_kr_description; ?></textarea>
                          <div class="text text-danger">
                            <?php echo form_error('description'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Start Date<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                         <input type="date" name="start_date" class="form-control" value="<?php echo $coupon->co_kr_start_date; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('start_date'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Expiry Date<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                         <input type="date" name="expiry_date" class="form-control" value="<?php echo $coupon->co_kr_expiry_date; ?>">
                          <div class="text text-danger">
                            <?php echo form_error('expiry_date'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <input type="submit" class="btn btn-primary" value="Cancel">
                          <input type="submit" class="btn btn-success" name="updatecoupon" value="Submit">
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
            CKEDITOR.replace( 'description' );
          </script>
        <?php $this->load->view('admin/footer-include'); ?>
      </div>
    </div>