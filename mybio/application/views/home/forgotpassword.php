<?php $this->load->view('home/header1'); ?>
    <div class="container-fluid">
      <div class="sing-in-area">
        <div class="container padding">
          <div class="row">
            <div class="col-md-8 col-lg-4 offset-lg-4 offset-md-2">
              <div class="sing-log text-center mb-4">
                <img width="200px" src="<?php echo base_url('public/admin/images/mybio23-01.png'); ?>"  alt="">
              </div>
              <div class="sign-area">
                <div class="sign-back">
                  <a href="<?php echo base_url('/'); ?>">
                    <i class="fas fa-long-arrow-alt-left">
                    </i>
                  </a>
                </div>
                <form action="<?php echo base_url('forgot-post'); ?>" method="POST">
                  <?php
                  if(!empty($this->session->flashdata('danger')))
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
                  ?>
                <div class="sign-heading mb-3 text-center">
                  <h6>Forgot Password
                  </h6>
                </div>
                <div class="sign-input">
                  <input type="text" placeholder="Email ID" name="email" value="<?php echo set_value('email'); ?>">
                  <div class="text text-danger"><?php echo form_error('email'); ?></div>
                </div>
               
                <div class="sign-btn" style="text-align:center;">
              <input type="submit" name="submit" class="btn btn-success" value="Submit" >
                </div>
                <form>
                <div class="password">
                  <div class="forgot-password">
                    <a href="<?php echo base_url('signin'); ?>">Sign in!
                    </a>
                  </div>
                  <div class="forgot-password">
                    <a href="<?php echo base_url('register'); ?>">Register
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('home/footer'); ?>
