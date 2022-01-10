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
    <h4>Lab Category
    </h4>
    <hr class="green-hr mx-auto">
  </div>
  <div class="row text-center">
    <?php
    foreach($category as $values)
    {
    ?>
      <div class="card cat-box" >
        <img class="card-img-top" src="<?php echo base_url('public/category/').$values['c_image']; ?>" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?php echo $values['c_name']; ?></h5>
          <a href="<?php echo base_url('home/testcategory/').$values['c_slug']; ?>" class="btn tsx mt-3">Select</a>
        </div>
      </div>
    <?php
    }
    ?>
</div>
</div>
<?php $this->load->view('home/footer'); ?>
