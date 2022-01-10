<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyBio23</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url('public/admin/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('public/admin/vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('public/admin/vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url('public/admin/vendors/animate.css/animate.min.css'); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('public/admin/build/css/custom.min.css'); ?>" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
       <div class="logo-top">
          <img src="<?php echo base_url('public/admin/logo.png') ?>">
        </div> 
        <div class="animate form login_form">
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
          <section class="login_content">
            <form method="POST" action="<?php echo base_url('login'); ?>">
              <h1>Verify OTP</h1>
              <div>
                <input type="text" class="form-control" placeholder="Enter OTP" name="otp" value="<?php echo set_value('otp'); ?>">
                <div class="text text-danger"><?php echo form_error('otp'); ?></div>
              </div>
              <div style="width: 100%; text-align: center;">
                <input type="submit" class="btn btn-default submit" value="Submit" name="submit" style="background-color: transparent; color: #73879c; float: none; margin: 0px; border: 1px solid gray;">
              </div>
              <div class="clearfix"></div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
