<?php $this->load->view('home/header1'); ?>
<div class="container-fluid padding2">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 col-lg-9">
        <div class="logo">
          <img src="images/logo.png" alt="">
        </div>
      </div>
      <div class="col-md-6 col-lg-3 text-right">
        <div class="iner-page-sign">
          <div class="in-sign">
            <a href="sign-in.html">
              <i class="fas fa-user">
              </i>Sign In
            </a>
          </div>
          <div class="in-sign border-left">
            <a href="cart.html">
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
          <a href="<?= base_url('/')?>">
            <i class="fas fa-long-arrow-alt-left mr-2">
            </i>Home
          </a>
        </div>
        <div class="go-home">
          <a href="">/  Test Kit
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container padding">
  <div class="text-center">
    <h4>Select Test
    </h4>
    <hr class="black-hr mx-auto">
  </div>
  <div class="row mt-5">

    <?php
    foreach ($kit as $values) 
    {
    ?>
      <div class="col-md-6 col-lg-4">
      <div class="test-box">
        <div class="offer">
          <p>20% Off
          </p>
        </div>
        <h5><?php echo $values['k_name']; ?>
        </h5>
        <p>Include : 10 Parameters
        </p>
        <div class="test-box-list">
          
          <li>
            <?php echo $values['k_description']; ?>
          </li>
        </div>
        <div class="know-more-btn">
          <a href="lab-view.html">Know More
          </a>
        </div>
        <div class="price">
          <span>
            <del class="text-muted"> <?php echo $values['k_mrp']; ?>
            </del>
          </span>
          <span class="price-green"> <?php echo $values['k_price']; ?>
          </span>
        </div>
        <div class="book-now text-center">
          <a href="">Book Now
          </a>
        </div>
      </div>
    </div>
    <?php
    }
    ?>
  </div>
</div>
<?php $this->load->view('home/footer'); ?>
