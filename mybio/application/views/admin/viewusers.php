<?php $this->load->view('admin/header-include'); ?>
<div class="container mt-5">
  <div class="row ">
    <div class="col-md-12 col-lg-12 col-sm-12">
      <div class="appointment-box">
        <div class="appointment-main-heading">
          <h5 class="m-0">Registered User Details
          </h5>
        </div>
        <div class="row p-3 ">
          <div class="col-md-12 col-lg-6 offset-lg-3 border rounded px-4 py-5">
            <div class="user-img-area">
              <div class="user-img text-center mb-5">
                <?php
                if(empty($user->u_image))
                {
                ?>
                    <img src="<?php echo base_url('public/boy.png'); ?>" alt="">
                <?php
                }
                else
                {
                ?>
                    <img src="<?php echo base_url('public/user/').$user->u_image; ?>" alt="">
                <?php
                }
                ?>
                <h4 class=" mt-5 mb-5 text-dark">
                  
                </h4>
              </div>
              <hr class="mt-5">
            </div>
            <div class="box-list-box p-0">
                <div class="box-list">
                <div>
                  <strong class="text-dark">Name
                  </strong>
                </div>
                <div>
                  <p class="m-0"><?php echo $user->u_name; ?>
                  </p>
                </div>
              </div>
              <div class="box-list">
                <div>
                  <strong class="text-dark">User Code
                  </strong>
                </div>
                <div>
                  <p class="m-0"><?php echo $user->u_user_code; ?>
                  </p>
                </div>
              </div>
              <div class="box-list">
                <div>
                  <strong class="text-dark">Email
                  </strong>
                </div>
                <div>
                  <p class="m-0"><?php echo $user->u_email; ?>
                  </p>
                </div>
              </div>
              <div class="box-list">
                <div>
                  <strong class="text-dark">Mobile Number
                  </strong>
                </div>
                <div>
                  <p class="m-0"><?php echo $user->u_mobile; ?>
                  </p>
                </div>
              </div>
              <div class="box-list">
                <div>
                  <strong class="text-dark">Gender
                  </strong>
                </div>
                <div>
                  <p class="m-0"><?php echo $user->u_gender; ?>
                  </p>
                </div>
              </div>
              <div class="box-list">
                <div>
                  <strong class="text-dark">DOB
                  </strong>
                </div>
                <div>
                  <p class="m-0"><?php echo $user->u_dob; ?>
                  </p>
                </div>
              </div>
              <div class="box-list">
                <div>
                  <strong class="text-dark">Street
                  </strong>
                </div>
                <div>
                  <p class="m-0"><?php echo $user->u_street_address; ?>
                  </p>
                </div>
              </div>
              <div class="box-list">
                <div>
                  <strong class="text-dark">City
                  </strong>
                </div>
                <div>
                  <p class="m-0"><?php echo $user->u_city; ?>
                  </p>
                </div>
              </div>
              <div class="box-list">
                <div>
                  <strong class="text-dark">State
                  </strong>
                </div>
                <div>
                  <p class="m-0"><?php echo $user->u_state; ?>
                  </p>
                </div>
              </div>
              <div class="box-list">
                <div>
                  <strong class="text-dark">Country
                  </strong>
                </div>
                <div>
                  <p class="m-0"><?php echo $user->u_country; ?>
                  </p>
                </div>
              </div>
              <div class="box-list">
                <div>
                  <strong class="text-dark">Status
                  </strong>
                </div>
                <div>
                  <p class="m-0 text-success">
                <?php 

                if($user->u_status =='1')
                {
                    echo "Active";
                }
                elseif($user->u_status =='2')
                {
                    echo "Inactive";
                }
                else
                {
                    echo "";
                }
                ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
<?php $this->load->view('admin/footer-include'); ?>
