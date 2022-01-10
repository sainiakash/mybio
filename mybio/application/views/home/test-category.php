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
              </i>Sign In
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
  </div>
</div>
<div class="container padding">
  <div class="text-center mb-5">
    <h4>Tests
    </h4>
    <hr class="green-hr mx-auto">
  </div>
  <div class="row text-center">
    <?php
    foreach($test as $values)
    {
    ?>
    <div  class=" col-md-3 cat-box1 ">
      <div class="card">
        <img class="card-img-top" src="<?php echo base_url('public/test/').$values['t_image']; ?>" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">
            <?php echo $values['t_name']; ?>
          </h5>
          <p>
            <?php echo $values['t_description']; ?>
          </p>
          <div class="bbb_viewed_content text-center">
            <div class="bbb_viewed_price">
              <?php echo '$'.$values['t_price']; ?>
              <span>
                <?php echo '$'.$values['t_mrp']; ?>
              </span>
            </div>
            <div class="know-more-btn2 mt-3">
              <a href="<?php echo base_url('test-detail/').$values['t_id']; ?>">Know More
              </a>
              <a href="<?php echo base_url('add-to-cart/').$values['t_slug'].'/T'.'/'.$values['t_language']; ?>" class="know-more-btn2 ml-2 ">Add to Cart
              </a>
            </div>
          </div>          
        </div>
      </div>
    </div>
    <?php
    }
    ?>
  </div>
</div>
<?php $this->load->view('home/footer'); ?>
