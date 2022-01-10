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
          <a href="#">/Test Kit
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container padding">
  <div class="text-center mb-5">
    <h4>About Test
    </h4>
    <hr class="green-hr mx-auto">
  </div>
  <div class="row">
    <div class="col-md-12 col-lg-12">
      <div class="more-box ">
        <div class="more-heading">
          <h4 class="m-0">
            <?php echo $test->t_name; ?>
          </h4>
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="know-mr-img p-2">
              <img class="img-fluid" width="100%" height="500px" src="<?php echo base_url('public/test/').$test->t_image; ?>"  alt="">
            </div>
          </div>
          <div class="col-md-7">
            <div class="more-content p-3">
              <h4 class="m-0 text-muted">
                <?php echo $test->t_description; ?>
              </h4>
            </div>
            <div class="p-3">
             <h6 class="">SKU : (<span class="clr"><?php echo $test->t_code; ?></span>)</h6>
                <div class="more-price d-flex">
                  <h6> Price : </h6>
                  <p class="m-0  mr-2">
                    <del>
                      <?php echo '$'. $test->t_mrp; ?>
                    </del>
                  </p>
                  <h5 class="clr">
                    <?php echo '$'. $test->t_price; ?>
                  </h5>
                  
                </div>
                  
                <div class="more-btn mt-4 mb-3">
                <a href="<?php echo base_url('add-to-cart/').$test->t_slug.'/T'.'/'.$test->t_language; ?>" class="know-more-btn2 ml-2 ">Add to Cart
                </a>
                </div> 
            </div>
          </div>
        </div>
        
      </div>
    </div>

    <div class="container padding">
      <div class="more-box">
        <div class="row p-3">
          <div class="col-md-2">
            <p>
            <a class="btn btn-success1" data-toggle="collapse" href="#Description" role="button" aria-expanded="false" aria-controls="Description">
              Description
              <i class="fas fa-caret-right"></i>
            </a>
          </p>
          </div>
          <div class="col-md-10">
          
          <div class="collapse show" id="Description">
            <div class="card card-body"  >
              <?php echo $test->t_description; ?>
            </div>
          </div>
          </div>
       
          <div class="col-md-2">
            <p>
            <a class="btn btn-success1" data-toggle="collapse" href="#Preparation" role="button" aria-expanded="false" aria-controls="Preparation">
              Preparation
              <i class="fas fa-caret-right"></i>
            </a>
          </p>
          </div>
          <div class="col-md-10">
          <div class="collapse" id="Preparation">
            <div class="card card-body"  >
              <?php echo $test->t_preparation; ?>
            </div>
          </div>
          </div>

          <div class="col-md-2">
            <p>
            <a class="btn btn-success1" data-toggle="collapse" href="#testresult" role="button" aria-expanded="false" aria-controls="testresult">
              Test Result
              <i class="fas fa-caret-right"></i>
            </a>
          </p>
          </div>
          <div class="col-md-10">
          <div class="collapse" id="testresult">
            <div class="card card-body"  >
              <?php echo $test->t_test_result; ?>
            </div>
          </div>
          </div>
        </div>

      </div>  
    </div>


  </div>
</div>
<?php $this->load->view('home/footer'); ?>
