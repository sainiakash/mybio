<?php $this->load->view('home/header1'); ?>
<style type="text/css">
  .sign-input select{
    width: 100%;
    margin-bottom: 20px;
    padding: 10px 20px;
    background-color: rgb(248, 248, 248);
    border: 1px solid #70b544;
    border-radius: 5px;
    box-shadow: var(--shadow);
  }
  select.form-control:not([size]):not([multiple]) {
    height: calc(2.25rem + 9px);
  }
</style>
<div class="other-page">
  <div class="other-heading text-center  text-white">
    <h1>Edit Profile
    </h1>
    <p>Home / Edit Profile
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
        <div class="col-md-6 m-auto col-lg-7 ">
          <div class="col-md-6">
            <h4 class="text-left ">Edit Profile
            </h4>
            <hr class="green-hr">
          </div>
          <div class="col-md-12 m-auto box2">
            <form action="<?php echo base_url('user-update-profile/').$profile->u_id; ?>" method="POST" enctype="multipart/form-data">
              <div class="sign-input">
                <input type="text" id="name" placeholder="Name" name="name" value="<?php echo $profile->u_name; ?>">
                <div class="text text-danger">
                  <?php echo form_error('name'); ?>
                </div>
              </div>
              <div class="sign-input">
                <input type="date" id="city" placeholder="D.O.B" name="dob" value="<?php echo $profile->u_dob; ?>">
                <div class="text text-danger">
                  <?php echo form_error('dob'); ?>
                </div>
              </div>
              <div class="sign-input">
                <select class="form-control" name="gender">
                  <option selected value="<?php echo $profile->u_gender; ?>"><?php echo $profile->u_gender; ?>
                  </option>
                  <option value="Male">Male
                  </option>
                  <option value="Female">Female
                  </option>
                  <option value="Other">Other
                  </option>
                </select>
                <div class="text text-danger">
                  <?php echo form_error('gender'); ?>
                </div>
              </div>
              <div class="sign-input">
                <input type="file" name="image" value="">
                <input type="hidden" name="image" value="<?php echo $profile->u_image; ?>">
                <div class="text text-danger">
                </div>
              </div>
              <div class="sign-input">
                <input type="text" placeholder="Country" name="country" value="<?php echo $profile->u_country; ?>">
                <div class="text text-danger">
                  <?php echo form_error('country'); ?>
                </div>
              </div>
              <div class="sign-input">
                <input type="text" placeholder="Street Address" name="street" value="<?php echo $profile->u_street_address; ?>">
                <div class="text text-danger">
                  <?php echo form_error('street'); ?>
                </div>
              </div>
              <div class="sign-input">
                <input type="text" placeholder="City" name="city" value="<?php echo $profile->u_city; ?>">
                <div class="text text-danger">
                  <?php echo form_error('city'); ?>
                </div>
              </div>
              <div class="sign-input">
                <input type="text" placeholder="State" name="state" value="<?php echo $profile->u_state; ?>">
                <div class="text text-danger">
                  <?php echo form_error('state'); ?>
                </div>
              </div>
              <div class="sign-input">
                <input type="text" placeholder="Postal Code" name="postalcode" value="<?php echo $profile->u_postal_code; ?>">
                <div class="text text-danger">
                  <?php echo form_error('postalcode'); ?>
                </div>
              </div>
              <div class="sign-btn" >
                <input type="submit" name="updateprofile" value="Update Profile" class="btn btn-success ">
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

