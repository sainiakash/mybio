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
        <span aria-hidden="true">&times;
        </span>
      </button>
    </div>
    <?php
    }
    ?>
    <div class="x_panel">
      <div class="x_title">
        <h2>Edit Testimonial
        </h2>
        <div class="clearfix">
        </div>
      </div>
      <div class="x_content">
        <br>
        <?php
        $lang = $this->uri->segment('3');
        if($lang=='EN')
        {
        ?>
        <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" novalidate="" action="<?php echo base_url('updatetestimonial/').$testimonial->tm_id.'/'.$lang; ?>" enctype="multipart/form-data">
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Language
              <span class="required">*
              </span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <select class="form-control" name="language">
                <option value="<?php echo $testimonial->tm_language; ?>" selected><?php echo $testimonial->tm_language; ?>
                </option>
                <option value="EN">EN
                </option>
                <option value="KR">KR
                </option>
              </select>
              <div class="text text-danger">
                <?php echo form_error('language'); ?>
              </div>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name
              <span class="required">*
              </span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" value="<?php echo $testimonial->tm_name; ?>" class="form-control" name="name">
              <div class="text text-danger">
                <?php echo form_error('name'); ?>
              </div>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Message
              <span class="required">*
              </span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <textarea name="message" class="form-control">
                <?php echo $testimonial->tm_message; ?>
              </textarea>
              <div class="text text-danger">
                <?php echo form_error('message'); ?>
              </div>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Order
              <span class="required">*
              </span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" name="order" class="form-control" value="<?php echo $testimonial->tm_order; ?>">
              <div class="text text-danger">
                <?php echo form_error('order'); ?>
              </div>
            </div>
          </div>
          <div class="ln_solid">
          </div>
          <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
              <button class="btn btn-primary" type="submit">Cancel
              </button>
              <button class="btn btn-primary" type="reset">Reset
              </button>
              <input type="submit" class="btn btn-success" name="updatetestimonial" value="Submit">
            </div>
          </div>
        </form>
        <?php
      }
        elseif($lang=='KR')
        {
          ?>
          <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" novalidate="" action="<?php echo base_url('updatetestimonial/').$testimonial->tm_kr_id.'/'.$lang; ?>" enctype="multipart/form-data">
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Language
              <span class="required">*
              </span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <select class="form-control" name="language">
                <option value="<?php echo $testimonial->tm_kr_language; ?>" selected><?php echo $testimonial->tm_kr_language; ?>
                </option>
                <option value="EN">EN
                </option>
                <option value="KR">KR
                </option>
              </select>
              <div class="text text-danger">
                <?php echo form_error('language'); ?>
              </div>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name
              <span class="required">*
              </span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" value="<?php echo $testimonial->tm_kr_name; ?>" class="form-control" name="name">
              <div class="text text-danger">
                <?php echo form_error('name'); ?>
              </div>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Message
              <span class="required">*
              </span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <textarea name="message" class="form-control">
                <?php echo $testimonial->tm_kr_message; ?>
              </textarea>
              <div class="text text-danger">
                <?php echo form_error('message'); ?>
              </div>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Order
              <span class="required">*
              </span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" name="order" class="form-control" value="<?php echo $testimonial->tm_kr_order; ?>">
              <div class="text text-danger">
                <?php echo form_error('order'); ?>
              </div>
            </div>
          </div>
          <div class="ln_solid">
          </div>
          <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
              <button class="btn btn-primary" type="submit">Cancel
              </button>
              <button class="btn btn-primary" type="reset">Reset
              </button>
              <input type="submit" class="btn btn-success" name="updatetestimonial" value="Submit">
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
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js">
</script>
<script>
  CKEDITOR.replace('message');
</script>
