<?php $this->load->view('home/header1'); ?>
<div class="other-page">
  <div class="other-heading text-center text-white">
    <h1>Change Password
    </h1>
    <p>Home / Change Password
    </p>
  </div>
</div>
</div>
</div>
<div class="container-fluid">
  <div class="my-page">
    <div class="container padding">
      <div class="row ">
        <?php $this->load->view('home/sidebar');?>
        <div class="col-lg-0">
        </div>
        <div class="col-md-6 col-lg-7">
        	<h4 class="text-left ">Change Password
          </h4>
          <hr class="green-hr">
          <?php
          if(!empty($this->session->flashdata('success')))
          {
          ?>
            <div class="container">
              <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: white; border: 1px solid lightgray;border-left: 3px solid #70b544; border-radius: 0 !important; color: black;">
                <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
          <?php
          }
          ?>
          <div class="col-md-12 box2 ">
            <form action="<?php echo base_url('user-change-password-post/').$profile->u_id; ?>" method="POST">
              <div class="sign-input">
                <input type="password" placeholder="Current Password" name="current" value="<?php echo set_value('current'); ?>">
                <div class="text text-danger">
                  <?php echo form_error('current'); ?>
                </div>
              </div>
              <div class="sign-input">
                <input type="password" placeholder="New Password" name="new" value="<?php echo set_value('new'); ?>">
                <div class="text text-danger">
                  <?php echo form_error('new'); ?>
                </div>
              </div>
              <div class="sign-input">
                <input type="password" placeholder="Confirm Password" name="confirm" value="<?php echo set_value('confirm'); ?>">
                <div class="text text-danger">
                  <?php echo form_error('confirm'); ?>
                </div>
              </div>
              <div class="sign-btn" >
                <input type="submit" name="changepassword" value="Change Password" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> 
</div>
<div class="container-fluid">
</div>
<?php $this->load->view('home/footer'); ?>

