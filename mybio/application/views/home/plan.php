<?php
 $this->load->view('home/header1'); ?>

?>


<div class="container-fluid padding2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-9">
                <div class="logo">
                    <img src="<?= base_url();?>/assets/images/logo.png" alt="">
                  </div>
            </div>
            <div class="col-md-9 col-lg-3 text-right">
                <div class="iner-page-sign">
                    <div class="in-sign">
                        <a href="sign-in.html"><i class="fas fa-user"></i>Sign In</a>
                    </div>
                    <div class="in-sign border-left">
                        <a href="cart.html"><i class="fas fa-cart-plus"></i>Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container padding2">
    <div class="row align-items-center">
        <div class="col-md-6 col-lg-4">
            <div class="back-home d-flex">
                <div class="go-home">
                    <a href="<?php echo base_url('user-dashboard'); ?>"><i class="fas fa-long-arrow-alt-left mr-2"></i>My Page</a>
                </div>
                <div class="go-home">
                    <a href="">/ Test Kit</a>
                </div>
            </div>
        </div>
       
    </div>
</div>
<div class="container padding">
    <div class="text-center">
        <h4>Go Premium</h4>
        <hr class="green-hr mx-auto">
        <p class="mb-0">No commitment cancel anytime</p>
    </div>
    <div class="row mt-4">
      <div class="col-md-10 offset-md-1">
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="plan-box">
              <div class="plan-heading">
                <h6 class="text-white">Basic</h5>
              </div>
              <div class="plan-fee">
                <h4>$199 <span>/ Month</span></h4>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit, minima.</p>
                <hr>
              </div>
              <div class="plan-list">
                <li><i class="fas fa-check-circle"></i>Lorem ipsum dolor sit amet.</li>
                <li><i class="fas fa-check-circle"></i>Lorem ipsum dolor sit amet.</li>
                <li><i class="fas fa-check-circle"></i>Lorem ipsum dolor sit amet.</li>
                <li><i class="fas fa-check-circle"></i>Lorem ipsum dolor sit amet.</li>
                <li><i class="fas fa-check-circle"></i>Lorem ipsum dolor sit amet.</li>
                <li><i class="fas fa-check-circle"></i>Lorem ipsum dolor sit amet.</li>
                <li><i class="fas fa-check-circle"></i>Lorem ipsum dolor sit amet.</li>
                
              </div>
              <div class="plan-btn">
                <button>Choose Plan</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="plan-box">
              <div class="plan-heading">
                <h6 class="text-white">Basic</h5>
              </div>
              <div class="plan-fee">
                <h4>$199 <span>/ Quarter</span></h4>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit, minima.</p>
                <hr>
              </div>
              <div class="plan-list">
                <li><i class="fas fa-check-circle"></i>Lorem ipsum dolor sit amet.</li>
                <li><i class="fas fa-check-circle"></i>Lorem ipsum dolor sit amet.</li>
                <li><i class="fas fa-check-circle"></i>Lorem ipsum dolor sit amet.</li>
                <li><i class="fas fa-check-circle"></i>Lorem ipsum dolor sit amet.</li>
                <li><i class="fas fa-check-circle"></i>Lorem ipsum dolor sit amet.</li>
                <li><i class="fas fa-check-circle"></i>Lorem ipsum dolor sit amet.</li>
                <li><i class="fas fa-check-circle"></i>Lorem ipsum dolor sit amet.</li>
                
              </div>
              <div class="plan-btn">
                <button>Choose Plan</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="plan-box">
              <div class="plan-heading">
                <h6 class="text-white">Basic</h5>
              </div>
              <div class="plan-fee">
                <h4>$199 <span>/ Year</span></h4>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit, minima.</p>
                <hr>
              </div>
              <div class="plan-list">
                <li><i class="fas fa-check-circle"></i>Lorem ipsum dolor sit amet.</li>
                <li><i class="fas fa-check-circle"></i>Lorem ipsum dolor sit amet.</li>
                <li><i class="fas fa-check-circle"></i>Lorem ipsum dolor sit amet.</li>
                <li><i class="fas fa-check-circle"></i>Lorem ipsum dolor sit amet.</li>
                <li><i class="fas fa-check-circle"></i>Lorem ipsum dolor sit amet.</li>
                <li><i class="fas fa-check-circle"></i>Lorem ipsum dolor sit amet.</li>
                <li><i class="fas fa-check-circle"></i>Lorem ipsum dolor sit amet.</li>
                
              </div>
              <div class="plan-btn">
                <button>Choose Plan</button>
              </div>
            </div>
          </div>
      </div>
      </div>
    </div>
   
</div>




  	<?php $this->load->view('home/footer'); ?>


