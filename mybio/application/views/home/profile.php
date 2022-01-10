<?php $this->load->view('home/header1'); ?>
<div class="other-page">
  <div class="other-heading text-center text-white">
    <h1>My Profile
    </h1>
    <p>Home / My Profile
    </p>
  </div>
</div>
</div>
</div>
<div class="container-fluid">
  <div class="my-page">
    <div class="container padding">
      <div class="row mt-5">
        <?php $this->load->view('home/sidebar');?>
        <div class="col-md-8 col-lg-8 ">
          <h4 class="text-left pl-3 ">My Profile
          </h4>
          <hr class="green-hr ml-3">
          <?php
          if(!empty($this->session->flashdata('success')))
          {
          ?>
          <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: white; border: 1px solid lightgray;border-left: 3px solid #70b544; border-radius: 0 !important; color: black;">
              <?php echo $this->session->flashdata('success'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;
                </span>
              </button>
            </div>
          </div>
          <?php
          }
          if($profile->u_language=='EN')
          {
          ?>
          <div class="col-md-6 col-lg-5 mb-3 float-left">
            <div class="user-box text-center">
              <?php
              if(empty($profile->u_image))
              {
              ?>
              <img src="<?php echo base_url('public/boy.png'); ?>" class="img-fluid" alt="">
              <?php
              }
              else
              {
              ?>
              <img src="<?php echo base_url('public/user/').$profile->u_image; ?>" class="img-fluid" alt="">
              <?php
              }
              ?>
              <h6 class="pb-3">
                <?php echo $profile->u_name; ?>
              </h6>
              <p class="pb-2">
                <b>User Code :
                </b>
                <?php echo $profile->u_user_code; ?>
              </p>
              <p class="pb-2">
                <b>Email :
                </b>
                <?php echo $profile->u_email; ?>
              </p>
              <p>
                <b>Mobile :
                </b>
                <?php echo $profile->u_mobile; ?>
              </p>
            </div>
          </div>
          <?php
          }
          elseif($profile->u_language=='KR')
          {
          ?>
          <div class="col-md-6 col-lg-5 mb-3 float-left">
            <div class="user-box text-center">
              <?php
              if(empty($profile->u_kr_image))
              {
              ?>
              <img src="<?php echo base_url('public/boy.png'); ?>" class="img-fluid" alt="">
              <?php
              }
              else
              {
              ?>
              <img src="<?php echo base_url('public/user/').$profile->u_kr_image; ?>" class="img-fluid" alt="">
              <?php
              }
              ?>
              <h6 class="pb-3">
                <?php echo $profile->u_kr_name; ?>
              </h6>
              <p class="pb-2">
                <b>User Code :
                </b>
                <?php echo $profile->u_kr_user_code; ?>
              </p>
              <p class="pb-2">
                <b>Email :
                </b>
                <?php echo $profile->u_kr_email; ?>
              </p>
              <p>
                <b>Mobile :
                </b>
                <?php echo $profile->u_kr_mobile; ?>
              </p>
            </div>
          </div>
          <?php
          }
          else
          {
            echo "";
          }
          ?>
          <div class="col-md-6  col-lg-7 float-right ">
            <div class="my-page-edit-box">
              <div class="my-page-edit d-flex align-items-center justify-content-between">
                <div class="clr">
                  <h4 class="m-0">Details
                  </h4>
                </div>
                <div class="d-flex align-items-center">
                  <div>
                    <p class="m-0">Edit
                    </p>
                  </div>
                  <div class="my-page-edit-btn">
                    <span>
                      <a href="<?php echo base_url('user-profile/').$this->session->userdata('u_id'); ?>" title="Click Here For Edit"> 
                        <i class="fas fa-pencil">
                        </i>
                      </a>
                    </span>
                  </div>
                </div>
              </div>
              <div class="user-details-box">
                <div class="user-detail-list mt-3">
                  <div>
                    <strong>Gender
                    </strong>
                  </div>
                  <div>
                    <p class="m-0">
                      <?php echo $profile->u_gender; ?>
                    </p>
                  </div>
                </div>
                <div class="user-detail-list">
                  <div>
                    <strong>Date of Birth
                    </strong>
                  </div>
                  <div>
                    <p class="m-0">
                      <?php echo $profile->u_dob; ?>
                    </p>
                  </div>
                </div>
                <div class="user-detail-list">
                  <div>
                    <strong>Country
                    </strong>
                  </div>
                  <div>
                    <p class="m-0">
                      <?php echo $profile->u_country; ?>
                    </p>
                  </div>
                </div>
                <div class="user-detail-list">
                  <div>
                    <strong>State
                    </strong>
                  </div>
                  <div>
                    <p class="m-0">
                      <?php echo $profile->u_state; ?>
                    </p>
                  </div>
                </div>
                <div class="user-detail-list">
                  <div>
                    <strong>City
                    </strong>
                  </div>
                  <div>
                    <p class="m-0">
                      <?php echo $profile->u_city; ?>
                    </p>
                  </div>
                </div>
                <div class="user-detail-list">
                  <div>
                    <strong>Postal Code
                    </strong>
                  </div>
                  <div>
                    <p class="m-0">
                      <?php echo $profile->u_postalcode; ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
          elseif()
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid pt-3">
  <!-- OTP Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
       aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-0">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;
            </span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-md-12 text-center">
                <h5 class="clr mb-5">VERIFICATION CODE
                </h5>
                <div class="payment-otp-number">
                  <h6 class="mb-5">Please Enter Verification Code Sent to: +19347023483
                  </h6>
                </div>
              </div>
              <div class="col-md-6 offset-md-3 text-center">
                <div class="payment-otp-box">
                  <div class="otp-input-box d-flex w-100 mb-5">
                    <div class="otp-input">
                      <input type="text">
                    </div>
                    <div class="otp-input">
                      <input type="text">
                    </div>
                    <div class="otp-input">
                      <input type="text">
                    </div>
                    <div class="otp-input">
                      <input type="text">
                    </div>
                  </div>
                  <div class="otp-timer">
                    <p>Get OTP In 30 Seconds
                    </p>
                  </div>
                  <div class="otp-submit mb-5">
                    <a href="" data-toggle="modal" data-target="#exampleModalCenter1">Validate
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- PDF Modal -->
  <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
       aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-0">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;
            </span>
          </button>
        </div>
        <div class="modal-body" style="height: 500px;">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="report-pdf">
                  <embed src="images/normal-lab-values.pdf" style="width: 100%; min-height: 400px;" type="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('home/footer'); ?>
