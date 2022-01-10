<?php
$this->load->view('home/header1');
?>

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
                        <a href="<?php echo base_url('user-dashboard'); ?>"><i class="fas fa-user"></i>Hello <?php echo $this->session->userdata('u_name'); ?>,</a>
                    </div>
                  <?php
                  }
                  else
                  {
                    ?>
                    <div class="in-sign">
                        <a href="<?php echo base_url('signin'); ?>"><i class="fas fa-user"></i>Sign In</a>
                    </div>
                    <?php
                  }
                  ?>
                    <div class="in-sign border-left">
                        <a href="<?php echo base_url('cart'); ?>"><i class="fas fa-cart-plus"></i>Cart</a>
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
                    <a href="<?php echo base_url('/'); ?>"><i class="fas fa-long-arrow-alt-left mr-2"></i>Home</a>
                </div>
                <div class="go-home">
                    <a href="#">/  Test Kit</a>
                </div>
            </div>
        </div>
        
    </div>
</div>

<div class="container padding">
    <div class="row">
        <div class="col-md-4 col-lg-4">
            <div class="offer-box">
                <div class="offer-box-content">
                <h5 class="m-0 mb-2">Get 20% Off </h5>
                <p class="m-0 mb-2 text-muted small">On your lab test booking</p>
                <div class="offer-coupon">
                    <p class="m-0">Use : DXU239</p>
                </div>
                </div>
                <div class="offer-img">
                    <img class="img-fluid" src="<?= base_url('public/home/assets/images/lab-test.png'); ?>"  alt="">
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="offer-box">
                <div class="offer-box-content">
                <h5 class="m-0 mb-2">Get 20% Off </h5>
                <p class="m-0 mb-2 text-muted small">On your lab test booking</p>
                <div class="offer-coupon">
                    <p class="m-0">Use : DXU239</p>
                </div>
                </div>
                <div class="offer-img">
                    <img class="img-fluid" src="<?= base_url('public/home/assets/images/lab-test.png'); ?>"  alt="">
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="offer-box">
                <div class="offer-box-content">
                <h5 class="m-0 mb-2">Get 20% Off </h5>
                <p class="m-0 mb-2 text-muted small">On your lab test booking</p>
                <div class="offer-coupon">
                    <p class="m-0">Use : DXU239</p>
                </div>
                </div>
                <div class="offer-img">
                    <img class="img-fluid" src="<?= base_url('public/home/assets/images/lab-test.png'); ?>"  alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container padding">
  <div class="text-center">
    <h4>Most Searched DNA Test
    </h4>
    <hr class="black-hr mx-auto">
  </div>
  <div class="row mt-5">
    <?php
 foreach($test as $values)
  {
   ?>
    <div class="col-md-6 col-lg-3" >
      <div class="test-box2">
        <div class="offer">
          <p>20% Off
          </p>
        </div>
        <div class="kit-img-box">
        <img  src="<?= base_url('public/home/assets/images/lab-cat.jpg'); ?>"  alt="">
        </div>
        <h5>
          <?php echo $values['t_name']; ?>
        </h5>
        
        <div class="test-box-list">
          <li>
           
            <?php echo $values['t_description']; ?>
          </li>
        </div>
        <div class="know-more-position">
          <div class="know-more-btn" id="know" >
          <a href="">Know More
          </a>
        </div>
        <div class="price">
          <span>
            <del class="text-muted">
              <?php echo '$'.$values['t_mrp']; ?>
            </del>
          </span>
          <span class="price-green">
            <?php echo '$'.$values['t_price']; ?>
          </span>
        </div>
        </div>
      </div>
    </div>
    <?php
    }
    ?>
    <div class="col-md-12 mt-5">
      <div class="view-more text-center">
        <a href="<?php echo base_url('home-test'); ?>">View more
        </a>
      </div>
    </div>
  </div>
</div>
<?php
  	$this->load->view('home/footer');
?>