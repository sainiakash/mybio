<?php
$this->load->view('home/header1');
?>
<div class="container-fluid">
  <div class="sing-in-area">
    <div class="container padding">
      <div class="row">
        <div class="col-md-12  col-lg-8 offset-lg-2">
          <div class="sing-log text-center mb-4">
            <img src="<?= base_url()?>assets/images/logo.png"  alt="">
          </div>
          <div class="sign-area">
            <div class="sign-back">
              <a href="<?php echo base_url('signin'); ?>">
                <i class="fas fa-long-arrow-alt-left">
                </i>
              </a>
            </div>
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
            <div class="sign-heading mb-3 text-center">
              <h6>Register
              </h6>
            </div>
            <form action="<?php echo base_url('register-post'); ?>" method="POST">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="sign-input">
                    <select name="language" class="form-control">
                      <option value="" selected disabled>Select Language</option>
                      <option value="EN">English</option>
                      <option value="KR">South Korean</option>
                    </select>
                    <div class="text text-danger">
                      <?php echo form_error('language'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="sign-input">
                    <input type="text" placeholder="Name" name="name" value="<?php echo set_value('name'); ?>">
                    <div class="text text-danger">
                      <?php echo form_error('name'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="sign-input">
                    <input type="email" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>">
                    <div class="text text-danger">
                      <?php echo form_error('email'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="sign-input">
                    <input type="text" placeholder="Phone Number" name="phone" value="<?php echo set_value('phone'); ?>">
                    <div class="text text-danger">
                      <?php echo form_error('phone'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="sign-input">
                    <input type="password" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>">
                    <div class="text text-danger">
                      <?php echo form_error('password'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="sign-input">
                    <input type="text" placeholder="Street Address" name="street_address" value="<?php echo set_value('street_address'); ?>">
                    <div class="text text-danger">
                      <?php echo form_error('street_address'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="sign-input">
                    <input type="text" placeholder="City" name="city" value="<?php echo set_value('city'); ?>">
                    <div class="text text-danger">
                      <?php echo form_error('city'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="sign-input">
                    <input type="text" placeholder="State" name="state" value="<?php echo set_value('state'); ?>">
                    <div class="text text-danger">
                      <?php echo form_error('state'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="sign-input">
                    <input type="text" placeholder="Postal Code" name="code" value="<?php echo set_value('code'); ?>">
                    <div class="text text-danger">
                      <?php echo form_error('code'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="sign-input">
                    <input type="text" placeholder="Country" name="country" value="<?php echo set_value('country'); ?>">
                    <div class="text text-danger">
                      <?php echo form_error('country'); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="sign-btn" style="text-align: center;">
                <input type="submit" name="register" value="Register" class="btn btn-success w-100">
              </div>
            </form>
            <div class="register text-center">
              <span>Already have an account? 
                <a href="<?php echo base_url('signin'); ?>">Sign In
                </a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('home/footer'); ?>
