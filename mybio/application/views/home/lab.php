<?php $this->load->view('home/header1'); ?>
<div class="container-fluid padding2">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 col-lg-9">
        <div class="logo">
          <img src="<?php echo base_url('public/admin/images/mybio23-01.png'); ?>" alt="">
        </div>
      </div>
      <div class="col-md-6 col-lg-3 text-right">
        <div class="iner-page-sign">
          <?php
            if(!empty($this->session->userdata('u_id')))
            {
            ?>
          <div class="in-sign">
            <a href="<?php echo base_url('user-dashboard'); ?>">
              <i class="fas fa-user">
              </i>Hello 
              <?php echo $this->session->userdata('u_name'); ?>,
            </a>
          </div>
          <?php
            }
            else
            {
            ?>
          <div class="in-sign">
            <a href="<?php echo base_url('signin'); ?>">
              <i class="fas fa-user">
              </i>Signin
            </a>
          </div>
          <?php
            }
            ?>
          <div class="in-sign border-left">
            <a href="<?php echo base_url('cart'); ?>">
              <i class="fas fa-cart-plus">
              </i>Cart
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container padding2">
  <div class="row align-items-center">
    <div class="col-md-4 col-lg-2">
      <div class="back-home d-flex">
        <div class="go-home">
          <a href="<?php echo base_url('/'); ?>">
            <i class="fas fa-long-arrow-alt-left mr-2">
            </i>Home
          </a>
        </div>
        <div class="go-home">
          <a href="#">/  Test Kit
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-8">
      <div class="search-box">
        <input type="text" placeholder="Find Your Test/Kit">
        <div class="search-btn">
          <a href="">
            <i class="fas fa-search mr-3">
            </i>Search
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="container padding">
    <div class="text-center">
      <h4>Select Lab
      </h4>
      <hr class="green-hr mx-auto">
    </div>
    <?php
    foreach($lab as $values) 
    {
    ?>      
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="lab-box1">
          <div class="row align-items-center">
            <div class="col-md-4">
              <div class="lab-img">
                <img src="<?php echo base_url('public/branch/').$values['b_image']; ?>"  alt="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="lab-detail">
                <h5>
                  <?php echo $values['b_name']; ?>
                </h5>
                <div class="lab-tag">
                 <!--  <li>
                    <i class="fas fa-award mr-3">
                    </i>Certified Lab
                  </li>
                  <li>
                    <i class="fas fa-map-marked-alt mr-3"></i><b>Address</b><br>
                    <h6 class="ml-4 pl-2">
                    <?php echo $values['b_street']; ?><br>
                    <?php echo $values['b_city']; ?><br>

                    <?php echo $values['b_state']; ?><br>
                    <?php echo $values['b_country']; ?>
                  </h6>
                    <i class="fas fa-check-circle mr-3 text-primary">
                    </i>E-Reports in 2 Days
                  </li> -->
                  <!-- <p>+10% Health Cashback* T&C
                  </p> -->
                </div>
                <div class="lab-detail-box">
                  <a href="<?php echo base_url('branch-detail/').$values['b_id']; ?>">Details
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="lab-icon text-center">
                <!-- <span>
                  <img src="<?php echo base_url('public/home/assets/images/icons8-lab-items-96.png'); ?>" alt="">
                </span> -->
                <div class="lab-btn">
                  <a href="<?php echo base_url('home/branchcategory/').$values['b_slug'];?>">Book Now
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php      
    }
    ?>
    <div class="row padding">
      <div class="col-md-12 text-center">
        <div class="lab-btn">
          <a href="">Next
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('home/footer'); ?>
